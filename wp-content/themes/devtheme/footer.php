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
            <ul class="show-for-medium-up medium-block-grid-2 large-block-grid-4">
                <?php //if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <?php //dynamic_sidebar( 'sidebar-3' ); ?>
                <?php //endif; ?>
                <li class="widget">
                    <div class="widget-wrapper">
                        <h5>About Storm Guard</h5>
                        <?php wp_nav_menu( array('menu' => 'about' )); ?>
                    </div>
                </li>
                <li class="widget">
                    <div class="widget-wrapper">
                        <h5>Customer Service</h5>
                        <?php wp_nav_menu( array('menu' => 'service' )); ?>
                    </div>
                </li>
                <li class="widget">
                    <div class="widget-wrapper">
                        <?php require get_template_directory() . '/includes/icon-links.php'; ?>
                    </div>
                </li>
                <li class="widget">
                    <?php do_action( 'social_icons', 'footer' ); ?>
                    <?php do_action( 'cta_phone', 'footer' ); ?>
                    <?php do_action( 'cta_panel', 'footer' ); ?>
                </li>
            </ul>

            <div id="mobile-footer" class="small-12 show-for-small-down columns">
                <h5 style="text-align:center; margin-bottom:15px !important;"><a href="#pagetop" style="color:#363636;">Back to Top</a></h5>
                <?php require get_template_directory() . '/includes/icon-links.php'; ?>
            </div>

        </div><!-- #footer-widgets -->
    </div>
    <div class="contain-to-grid">
        <?php if ( has_nav_menu( 'secondary' ) ) : ?>
        <div id="nav-container-foot" class="small-12">
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
    </div>
<?php wp_footer(); ?>
</footer><!-- end footer -->

<!--<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.orbit.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.accordion.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.dropdown.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.reveal.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.clearing.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.equalizer.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/slick/slick.min.js"></script>-->

<script>
    $(document).foundation();
</script>

<script type="text/javascript">
    /*jQuery(document).ready(function($) {







        var increment = 1;
        var slide_count = $('.gallery-custom').find('img').length;
        //var elements = document.getElementsByClassName('.gallery-custom');
        //var arr = $.makeArray(elements);
        //$(arr).appendTo('#lightbox-control');
        //var slide_inner = '';
        for (var i=0; i < slide_count; i++) {
            if (slide_count > increment) {
                //$('#lightbox-control').append('<span>test message' + arr[i] + '</span>');
                //slide_inner = '<p>' + arr[i] + '</p>';
            }
            else {

            }
        }
        //alert(slide_count);






        $('.gallery-custom').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            //slide: 'li',
            draggable: false,
            autoplay: true,
            autoplaySpeed: 5000
        });
        $('.mobile-service-slider').slick({
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000
        });


        $('.lightboxx_trigger').click(function(e) {
            e.preventDefault();
            var image_href = $(this).attr("href");
            //var image_thumb_href = $('img', this).attr("src");
            var image_thumb_href = $(this).children("img").attr("src");
            if ($('#lightboxx').length > 0) {
                //$('#lightbox-content').html('<img src="' + image_href + '" />');
                //show lightbox window - you could use .show('fast') for a transition
                //$('#lightbox').show();
            }
            else {
                //var lightbox =
                    //'<div id="lightbox">' +
                    //'<p id="lightbox-close">Click to close</p>' +
                    //'<div id="lightbox-content"><img src="' + image_href +'" /></div>' +
                    //'<div id="lightbox-control"><img src="' + image_thumb_href +'" /></div>' +
                    //'<div id="lightbox-control">' + slide_inner + '</div>' +
                    //'</div>';
                //$('body').append(lightbox);

                //$('#lightbox-content').append(image_href);
                //$('#lightbox-control').append(slide_inner);

            }
            //$('#lightbox-close').click(function() {
                //$('#lightbox').hide();
            //});
            //$(arr).appendTo('#lightbox-control');
        });
    });*/

</script>

</body>
</html>