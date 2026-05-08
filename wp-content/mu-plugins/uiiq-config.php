<?php
/**
 * Plugin Name: UIIQ Config
 * Description: IQEX API credential sync, brand accent colour, and uiiq_tenant role setup for the UIIQ marketing site.
 * Version: 1.0.0
 * Author: Ultimate Image
 */

declare( strict_types=1 );
defined( 'ABSPATH' ) || exit;

// Sync IQEX API constants from wp-config.php → WP options so plugins read live values.
// Add to wp-config.php: define( 'IQEX_API_TOKEN', '...' ); define( 'IQEX_API_BASE', 'https://api.iqex.co.uk' );
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

// UIIQ brand accent: indigo (#6366f1) — unified platform, SaaS, all-in-one.
// Overrides the iqex-block-theme default coral after global styles are output.
add_action( 'wp_head', function (): void {
	echo '<style id="uiiq-accent">:root{--wp--preset--color--accent:#6366f1}</style>' . "\n";
}, 99 );
