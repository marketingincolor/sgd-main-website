<?php
/**
 * The CUSTOM Sidebar for Dev Theme required for Franchise Manager Plugin
 * Displays all of the sidebar <div> section on the right side
 * includes Foundation Classes for layout
 *
 */
?>
<br />
<div id="location-meta-sidebar" class="small-12 large-4 columns">
    <div id="sidebar" role="secondary" class="small-12 columns">
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <div class="textwidget">
                <h5>Contact Us</h5>
                <?php if ( !is_front_page() && is_single()  ) : ?>
                    <div id="side-location-phone" class="side-location-details">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_sid_ico_pho.png">
                        <?php if ( get_user_meta( $post->post_author, 'phone', true ) ) :
                            echo get_user_meta( $post->post_author, 'phone', true );
                        else :
                            echo get_post_meta($post->ID, 'meta_f', true);
                        endif; ?>
                    </div>
                    <div id="side-location-email" class="side-location-details">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_sid_ico_eml.png">
                        <?php $user_info = get_userdata( $post->post_author );
                        $email = $user_info->user_email;
                        if ( $email ) :
                            echo '<a href="mailto:'.$email.'">Email</a>';
                        else :
                            echo '<a href="mailto:'.get_post_meta( $post->ID, 'meta_g', true).'">Email</a>';
                        endif; ?>
                    </div>
                    <div id="side-location-address" class="side-location-details">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_sid_ico_hom.png">
                    <span>
                    <?php if ( get_user_meta( $post->post_author, 'address1', true ) ) :
                        echo get_user_meta( $post->post_author, 'address1', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_a', true);
                    endif; ?>
                        <br />
                        <?php if ( get_user_meta( $post->post_author, 'address2', true ) ) :
                            echo get_user_meta( $post->post_author, 'address2', true );
                        else :
                            echo get_post_meta($post->ID, 'meta_b', true);
                        endif; ?>
                        <br />
                        <?php if ( get_user_meta( $post->post_author, 'city', true ) ) :
                            echo get_user_meta( $post->post_author, 'city', true ).',';
                        else :
                            echo get_post_meta($post->ID, 'meta_c', true).',';
                        endif; ?>

                        <?php if ( get_user_meta( $post->post_author, 'state', true ) ) :
                            echo get_user_meta( $post->post_author, 'state', true );
                        else :
                            echo get_post_meta($post->ID, 'meta_d', true);
                        endif; ?>

                        <?php if ( get_user_meta( $post->post_author, 'zip', true ) ) :
                            //echo get_user_meta( $post->post_author, 'zip', true );
                            echo get_post_meta($post->ID, 'meta_e', true);
                        else :
                            echo get_post_meta($post->ID, 'meta_e', true);
                        endif; ?>
                    </span>
                    </div>
                <?php endif; ?>
            </div>
            <br />

            <?php if ( get_user_meta( $post->post_author, 'sp_an', true ) ) :
                $span = get_user_meta( $post->post_author, 'sp_an', true );
                $slug = $span.'-aff';
            endif;?>
            <?php if ( $span == '003NC') { echo '<h5>Affiliations</h5>'; } ?>
            <?php if ( function_exists( 'soliloquy' ) ) { soliloquy($slug, 'slug'); } ?>

            <!-- Add BazaarVoice Content -->
            <?php /*if ( get_user_meta( $post->post_author, 'sp_an', true ) ) :
                require get_template_directory() . '/includes/summary-locations.php';
            endif;*/?>
            <!-- End BazaarVoice Content -->


            <br /><br />
        </div>
    </div>
</div>

<div id="outer-sidebar" class="small-12 large-4 columns">
    <div id="sidebar" role="secondary" class="small-12 columns">
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <!--<div class="textwidget">
                <h5>Contact Us</h5>
            <?php if ( !is_front_page() && is_single()  ) : ?>
                <div id="side-location-phone" class="side-location-details">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_sid_ico_pho.png">
                    <?php if ( get_user_meta( $post->post_author, 'phone', true ) ) :
                        echo get_user_meta( $post->post_author, 'phone', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_f', true);
                    endif; ?>
                </div>
                <div id="side-location-email" class="side-location-details">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_sid_ico_eml.png">
                    <?php $user_info = get_userdata( $post->post_author );
                    $email = $user_info->user_email;
                    if ( $email ) :
                        echo '<a href="mailto:'.$email.'">Email</a>';
                    else :
                        echo '<a href="mailto:'.get_post_meta( $post->ID, 'meta_g', true).'">Email</a>';
                    endif; ?>
                </div>
                <div id="side-location-address" class="side-location-details">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_sid_ico_hom.png">
                    <span>
                    <?php if ( get_user_meta( $post->post_author, 'address1', true ) ) :
                        echo get_user_meta( $post->post_author, 'address1', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_a', true);
                    endif; ?>
                    <br />
                    <?php if ( get_user_meta( $post->post_author, 'address2', true ) ) :
                        echo get_user_meta( $post->post_author, 'address2', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_b', true);
                    endif; ?>
                    <br />
                    <?php if ( get_user_meta( $post->post_author, 'city', true ) ) :
                        echo get_user_meta( $post->post_author, 'city', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_c', true);
                    endif; ?>
                    ,&nbsp;
                    <?php if ( get_user_meta( $post->post_author, 'state', true ) ) :
                        echo get_user_meta( $post->post_author, 'state', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_d', true);
                    endif; ?>
                    &nbsp;
                    <?php if ( get_user_meta( $post->post_author, 'zip', true ) ) :
                        echo get_user_meta( $post->post_author, 'zip', true );
                    else :
                        echo get_post_meta($post->ID, 'meta_e', true);
                    endif; ?>
                    </span>
                </div>
            <?php endif; ?>
                <br /><br />
            </div>

            <div class="textwidget">
                <p><a href="#" id="clear-locator">(Clear Location Selection)</a></p>
                <p>INSERT NOW HIRING LINK</p>
            </div>-->

            <div class="textwidget">
                <h5>News</h5>
                <?php
                //$news_category = term_exists(strtolower($user_info->user_login), 'category') ? strtolower($user_info->user_login) : 'news' ;
                $news_category = term_exists($post->post_name, 'category') ? $post->post_name : 'news';
                echo do_shortcode('[display-posts category="'.$news_category.'" image_size="thumbnail" include_excerpt="true" posts_per_page="5"]');
                ?>
                <a href="http://www.stormguardrestoration.com/news">More Stories</a>
            </div>
            <br />
            <div class="textwidget">
                <p><a href="../careers"><img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_btn_loc_hire.png"></a></p>
            </div>
        </div>

    </div>
</div>


