<?php
/**
 * The template for displaying all single posts
 *
 * @package oRoadtrip
 */

get_header();

if ( have_posts() ) :
	?>
        <!-- Start the Loop -->
		<?php
		while ( have_posts() ) :
			the_post();
			?>
            <article <?php post_class(); ?>>
            <?php the_post_thumbnail(); ?>
				<header>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_author(); ?></p>
				</header>
				<main>
					<?php the_content(); ?>
				</main>
			</article>
			<?php
		endwhile;
		?> <!-- End The Loop -->

	<?php
endif;
?>
					
<?php
get_footer();

