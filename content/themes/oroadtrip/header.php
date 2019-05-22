<?php
/**
 * Header template
 *
 * @package oRoadtrip
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>

	<header>
			
			<!-- Logo of the site or Name of the site -->
			<?php $the_custom_logo = get_custom_logo(); ?>
			<?php if ( ! empty( $the_custom_logo ) ) : ?>
				<!-- Logo of the site -->
				<?php if ( get_custom_logo() ) : ?>
				<div class=""><?php the_custom_logo(); ?></div>
				<?php endif; ?>
				<?php else : ?>
				<!-- Name of the site -->
				<?php $blog_info = get_bloginfo( 'name' ); ?>
				<?php if ( empty( $the_custom_logo ) && ! empty( $blog_info )) : ?>
				<a class="" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			<?php endif; ?> <!-- End Logo of the site or Name of the site -->
			
			<!-- Menu of the header -->
			<?php
			wp_nav_menu(
				[
					'theme_location'  => 'main',
					'container'       => 'nav',
					'container_class' => 'main-menu',
					'menu_class'      => 'main-menu__list',
				]
			);
			?> <!-- End menu of the header -->

    </header>