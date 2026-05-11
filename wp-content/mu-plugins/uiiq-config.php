<?php
/**
 * Plugin Name: UIIQ Config
 * Description: IQEX API credential sync, brand colours, Lato font, and uiiq_tenant role for the UIIQ marketing site.
 * Version: 1.1.0
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
</style>' . "\n";
}, 99 );
