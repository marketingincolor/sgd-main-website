<?php
/**
 * The Sidebar for Dev Theme
 * Displays all of the sidebar <div> section on the right side
 * includes Foundation Classes for layout
 * Date: 7/15/14
 * Time: 11:29 AM
 *
 */
?>
<?php
if ( is_front_page() ) :
    //$side_class = "large-5 medium-5 show-for-medium-up columns";
    $side_class = "large-5";
else :
    //$side_class = "large-4 medium-4 show-for-medium-up columns";
    $side_class = "large-4";
endif;?>

<div id="outer-sidebar" class="small-12 <?php echo $side_class ?> columns">
    <div id="sidebar" role="secondary" class="small-12 columns">

        <?php if ( is_front_page() ) : ?>
            <div class="hide-for-small">
                <?php do_action( 'show_serv_list', 'main' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-1' ) && !is_front_page() /*&& ! is_single()*/ ) : ?>
            <?php //do_action( 'show_custom_testimonial' ); ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- #primary-sidebar-1 -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-2' ) && !is_front_page() /*&& is_single()*/  ) : ?>
            <?php do_action( 'show_custom_testimonial' ); ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div><!-- #primary-sidebar-2 -->
        <?php endif; ?>

        <?php if ( is_front_page() ) : ?>
            <div id="optional-sidebar" class="optional-widget-area" role="complementary">
                <h5>Gallery</h5>
                <?php echo do_shortcode('[gallery size="news-thumb" link="file" ids="406,167,166,165,164" type="custom"]'); ?>
            </div>
        <?php endif; ?>

    </div>
</div>


