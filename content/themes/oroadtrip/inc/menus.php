<?php
/**
 * Menus configuration
 *
 * @package oRoadtrip
 */

add_action(
	'after_setup_theme',
	'oroadtrip_register_nav_menus'
);

function oroadtrip_register_nav_menus() {
	register_nav_menus(
		[
			'main' => 'Menu en haut de page',
			'footer' => 'Menu en pied de page',
			'menu-subpages' => 'Menu des sous-pages',
		]
	);
}
