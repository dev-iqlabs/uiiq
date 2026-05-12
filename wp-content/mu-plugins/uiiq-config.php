<?php
/**
 * Plugin Name: UIIQ Config
 * Description: IQEX API credential sync, brand colours, Lato font, and uiiq_tenant role for the UIIQ marketing site.
 * Version: 1.2.0
 * Author: Ultimate Image
 */

declare( strict_types=1 );
defined( 'ABSPATH' ) || exit;

// Sync IQEX API constants from wp-config.php → WP options so plugins read live values.
add_action( 'init', function (): void {
	if ( defined( 'IQEX_API_TOKEN' ) && IQEX_API_TOKEN ) {
		update_option( 'iqex_api_token', IQEX_API_TOKEN, false );
	}
	if ( defined( 'IQEX_API_BASE' ) && IQEX_API_BASE ) {
		update_option( 'iqex_api_base', IQEX_API_BASE, false );
	}
}, 1 );

// Register the uiiq_tenant role (no-op if already registered).
add_action( 'init', function (): void {
	if ( ! get_role( 'uiiq_tenant' ) ) {
		add_role( 'uiiq_tenant', 'UIIQ Tenant', [ 'read' => true ] );
	}
}, 5 );

// Disable WordPress emoji (removes injected emoji <img> tags and scripts).
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', function( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, [ 'wpemoji' ] ) : [];
} );

// UIIQ brand: Indigo #4F6BDF primary, Lato font throughout.
// Loaded late (priority 99) to override iqex-theme defaults.
add_action( 'wp_head', function (): void {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">' . "\n";
	echo '<style id="uiiq-brand">
:root {
	--wp--preset--color--accent:  #4F6BDF;
	--wp--preset--color--primary: #1e2d6b;
	--wp--preset--color--dark:    #141d4a;
	--wp--preset--font-family--opuntia: "Lato", sans-serif;
}
body, h1, h2, h3, h4, h5, h6, p, a, li, button, input, select, textarea {
	font-family: "Lato", sans-serif !important;
}
.wp-block-navigation a,
.wp-block-navigation__responsive-container,
.wp-site-title {
	font-family: "Lato", sans-serif !important;
}
img.emoji { display: none !important; }
.uiiq-login-btn {
	display: inline-flex;
	align-items: center;
	padding: 7px 18px;
	background: #fff;
	color: #1e2d6b !important;
	border-radius: 6px;
	font-family: "Lato", sans-serif !important;
	font-weight: 900;
	font-size: 13px;
	letter-spacing: 0.04em;
	text-decoration: none !important;
	margin-left: 16px;
	transition: background 0.18s, color 0.18s;
	white-space: nowrap;
}
.uiiq-login-btn:hover,
.uiiq-login-btn:focus {
	background: #e8ecff;
	color: #1e2d6b !important;
}
.uiiq-login-item { list-style: none; }
.iqex-hero-media.is-text-left .iqex-hero-media__overlay,
.iqex-hero-media .iqex-hero-media__overlay {
	text-align: center !important;
	align-items: center !important;
}
.iqex-hero-media.is-text-left .iqex-hero-media__heading,
.iqex-hero-media .iqex-hero-media__heading,
.iqex-hero-media__overlay p,
.iqex-hero-media__overlay .wp-block-buttons {
	text-align: center !important;
	justify-content: center !important;
}
</style>' . "\n";
}, 99 );

// Redirect existing theme Login link to app.uiiq.co.uk and style it as a button.
// The theme outputs a Login link in the header; we swap its href via JS and apply
// the white pill style. Targets any header anchor whose text or href suggests login.
add_action( 'wp_footer', function (): void {
	echo '<script>
(function(){
  var header = document.querySelector("header, [role=banner]");
  if (!header) return;
  header.querySelectorAll("a").forEach(function(a){
    var href = (a.getAttribute("href") || "").toLowerCase();
    var text = (a.textContent || "").trim().toLowerCase();
    if (href.indexOf("page_id") !== -1 || text === "login" || text === "log in") {
      a.href = "https://app.uiiq.co.uk";
      a.className = (a.className ? a.className + " " : "") + "uiiq-login-btn";
      a.textContent = "UIIQ";
      a.setAttribute("target", "_blank");
      a.setAttribute("rel", "noopener");
    }
  });
})();
</script>' . "\n";
} );
