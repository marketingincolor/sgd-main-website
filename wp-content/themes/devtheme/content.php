<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Dev Blank
 * @since Dev Blank 0.0
 */?>
<article id="post-<?php the_ID(); ?>" class="post post-border" role="article">
    <section class="post-head clearfix">
        <div class="meta">
            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
            <br>
            <span class="sub-text">
                <a href="#" rel="category"><?php the_category(', '); ?></a>
                <br>
                <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                <?php //edit_post_link('Admin Edit', '', ''); ?>
            </span>
            <h2><?php the_title(); ?></h2>
            <span class="post-content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink() ?>" rel="bookmark"> More</a>
            </span>
            <h5></h5>
            <span class="sub-text">

            </span>
        </div>
    </section>
</article>