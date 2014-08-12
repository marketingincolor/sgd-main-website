<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */

get_header(); ?>
<div class="large-8 medium-8 columns show-for-medium-up">
    <div id="primary" class="site-content">
        <div id="content" role="main">single.php

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <header class="entry-header">
                        <?php if ( ! post_password_required() && ! is_attachment() ) :
                            the_post_thumbnail( 'full' );
                        endif; ?>

                        <?php if ( is_single() ) : ?>
                        <div class="meta">
                            <span class="sub-text">
                                <a href="#" rel="category"><?php the_category(', '); ?></a>
                                <br>
                                <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                            </span>
                            <span class="sub-text">
                                <?php do_action( 'sm_dlr_text' ); ?>
                            </span>
                        </div>
                        <h2 class="entry-title"><?php the_title(); ?></h2>

                        <?php else : ?>
                        <div class="meta">
                            <span class="sub-text">
                                <a href="#" rel="category"><?php the_category(', '); ?></a>
                                <br>
                                <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                            </span>
                            <span class="sub-text">
                                <?php do_action( 'sm_dlr_text' ); ?>
                            </span>
                        </div>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                        <?php endif; // is_single() ?>
                        <?php if ( comments_open() ) : ?>

                        <?php endif; // comments_open() ?>
                    </header><!-- .entry-header -->

                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    <?php else : ?>
                        <div class="entry-content">
                            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'devtheme' ) ); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'devtheme' ), 'after' => '</div>' ) ); ?>
                        </div><!-- .entry-content -->
                    <?php endif; ?>

                    <footer class="entry-meta">


                    </footer><!-- .entry-meta -->
                </article><!-- #post -->


                <!--<nav class="nav-single">
                    <h3 class="add-icon"><?php _e( 'Related Posts', 'devtheme' ); ?></h3>
                    <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'devetheme' ) . '</span> %title' ); ?></span>
                    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'devtheme' ) . '</span>' ); ?></span>
                </nav> .nav-single -->

                <div id="related-stories" class="clearfix">
                    <h3 class="widget-title">Related Stories</h3>
                    <?php
                    $thepost = get_the_ID();
                    $categories = get_the_category();
                    if(!empty($categories) and is_array($categories)) {
                        foreach( $categories as $category) $array_ID[] = $category->slug;
                            $cats = implode(",", $array_ID);
                    }else{
                        $cats = 'uncategorized';
                    };
                    echo do_shortcode('[display-posts columns="4" image_size="related-thumb" orderby="comment_count" category="'.$cats.'" not_in="' . $thepost . '"]');?>
                </div>

                <?php comments_template( '', true ); ?>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
</div>
<div id="mobile-single" class="small-12 show-for-small-only columns">
    Mobile Singlepage Content

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>