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
<article id="post-<?php the_ID(); ?>" class="post post-border" role="article">content.php
    <section class="post-head clearfix">
        <div class="meta">
            <time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
            <br>
            <span class="sub-text">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_folder.png">
                <a href="#" rel="category"><?php the_category(', '); ?></a>
                <br>
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_ico_comm.png">
                <a href="<?php comments_link(); ?> "><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
                &nbsp;&nbsp;&nbsp;&nbsp;<?php edit_post_link('Admin Edit', '', ''); ?>
            </span>
            <h2><?php the_title(); ?></h2>
            <span class="post-content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_btn_readmore.png"></a>
            </span>
            <h5><img src="<?php echo get_template_directory_uri(); ?>/img/ees_grfx_madlogo_sm.png"> &nbsp; Sponsored by Madico Window Films</h5>
            <span class="sub-text">
                <?php do_action( 'sm_dlr_text' ); ?>
            </span>
        </div>
    </section>
</article>