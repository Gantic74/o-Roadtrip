<?php
/**
 * Footer template
 *
 * @package oRoadtrip
 */
?>

    <footer>
    
        <!-- Menu of the footer -->
        <?php
        wp_nav_menu(
            [
            'theme_location' => 'footer',
            'container' => 'nav',
            'container_class' => 'footer-menu',
            'menu_class' => 'footer-menu__list'
            ]
        );
        ?> <!-- End Menu of the footer -->
    
    </footer>

<?php wp_footer(); ?>
</body>
</html>