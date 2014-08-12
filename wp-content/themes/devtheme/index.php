<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */
get_header();?>

<?php
if ( is_front_page() ) :
    $theclass = "large-7 medium-7 show-for-medium-up columns";
else :
    $theclass = "large-8 medium-8 show-for-medium-up columns";
endif;?>
<div class="<?php echo $theclass ?>">
    <div id="primary" class="site-content">
        <?php // Start the Loop
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            get_template_part( 'content', get_post_format() );
        endwhile;
            // next post nav for possible blog use (if needed)
            echo '<div class="nav-previous alignleft">'. next_posts_link( 'Older posts' ) .'</div>';
            echo '<div class="nav-previous alignleft">'. previous_posts_link( 'Newer posts' ) .'</div>';
        else :
            get_template_part( 'content', 'none' );
        endif;
        ?>
    </div><!-- #primary -->
</div>

<!-- Start Mobile Only Body -->
<div id="mobile-main" class="small columns show-for-small-only">
    MOBILE ONLY CONTENT
</div>
<div id="mobile-body" class="small columns show-for-small-only">
    MOBILE ONLY CONTENT
</div>
<!-- End Mobile Only Body -->

<?php get_sidebar();?>

<?php if ( is_front_page() ) :
    require get_template_directory() . '/includes/video-showcase.php';
endif;?>
INDEX PAGE
<?php get_footer();?>
