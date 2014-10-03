<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Devtheme
 * @since Devtheme 0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title show-for-large-up"><?php the_title(); ?></h2>
        <div class="entry-title-image row show-for-medium-down">
            <?php
            if ( '' != get_the_post_thumbnail() ) :
                echo get_the_post_thumbnail( $page->ID, 'full', array('class' => 'hdl-img') );
            else :
                echo '';
            endif;
            ?>

            <?php
            if ( is_front_page() ) : ?>
            <h3 class="entry-title"><?php the_title(); ?></h3>
            <?php else : ?>
                <div class="entry-title-screen"> </div>
                <h4 class="entry-title-overlay"><?php the_title(); ?></h4>
            <?php endif; ?>
        </div>
    </header>
    <div id="small-spacer" class="show-for-medium-down">&nbsp;</div>
    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <footer class="entry-meta">
        <?php //edit_post_link( __( 'Edit', 'devtheme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post -->