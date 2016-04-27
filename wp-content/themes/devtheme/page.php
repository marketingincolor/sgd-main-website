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
get_header();

if ( is_front_page() ) :
    $theclass = " small-12 large-7 columns";
else :
    $theclass = "small-12 large-8 columns";
endif;
?>

<div class="<?php echo $theclass ?>">
    <div id="primary" class="site-content">
        <?php // Start the Loop
        while ( have_posts() ) : the_post();
            get_template_part( 'content', 'page' );
        endwhile;
        ?>

    <?php if ( is_page('tips') ) :?>

        <?php
        $inner_query = new WP_Query();
	    $inner_query->query('category_name=news&posts_per_page=6' . '&paged='.$paged.'');
        ?>

        <div class="news-list" style="margin-left:15px;">
        <?php

        while ($inner_query->have_posts()) : $inner_query->the_post();
            $inner_query->current_post = $inner_query->current_post + 1;
        ?>

        <?php $add_class = ( 0 == $inner_query->current_post || 0 == $inner_query->current_post % 2 ) ? 'first' : '';
            ?>
            <div class="listing-item one-half <?php echo $add_class; ?>">
                <?php if ( has_post_thumbnail() )
                    echo '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'thumbnail' ) . '</a> ';
                ?>
                <a class="title" href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a><br />
                <span class="date">(<?php the_date( 'n/j/Y' ); ?>)</span>
                <span class="excerpt"><?php the_excerpt_rss(); ?></span>
            </div>
        <?php endwhile; ?>
        </div>
        <br clear="both" />

        <div class="page-nav">
        <?php
        echo "<a href='".home_url()."/tips'>Tips</a>&nbsp;";
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $inner_query->max_num_pages
        ) );
        ?>
        </div>

        <?php wp_reset_query(); ?>

    <?php else : ?>

    <?php endif; ?>

    <?php if ( is_page('reviews') ) :
        require get_template_directory() . '/includes/reviews.php';
    endif;?>

    </div><!-- #primary -->
</div>


<div id="mobile-sub" class="small-12 show-for-small-only columns">

</div>
<?php get_sidebar(); ?>

<?php if ( is_front_page() ) :
    require get_template_directory() . '/includes/video-showcase.php';
endif;?>

<?php get_footer(); ?>