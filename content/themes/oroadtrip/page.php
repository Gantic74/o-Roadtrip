<?php
/**
 * The template for displaying all single posts
 *
 * @package oRoadtrip
 */

get_header();
	?>
	<!-- Menu of the header -->
	<?php
		wp_nav_menu(
			[
				'theme_location'  => 'menu subpages',
				'container'       => 'nav',
				'container_class' => 'page-menu',
				'menu_class'      => 'page-menu__list',
			]
		);
	?> <!-- End menu of the header -->

	<?php
		$parentid = $post->ID;
		// ID from the parent's page
		$args = array(
			'post_type' => 'page',
			'numberposts' => -1, // -1 add all the sub-pages
			'post_parent' => $parentid // ID from the parent's page
			);
		$posts = get_posts($args);	  
	?>

    <!-- Start the Loop -->
	<?php foreach ($posts as $post_name => $post) :
		setup_postdata($post); ?>
		<section id="<?php global $post; echo $post->post_name; ?>" >
			<div class="<?php post_class(); ?>">
				<h2><?php the_title(); ?></h2>
				<div class=""><?php the_post_thumbnail(); ?></div>
				<?php the_content() ; ?>
			</div>
		</section>
    <?php endforeach; ?> <!-- End the Loop -->
		
<?php

get_footer();

