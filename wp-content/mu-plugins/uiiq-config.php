<?php
/**
 * Plugin Name: UIIQ Config
 * Description: IQEX API credential sync, brand colours, Lato font, and uiiq_tenant role for the UIIQ marketing site.
 * Version: 1.4.5
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
remove_filter( 'the_content',      'wp_staticize_emoji' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail',          'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', function( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, [ 'wpemoji' ] ) : [];
} );

// UIIQ brand styles — loaded late (priority 99) to override iqex-theme defaults.
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
body {
	background-color: #ffffff !important;
}
body::before {
	display: none !important;
}
body, h1, h2, h3, h4, h5, h6, p, a, li, button, input, select, textarea {
	font-family: "Lato", sans-serif !important;
}
.wp-block-navigation a,
.wp-block-navigation__responsive-container,
.wp-site-title {
	font-family: "Lato", sans-serif !important;
}
img.emoji,
img[src*="/emoji/"],
img[src*="s.w.org"] { display: none !important; }

/* ── UIIQ app button ─────────────────────────────── */
a.uiiq-login-btn,
.wp-block-navigation a.uiiq-login-btn,
header a.uiiq-login-btn {
	display: inline-flex !important;
	align-items: center !important;
	padding: 7px 18px !important;
	background: #fff !important;
	color: #0a0a0a !important;
	border-radius: 6px !important;
	font-family: "Lato", sans-serif !important;
	font-weight: 900 !important;
	font-size: 13px !important;
	letter-spacing: 0.04em !important;
	text-decoration: none !important;
	margin-left: 16px !important;
	transition: background 0.18s, color 0.18s !important;
	white-space: nowrap !important;
}
a.uiiq-login-btn:hover,
a.uiiq-login-btn:focus,
.wp-block-navigation a.uiiq-login-btn:hover {
	background: #e8ecff !important;
	color: #0a0a0a !important;
}
.uiiq-login-item { list-style: none; }

/* ── Hide clutter from nav (theme adds all pages) ── */
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href="/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/terms/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/terms-2/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/terms-conditions/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/privacy-policy/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/privacy/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/about/"]),
.wp-block-navigation .wp-block-navigation-item:has(> .wp-block-navigation-item__content[href$="/contact/"]) {
	display: none !important;
}

/* ── Railway-style hero: dark gradient, no photo ── */
.iqex-hero-media {
	background: #06091a !important;
	min-height: 92vh !important;
}
/* Replace photo with deep indigo gradient + centre glow */
.iqex-hero-media__dim {
	opacity: 1 !important;
	background:
		radial-gradient(ellipse 70% 55% at 50% 30%, rgba(79,107,223,0.18) 0%, transparent 65%),
		radial-gradient(ellipse 120% 80% at 50% -10%, #1a2560 0%, #0d1435 55%, #06091a 100%) !important;
}
/* ── Hero overlay: centred content block ─────────── */
.iqex-hero-media.is-text-left .iqex-hero-media__overlay,
.iqex-hero-media .iqex-hero-media__overlay {
	text-align: center !important;
	align-items: center !important;
	margin-inline: auto !important;
	padding-inline-start: clamp(1rem, 5vw, 3rem) !important;
	padding-inline-end: clamp(1rem, 5vw, 3rem) !important;
	max-width: 820px !important;
}
.iqex-hero-media.is-text-left .iqex-hero-media__heading,
.iqex-hero-media .iqex-hero-media__heading,
.iqex-hero-media__overlay p,
.iqex-hero-media__overlay .wp-block-buttons {
	text-align: center !important;
	justify-content: center !important;
	margin-left: auto !important;
	margin-right: auto !important;
}
/* ── Headline: big, tight, no shadow ─────────────── */
.iqex-hero-media__heading,
.iqex-hero-media__heading h1,
.iqex-hero-media__heading h2,
.iqex-hero-media__heading h3 {
	color: #fff !important;
	font-size: clamp(2.4rem, 6vw, 5rem) !important;
	font-weight: 900 !important;
	line-height: 1.07 !important;
	letter-spacing: -0.025em !important;
	text-shadow: none !important;
	margin-bottom: 1.25rem !important;
}
/* ── Subtitle: muted, readable ───────────────────── */
.iqex-hero-media__sub,
.iqex-hero-media__overlay > p,
.iqex-hero-media__overlay .wp-block-paragraph {
	color: rgba(255,255,255,0.60) !important;
	font-size: clamp(1rem, 1.8vw, 1.15rem) !important;
	line-height: 1.65 !important;
	text-shadow: none !important;
	max-width: 560px !important;
	margin-left: auto !important;
	margin-right: auto !important;
	margin-bottom: 2rem !important;
}
/* ── CTA buttons ─────────────────────────────────── */
.iqex-hero-media__overlay .wp-block-buttons {
	gap: 12px !important;
	flex-wrap: wrap !important;
}
.iqex-hero-media__overlay .wp-block-button__link {
	border-radius: 8px !important;
	padding: 13px 30px !important;
	font-size: 15px !important;
	font-weight: 700 !important;
	letter-spacing: 0.01em !important;
	transition: all 0.18s ease !important;
	text-decoration: none !important;
}
/* Primary — indigo with glow */
.iqex-hero-media__overlay .wp-block-button:not(.is-style-outline) .wp-block-button__link {
	background: #4F6BDF !important;
	color: #fff !important;
	border: none !important;
	box-shadow: 0 0 28px rgba(79,107,223,0.45) !important;
}
.iqex-hero-media__overlay .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
	background: #3d55c8 !important;
	box-shadow: 0 0 40px rgba(79,107,223,0.65) !important;
	transform: translateY(-1px) !important;
}
/* Ghost / outline */
.iqex-hero-media__overlay .wp-block-button.is-style-outline .wp-block-button__link {
	border: 1.5px solid rgba(255,255,255,0.25) !important;
	color: rgba(255,255,255,0.80) !important;
	background: rgba(255,255,255,0.04) !important;
}
.iqex-hero-media__overlay .wp-block-button.is-style-outline .wp-block-button__link:hover {
	border-color: rgba(255,255,255,0.55) !important;
	background: rgba(255,255,255,0.09) !important;
	color: #fff !important;
	transform: translateY(-1px) !important;
}

/* ══════════════════════════════════════════════════
   DESIGN.md TOKEN APPLICATION — body & sections
   ══════════════════════════════════════════════════ */

/* ── Section vertical rhythm ──────────────────────*/
.modules-strip,
.why-one-platform,
.sectors-grid,
.features-strip,
.pricing-strip {
	padding-top:    clamp(56px, 8vw, 96px) !important;
	padding-bottom: clamp(56px, 8vw, 96px) !important;
}
/* Tighter padding for the CTA band */
.cta-band {
	padding-top:    clamp(48px, 6vw, 72px) !important;
	padding-bottom: clamp(48px, 6vw, 72px) !important;
}

/* ── Section headings ─────────────────────────────*/
main h2.wp-block-heading {
	font-size: clamp(1.85rem, 3.5vw, 2.5rem) !important;
	font-weight: 700 !important;
	letter-spacing: -0.025em !important;
	line-height: 1.18 !important;
	color: #0a0a0a !important;
	margin-bottom: 1.2em !important;
}
main h3.wp-block-heading {
	font-size: clamp(1.15rem, 2vw, 1.5rem) !important;
	font-weight: 700 !important;
	letter-spacing: -0.01em !important;
	line-height: 1.25 !important;
	color: #1c1c1e !important;
	margin-bottom: 0.5em !important;
}
main h4.wp-block-heading {
	font-size: 1.05rem !important;
	font-weight: 700 !important;
	line-height: 1.3 !important;
	color: #1c1c1e !important;
	margin-bottom: 0.4em !important;
}

/* ── Body text ────────────────────────────────────*/
main .wp-block-paragraph {
	font-size: 16px !important;
	line-height: 1.6 !important;
	color: #3a3a3c !important;
}

/* ── Inline text links (not buttons) ─────────────*/
main .wp-block-paragraph a:not(.wp-block-button__link) {
	color: #4F6BDF !important;
	font-weight: 600 !important;
	text-decoration: none !important;
}
main .wp-block-paragraph a:not(.wp-block-button__link):hover {
	text-decoration: underline !important;
}

/* ── All buttons: pill shape per DESIGN.md ────────*/
.wp-block-button__link {
	border-radius: 9999px !important;
	font-weight: 700 !important;
}
main .wp-block-button:not(.is-style-outline) .wp-block-button__link {
	background: #4F6BDF !important;
	color: #fff !important;
}
main .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
	background: #3d55c8 !important;
}
main .wp-block-button.is-style-outline .wp-block-button__link {
	border-color: #4F6BDF !important;
	color: #4F6BDF !important;
	background: transparent !important;
}
main .wp-block-button.is-style-outline .wp-block-button__link:hover {
	background: #eef1fc !important;
}

/* ── Feature columns as cards (has direct heading) */
main .wp-block-column:has(> .wp-block-heading) {
	background: #ffffff !important;
	border: 1px solid #e5e5e5 !important;
	border-radius: 12px !important;
	padding: 28px 28px 24px !important;
	box-shadow: rgba(0,0,0,0.04) 0 1px 3px !important;
	transition: border-color 0.18s, box-shadow 0.18s !important;
}
main .wp-block-column:has(> .wp-block-heading):hover {
	border-color: #b8c4f4 !important;
	box-shadow: rgba(79,107,223,0.12) 0 6px 24px !important;
}

/* ── Sector links: pill chips ─────────────────────*/
main .wp-block-paragraph:has(> a:only-child) {
	background: #f7f7f7 !important;
	border: 1px solid #ededed !important;
	border-radius: 8px !important;
	padding: 9px 16px !important;
	margin-bottom: 8px !important;
	transition: background 0.15s, border-color 0.15s !important;
}
main .wp-block-paragraph:has(> a:only-child):hover {
	background: #eef1fc !important;
	border-color: #c8d0f8 !important;
}

/* ── CTA band (indigo full-bleed section) ─────────*/
.uiiq-cta-band h2,
.uiiq-cta-band .wp-block-heading {
	color: #fff !important;
	font-size: clamp(1.85rem, 3.5vw, 2.5rem) !important;
	font-weight: 700 !important;
	letter-spacing: -0.025em !important;
}
.uiiq-cta-band .wp-block-paragraph {
	color: rgba(255,255,255,0.80) !important;
	font-size: 17px !important;
}
.uiiq-cta-band .wp-block-button__link {
	background: #fff !important;
	color: #4F6BDF !important;
	border: none !important;
	padding: 14px 34px !important;
}
.uiiq-cta-band .wp-block-button__link:hover {
	background: #eef1fc !important;
}

/* ── Footer Explore nav ────────────────────────── */
.wp-block-template-part .wp-block-navigation-item:has(> a[href="/"]),
.wp-block-template-part .wp-block-navigation-item:has(> a[href$="/about/"]),
.wp-block-template-part .wp-block-navigation-item:has(> a[href$="/contact/"]),
.wp-block-template-part .wp-block-navigation-item:has(> a[href$="/terms/"]),
.wp-block-template-part .wp-block-navigation-item:has(> a[href$="/privacy-policy/"]) {
	display: none !important;
}

/* ── Pricing page: brand colours on tables ──────── */
.pricing-table th,
.wp-block-table thead th,
.wp-block-table thead td {
	background: #4F6BDF !important;
	color: #fff !important;
	font-weight: 700 !important;
	letter-spacing: 0.03em;
}
.wp-block-table table {
	border-collapse: collapse !important;
	width: 100% !important;
}
.wp-block-table td, .wp-block-table th {
	border: 1px solid #e0e4f5 !important;
	padding: 10px 14px !important;
}
.wp-block-table tbody tr:nth-child(even) td {
	background: #f6f8ff !important;
}
.is-style-stripes .wp-block-table td:first-child,
.wp-block-table td:first-child {
	font-weight: 600;
}

/* ── Pricing cards: accent border + CTA ─────────── */
.wp-block-group.pricing-card,
.wp-block-column.pricing-card {
	border: 2px solid #e0e4f5 !important;
	border-radius: 12px !important;
	padding: 28px !important;
	transition: border-color 0.18s, box-shadow 0.18s !important;
}
.wp-block-group.pricing-card:hover,
.wp-block-column.pricing-card:hover {
	border-color: #4F6BDF !important;
	box-shadow: 0 4px 24px rgba(79,107,223,0.13) !important;
}

/* ── Pricing strip: more generous card spacing ───── */
.pricing-strip .wp-block-columns {
	gap: 32px !important;
	margin-top: 8px !important;
	margin-bottom: 32px !important;
}
.pricing-strip .wp-block-column:has(> .wp-block-heading) {
	padding: 40px 36px 36px !important;
}

/* ── Feature grid: accent icons ─────────────────── */
.wp-block-group .wp-block-heading:first-child::before,
.wp-block-column .wp-block-heading:first-child::before {
	display: none; /* remove any injected pseudo-content */
}

/* ── Sector image card grid ──────────────────────── */
.uiiq-sectors-grid {
	display: grid;
	grid-template-columns: repeat(5, 1fr);
	gap: 16px;
	margin-top: 28px;
}
.uiiq-sector-card {
	display: block;
	border-radius: 12px;
	overflow: hidden;
	border: 1px solid #e5e5e5;
	background: #fff;
	text-decoration: none !important;
	transition: border-color 0.18s, box-shadow 0.18s, transform 0.18s;
}
.uiiq-sector-card:hover {
	border-color: #b8c4f4 !important;
	box-shadow: rgba(79,107,223,0.13) 0 6px 24px;
	transform: translateY(-2px);
}
.uiiq-sector-card img {
	width: 100%;
	height: 140px;
	object-fit: cover;
	display: block;
}
.uiiq-sector-label {
	display: block;
	padding: 12px 14px;
	color: #1c1c1e !important;
	font-family: "Lato", sans-serif !important;
	font-weight: 700 !important;
	font-size: 14px !important;
	line-height: 1.3 !important;
}
.uiiq-sector-card:hover .uiiq-sector-label {
	color: #4F6BDF !important;
}

/* ── Footer ──────────────────────────────────────── */
.wp-block-group[style*="background-color:#141d4a"] a,
.wp-block-group[style*="background-color: #141d4a"] a,
footer a,
.wp-block-template-part a {
	color: rgba(255,255,255,0.75) !important;
	text-decoration: none !important;
}
.wp-block-group[style*="background-color:#141d4a"] a:hover,
.wp-block-group[style*="background-color: #141d4a"] a:hover,
footer a:hover,
.wp-block-template-part a:hover {
	color: #fff !important;
}
</style>' . "\n";
}, 99 );

// Redirect existing theme Login link to app.uiiq.co.uk, reorder nav, and hide clutter.
add_action( 'wp_footer', function (): void {
	echo '<script>
(function(){
  /* ── Header buttons ── */
  var header = document.querySelector("header, [role=banner]");
  if (header) {
    header.querySelectorAll("a").forEach(function(a){
      var href = (a.getAttribute("href") || "").toLowerCase();
      var text = (a.textContent || "").trim().toLowerCase();
      /* Hide the native WP login link entirely */
      if (href.indexOf("wp-login.php") !== -1) {
        (a.closest("li") || a).style.display = "none";
        return;
      }
      /* Convert theme Login link to UIIQ app button */
      if (href.indexOf("page_id") !== -1 || text === "login" || text === "log in") {
        a.href = "https://app.uiiq.co.uk";
        a.className = (a.className ? a.className + " " : "") + "uiiq-login-btn";
        a.textContent = "Login";
        a.style.color = "#0a0a0a";
        a.setAttribute("target", "_blank");
        a.setAttribute("rel", "noopener");
      }
    });
  }

  /* ── Header nav: reorder + hide unwanted ── */
  var hideHrefs = ["/", "/terms/", "/terms-2/", "/terms-conditions/", "/privacy-policy/", "/privacy/", "/about/", "/contact/"];
  var order = ["/grow/", "/run/", "/sell/", "/sectors/", "/pricing/", "/demo/"];

  var navList = null;
  document.querySelectorAll(".wp-block-navigation ul").forEach(function(ul){
    if (!navList && ul.querySelector(":scope > li.wp-block-navigation-item")) navList = ul;
  });

  if (navList) {
    var items = Array.from(navList.querySelectorAll(":scope > li.wp-block-navigation-item"));
    items.forEach(function(li){
      var a = li.querySelector("a");
      if (!a) return;
      var path = (a.getAttribute("href") || "").replace(/^https?:\/\/[^\/]+/, "").replace(/\/?$/, "/");
      if (hideHrefs.indexOf(path) !== -1) li.style.display = "none";
    });
    order.forEach(function(slug){
      var li = items.find(function(el){
        var a = el.querySelector("a");
        if (!a) return false;
        var path = (a.getAttribute("href") || "").replace(/^https?:\/\/[^\/]+/, "").replace(/\/?$/, "/");
        return path === slug;
      });
      if (li) navList.appendChild(li);
    });
  }

  /* ── Footer nav: hide unwanted items ── */
  var footerHide = ["/", "/about/", "/contact/", "/terms/", "/privacy-policy/"];
  document.querySelectorAll(".wp-block-template-part a, footer a").forEach(function(a){
    var path = (a.getAttribute("href") || "").replace(/^https?:\/\/[^\/]+/, "").replace(/\/?$/, "/");
    if (footerHide.indexOf(path) !== -1) {
      var li = a.closest("li");
      if (li) li.style.display = "none";
    }
  });

  /* ── CTA band: tag + directly style its button ── */
  document.querySelectorAll("main .wp-block-group.alignfull").forEach(function(section){
    var h2 = section.querySelector("h2");
    if (!h2 || h2.textContent.trim().toLowerCase().indexOf("ready to see") === -1) return;
    section.classList.add("uiiq-cta-band");
    h2.style.cssText += ";color:#fff !important;";
    section.querySelectorAll("p").forEach(function(p){ p.style.cssText += ";color:rgba(255,255,255,0.82) !important;"; });
    section.querySelectorAll("a").forEach(function(a){
      if (a.closest(".wp-block-navigation")) return;
      a.style.cssText = "background:#fff !important;color:#1e2d6b !important;border-radius:9999px !important;padding:13px 32px !important;font-weight:700 !important;border:none !important;display:inline-block !important;text-decoration:none !important;font-size:15px !important;margin-top:8px !important;";
    });
  });

  /* ── Strip emoji from page text nodes ── */
  try {
    var emojiRx = /\p{Emoji_Presentation}|\p{Extended_Pictographic}/gu;
    (function stripEmoji(node) {
      if (node.nodeType === 3) {
        var cleaned = node.textContent.replace(emojiRx, "").replace(/^\s+|\s+$/g, "").replace(/\s{2,}/g, " ");
        if (cleaned !== node.textContent) node.textContent = cleaned;
      } else if (node.nodeType === 1 && !/^(SCRIPT|STYLE|TEXTAREA)$/.test(node.tagName)) {
        if (node.tagName === "IMG" && (node.classList.contains("emoji") || (node.src || "").indexOf("emoji") !== -1)) {
          node.style.display = "none"; return;
        }
        Array.from(node.childNodes).forEach(stripEmoji);
      }
    })(document.querySelector("main") || document.body);
  } catch(e) {}

  /* ── Footer: hide Sectors submenu chevron ── */
  document.querySelectorAll(".wp-block-template-part button.wp-block-navigation-submenu__toggle, footer button.wp-block-navigation-submenu__toggle").forEach(function(btn){ btn.style.display = "none"; });

  /* ── Sector image cards ── */
  var sectorImgs = {
    "hospitality":  "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/f8798620-4e1c-4eac-bd70-b2a9702b7031/segments/1:1:1/Lucid_Realism_professional_photo_of_Elegant_hotel_lobby_with_r_0.jpg",
    "attractions":  "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/c48e4ae8-2bfa-4128-9f78-7dddb1416a81/segments/1:1:1/Lucid_Realism_professional_photo_of_Families_enjoying_a_vibran_0.jpg",
    "health-wellness": "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/45748110-f8ce-402b-a1f4-ff5580731b27/segments/1:1:1/Lucid_Realism_professional_photo_of_Modern_wellness_spa_interi_0.jpg",
    "events":       "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/f4f11ffa-3cc1-4923-bbd8-554bb467c272/segments/1:1:1/Lucid_Realism_professional_photo_of_Large_events_venue_with_dr_0.jpg",
    "sports-leisure": "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/18e63400-6179-431c-b5a8-d4a318d9c227/segments/1:1:1/Lucid_Realism_professional_photo_of_Modern_sports_and_leisure__0.jpg",
    "arts-culture": "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/761eb9e0-59ac-4499-867d-98d55175bcf1/segments/1:1:1/Lucid_Realism_professional_photo_of_Contemporary_art_gallery_i_0.jpg",
    "education":    "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/4c17fcbe-140b-4b07-bee6-be45b49ffc1d/segments/1:1:1/Lucid_Realism_professional_photo_of_Modern_training_room_with__0.jpg",
    "retail":       "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/a81a4e74-61d0-4e43-9473-7e03e9452212/segments/1:1:1/Lucid_Realism_professional_photo_of_Modern_retail_store_interi_0.jpg",
    "theatre":      "https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/e060af54-e018-444f-9977-5f9e0111c4a6/segments/1:1:1/Lucid_Realism_professional_photo_of_Historic_theatre_interior__0.jpg",
    "public-sector":"https://cdn.leonardo.ai/users/4b07941f-5d0a-4396-83a6-da677411404a/generations/35c3c07b-a12a-496c-bfeb-a5ee15c0de26/segments/1:1:1/Lucid_Realism_professional_photo_of_Modern_civic_council_chamb_0.jpg"
  };
  var sectorsH2 = null;
  document.querySelectorAll("main h2").forEach(function(h2){
    if (h2.textContent.trim().indexOf("Built for your sector") !== -1) sectorsH2 = h2;
  });
  if (sectorsH2) {
    var sectGroup = sectorsH2.closest(".wp-block-group");
    var allCols = sectGroup ? Array.from(sectGroup.querySelectorAll(".wp-block-columns")) : [];
    if (allCols.length) {
      var grid = document.createElement("div");
      grid.className = "uiiq-sectors-grid";
      allCols.forEach(function(colsEl){
        Array.from(colsEl.querySelectorAll("a")).forEach(function(a){
          var parts = (a.getAttribute("href") || "").replace(/\/$/, "").split("/");
          var slug = parts[parts.length - 1] || "";
          var imgUrl = sectorImgs[slug];
          if (!imgUrl) return;
          var card = document.createElement("a");
          card.href = a.getAttribute("href");
          card.className = "uiiq-sector-card";
          var img = document.createElement("img");
          img.src = imgUrl;
          img.alt = a.textContent.trim();
          img.loading = "lazy";
          var lbl = document.createElement("span");
          lbl.className = "uiiq-sector-label";
          lbl.textContent = a.textContent.trim();
          card.appendChild(img);
          card.appendChild(lbl);
          grid.appendChild(card);
        });
      });
      allCols[0].parentNode.replaceChild(grid, allCols[0]);
      for (var i = 1; i < allCols.length; i++) { allCols[i].parentNode.removeChild(allCols[i]); }
    }
  }

  /* ── Alternate section backgrounds ── */
  var sections = Array.from(document.querySelectorAll("main .wp-block-group.alignfull"));
  var idx = 0;
  sections.forEach(function(s){
    if (s.classList.contains("uiiq-cta-band")) return;
    var bg = window.getComputedStyle(s).backgroundColor;
    if (bg !== "rgba(0, 0, 0, 0)" && bg !== "transparent") return;
    if (idx % 2 === 1) s.style.backgroundColor = "#f7f7f7";
    idx++;
  });
})();
</script>' . "\n";
} );
