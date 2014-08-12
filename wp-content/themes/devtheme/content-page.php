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
        <h2 class="entry-title"><?php the_title(); ?></h2>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'devtheme' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->
</article><!-- #post -->