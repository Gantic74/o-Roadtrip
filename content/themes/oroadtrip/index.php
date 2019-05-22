<?php
/**
 * Default template
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
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
				<main>
					<?php the_excerpt(); ?>
				</main>
				<footer>
					<a href="<?php the_permalink(); ?>">Lire la suite</a>
				</footer>
			</article>
			<?php
		endwhile;
		?> <!-- End The Loop -->

	<?php
endif;

get_footer();