<?php
/**
 * The template for displaying our home page
 *
 * @package oRoadtrip
 */

get_header();
?>
    <main>
        <!-- FIRST SECTION : DISPLAY THE IMAGE WITH BUTTON -->
        <section>
            <!-- Display image by customizer or diplay image in the backoffice -->
            <?php 
                if ( get_theme_mod( 'oroadtrip_homepage_image' ) !='' )  :?> 
                <img src="<?php echo esc_url( get_theme_mod( 'oroadtrip_homepage_image' ) ); ?>" class="" alt="">
                <?php else : ?>
                <img src="<?php echo esc_attr( the_post_thumbnail_url() ); ?>" class="" alt="">
            <?php endif; ?>
            <!-- End display image by customizer or diplay image in the backoffice -->

            <!-- Display button's text by customizer if is not empty and modifie text -->
            <?php 
            if ( get_theme_mod( 'oroadtrip_homepage_button_text' ) !='' )  :?> 
            <a class="" href="<?php echo esc_url(get_permalink(46)); ?>" role="">
                <h3><?php echo ( get_theme_mod( 'oroadtrip_homepage_button_text' ) ); ?></h3>
            </a>
            <?php endif; ?>
            <!-- End display button's text by customizer if is not empty and modifie text -->

            <!-- Display baseline text by customizer if is not empty and modifie text -->
            <?php 
            if ( get_theme_mod( 'oroadtrip_homepage_image_baseline' ) !='' )  :?> 
            <p><?php echo ( get_theme_mod( 'oroadtrip_homepage_image_baseline' ) ); ?></p>
            <?php endif; ?>
            <!-- End display baseline text by customizer if is not empty and modifie text -->

        </section>
        <!-- END FIRST SECTION -->

        <!-- SECOND SECTION : DISPLAY THE LAST POST -->
        <section>
            <?php

            // Add function to customizer
            $last_posts_active = get_theme_mod(
                'oroadtrip_homepage_last_posts_active',
                true
            );
            if ( $last_posts_active) :
                // The number of the last post to display
                $last_posts_number =  get_theme_mod(
                    'oroadtrip_homepage_last_posts_number',
                    4
                );

            // Configuration to display the last post
            $last_posts_query = new WP_Query([
                'post_type'      => 'post',
                'orderby'        => 'date',
                'order'          => 'DESC',
                'posts_per_page' => $last_posts_number
            ]);

                if ( $last_posts_query->have_posts() ) :
            ?>
                    <div>
                        <!-- ACF : display name of the section blog -->
                        <?php 
                            if ( get_theme_mod( 'oroadtrip_homepage_name_section_blog' ) !='' )  :?> 
                            <h2><?php echo ( get_theme_mod( 'oroadtrip_homepage_name_section_blog' ) ); ?></h2>
                            <?php else : ?>
                            <?php
                            if(get_field('name_section_blog'))
                            {
                            echo '<h2>' . get_field('name_section_blog') . '</h2>';
                            }
                            ?>
                        <?php endif; ?>
                        <!-- End ACF : display name of the section blog-->

                         <!-- Display logo under the name of the section blog with the customizer if is not empty or with ACF in the backoffice -->
                         <?php 
                            if ( get_theme_mod( 'oroadtrip_homepage_logo_section_blog' ) !='' )  :?>
                            <img src="<?php echo esc_url( get_theme_mod( 'oroadtrip_homepage_logo_section_blog' ) ); ?>">
                            <?php else : ?>
                            <?php 
                            if( get_field('logo_section_blog') ): ?>
                            <img src="<?php the_field('logo_section_blog'); ?>" />
                            <?php endif; ?>
                        <?php endif; ?>
                        <!-- End display logo under the name of the section blog -->
                    </div>

                    <header>
                        <!-- Display the subname of the section blog with the customizer if is not empty  or with ACF in the backoffice -->
                        <?php 
                            if ( get_theme_mod( 'oroadtrip_homepage_subname_section_blog' ) !='' )  :?>
                            <h3><?php echo( get_theme_mod( 'oroadtrip_homepage_subname_section_blog' ) ); ?></h3>
                            <?php else : ?>
                            <?php
                            if(get_field('subname_section_blog'))
                            {
                            echo '<h3>' . get_field('subname_section_blog') . '</h3>';
                            }
                            ?>
                        <?php endif; ?>
                        <!-- End display the subname of the section blog -->
                        
                        <!-- Display the subname'slogan of the section blog with the customizer if is not empty  or with ACF in the backoffice -->
                        <?php 
                            if ( get_theme_mod( 'oroadtrip_homepage_slogan_subname_section_blog' ) !='' )  :?>
                            <h3><?php echo( get_theme_mod( 'oroadtrip_homepage_slogan_subname_section_blog' ) ); ?></h3>
                            <?php else : ?>
                            <!-- ACF : display the subname'slogan of the section blog -->
                            <?php
                            if(get_field('slogan_subname_section_blog'))
                            {
                            echo '<p>' . get_field('slogan_subname_section_blog') . '</p>';
                            }
                            ?>
                        <?php endif; ?>
                        <!-- End ACF : display the subname'slogan  of the section blog -->
                    </header>

                    <!-- Start the Loop -->
                    <?php
                        while ( $last_posts_query->have_posts() ) :
                            $last_posts_query->the_post();
                            // Add the template part of the last post in the front-page
                            get_template_part( 'template-parts/content/last-post' );
                        endwhile;

                        // This function restores the $post global to the current post in the main query.
                        wp_reset_postdata();
                    ?> 
                    <!-- End The Loop -->
                <?php endif;?>
            <?php endif;?>
        </section>
        <!-- END SECOND SECTION -->
    </main>

<?php
get_footer();
