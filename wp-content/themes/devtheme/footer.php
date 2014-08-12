<?php
/**
 * The Footer for Dev Theme
 * Displays all of the <footer> section and everything up till the first <div>
 * Date: 7/15/14
 * Time: 11:29 AM
 *
 */
?>

    </div>
</main><!-- end main -->

<footer id="footer" class="site-footer" role="contentinfo">
    <div class="row">

        <div id="footer-widgets" class="small-12 columns footer-widgets widget-area" role="complementary">
            <ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-4">
                <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                <?php endif; ?>

                <li class="widget"><?php //require get_template_directory() . '/includes/icon-links.php'; ?>
                    <div class="small-12">
                        <img class="left" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_ftr_ico_franch.png">
                        <h5>Franchising</h5>Lorem ipsum dolor sit amet, consectetur
                    </div>
                    <div class="small-12">
                        <img class="left" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_ftr_ico_career.png">
                        <h5>Careers</h5>Lorem ipsum dolor sit amet, consectetur
                    </div>
                    <div class="small-12">
                        <img class="left" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_ftr_ico_affil.png">
                        <h5>Affiliations</h5>Lorem ipsum dolor sit amet, consectetur
                    </div>
                </li>

                <li class="widget">
                    <?php do_action( 'social_icons', 'footer' ); ?>
                    <?php do_action( 'cta_phone', 'footer' ); ?>
                    <?php do_action( 'cta_panel', 'footer' ); ?>
                </li>
            </ul>
        </div><!-- #footer-widgets -->


        <?php if ( has_nav_menu( 'secondary' ) ) : ?>
        <div id="nav-container-foot" class="small-12 small-centered columns">
            <nav role="navigation" class="bottom-bar footer-navigation">
                <?php //wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>

                <ul id="secondary-nav">
                    <li class="lead-line">&copy;<?php echo date("Y") ?> Storm Guard Restoration LLC</li>
                    <?php
                    $defaults = array(
                        'theme_location'  => 'secondary',
                        'menu'            => '',
                        'container'       => false,
                        'container_class' => '',
                        'container_id'    => '',
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '%3$s',
                        'depth'           => 0
                    );
                    wp_nav_menu( $defaults );
                    ?>
                </ul>

            </nav>
        </div>
        <?php endif; ?>

        <div id="mobile-footer" class="small-12 show-for-small-only columns">
            Mobile Content Footer
            <?php do_action( 'social_icons', 'footer' ); ?>
        </div>

        <?php wp_footer(); ?>
    </div>
</footer><!-- end footer -->

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.accordion.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.dropdown.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.orbit.js"></script>
<script>
    $(document).foundation();
</script>

</body>
</html>