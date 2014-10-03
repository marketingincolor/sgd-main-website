<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */

get_header(); ?>
<?php
if ( is_front_page() ) :
    $theclass = " small-12 large-7 columns";
else :
    $theclass = "small-12 large-8 columns";
endif;?>

<div class="<?php echo $theclass ?>">
    <div id="primary" class="site-content">
        <?php // Start the Loop
        while ( have_posts() ) : the_post();
            get_template_part( 'content', 'page' );
            //if ( comments_open() || get_comments_number() ) {
            //    comments_template();
            //}
        endwhile;
        ?>
    </div><!-- #primary -->
</div>

<div id="mobile-sub" class="small-12 show-for-small-only columns">

</div>
<?php get_sidebar(); ?>

<?php if ( is_front_page() ) :
    require get_template_directory() . '/includes/video-showcase.php';
endif;?>

<?php get_footer(); ?>