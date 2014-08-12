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
    $side_class = "large-5 medium-5 show-for-medium-up columns";
else :
    $side_class = "large-4 medium-4 show-for-medium-up columns";
endif;?>
<div class="<?php echo $side_class ?>">

    <?php do_action( 'show_custom_testimonial' ); ?>

    <div id="sidebar" role="secondary">

        <?php if ( is_front_page() ) : ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                Insert Special Link container here
            </div><!-- #primary-sidebar-1 -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-1' ) && !is_front_page() /*&& ! is_single()*/ ) : ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- #primary-sidebar-1 -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-2' ) && !is_front_page() /*&& is_single()*/  ) : ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div><!-- #primary-sidebar-2 -->
        <?php endif; ?>

    </div>
</div>