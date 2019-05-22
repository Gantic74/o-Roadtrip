<?php
/**
 * Theme setup
 *
 * @package oRoadtrip
 */

add_action(
	'after_setup_theme',
	'oroadtrip_setup'
);

/**
 * Add configuration instructions
 */
function oroadtrip_setup() {
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size ( 'cropped-last-post', 400, 400 );
}
