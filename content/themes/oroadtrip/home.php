<?php
/**
 * The blog template for displaying archive pages
 *
 * @package oRoadtrip
 */

get_header();


// Add function to customizer
$posts_active = get_theme_mod(
	'oroadtrip_blog_posts_active',
	true
);
if ( $posts_active) :
	// The number of the post to display
	$posts_number =  get_theme_mod(
		'oroadtrip_blog_posts_number',
		4
	);

	// The order to diplay the post
	$posts_order =  get_theme_mod(
		'oroadtrip_blog_posts_order',
		'DESC'
	);

// Configuration to display the post
$posts_query = new WP_Query([
	'post_type'      => 'post',
	'orderby'        => 'post_date',
	'order'          => $posts_order,
	'posts_per_page' => $posts_number
]);

	if ( $posts_query->have_posts() ) :
		if ( have_posts() ) :
	?>
        <!-- Start the Loop -->
		<?php
		while ( $posts_query->have_posts() ) :
			$posts_query->the_post();

			// Add the template part of the last post in the front-page
			get_template_part( 'template-parts/content/last-post' );
		endwhile;

		wp_reset_postdata();
		?> <!-- End The Loop -->

	<?php
		endif;
	endif;
endif;
?>

<?php
get_footer();