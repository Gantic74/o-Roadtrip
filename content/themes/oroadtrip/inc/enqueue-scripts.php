<?php
/**
 * Styles and scripts configuration
 *
 * @package oRoadtrip
 */

add_action(
	'wp_enqueue_scripts',
	'oroadtrip_enqueue_scripts'
);

/**
 * Add styles and scripts
 */
function oroadtrip_enqueue_scripts() {
	wp_enqueue_style(
		'oroadtrip-style',
		get_theme_file_uri( 'public/css/style.css' ),
		[],
		OROADTRIP_THEME_VERSION
	);

	wp_enqueue_script(
		'oroadtrip-script',
		get_theme_file_uri( 'public/js/app.js' ),
		[],
		OROADTRIP_THEME_VERSION,
		true // Adding script in the footer
	);
}