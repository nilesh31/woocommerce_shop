<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrap">
        <?php
        get_template_part('template-parts/footer/footer', 'widgets');

        if (has_nav_menu('social')) :
            ?>
            <nav class="social-navigation" role="navigation" aria-label="<?php _e('Footer Social Links Menu', 'twentyseventeen'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social',
                    'menu_class' => 'social-links-menu',
                    'depth' => 1,
                    'link_before' => '<span class="screen-reader-text">',
                    'link_after' => '</span>' . twentyseventeen_get_svg(array('icon' => 'chain')),
                ));
                ?>
            </nav><!-- .social-navigation -->
        <?php
        endif;

        get_template_part('template-parts/footer/site', 'info');
        ?>
    </div><!-- .wrap -->
</footer><!-- #colophon -->
</div><!-- .site-content-contain -->
</div><!-- #page -->
<script>
    function woocommerce_Reviews(){
        jQuery('#respond').toggle();
    }

</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php wp_footer(); ?>


</body>
</html>
