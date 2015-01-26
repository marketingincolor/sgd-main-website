<?php
/**
 * Insert Video Showcase for Front Page
 *
 */
?>

<div id="video-showcase" class="medium-12 columns show-for-medium-up">
    <div id="video-showcase-news" class="medium-8 columns show-for-medium-up">
        <h4 class="red">Storm Guard News</h4>
        <?php echo do_shortcode('[display-posts posts_per_page="4" columns="2" category="news" image_size="thumbnail" include_date="true"]'); ?>
    </div>

    <div id="video-showcase-thumb" class="medium-4 columns show-for-medium-up">
        <h4 class="red">Our Simple Process</h4>
        <a href="#" data-reveal-id="firstModal"><img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_vid_proc.png"></a>
        <div id="firstModal" class="reveal-modal medium" data-reveal>
            <h2>Our Simple Process</h2>
            <div class="flex-video">
                <iframe width="853" height="480" src="//www.youtube.com/embed/gtwfgSLinN4" frameborder="0" allowfullscreen></iframe>
            </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>

    </div>

</div><!-- #video-showcase -->

<div id="video-mobile" class="small-12 columns show-for-small">
    <h4 class="red">Our Simple Process</h4>
    <a href="#" data-reveal-id="firstModal"><img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_vid_proc.png"></a>
    <div id="firstModal" class="reveal-modal small" data-reveal>
        <h2>Our Simple Process</h2>
        <div class="flex-video">
            <iframe width="853" height="480" src="//www.youtube.com/embed/gtwfgSLinN4" frameborder="0" allowfullscreen></iframe>
        </div>
        <a class="close-reveal-modal">&#215;</a>
    </div>
</div>