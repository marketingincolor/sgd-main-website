<?php
/**
 * Development Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 */
if ( ! function_exists( 'devtheme_setup' ) ) :
/**
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
    function devtheme_setup() {
        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );
        // Enable support for Post Thumbnails, and declare two sizes.
        add_theme_support( 'post-thumbnails' );
        //set_post_thumbnail_size( 280, 270 );
        add_image_size( 'news-thumb', 294, 232, true );
        add_image_size( 'sidebar-thumb', 106, 98, true );
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary'   =>  'Header menu',
            'secondary' => 'Footer menu'
        ) );
        //Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );
        //Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ) );
        //Creating custom theme settings
        require get_template_directory() . '/includes/custom-settings.php';
    }
endif;

add_action( 'after_setup_theme', 'devtheme_setup' );
require get_template_directory() . '/includes/foundation-wp-navwalker.php';

//Initialize and Register sidebar widget areas for theme
function devtheme_widgets_init() {
    register_sidebar(array(
        'name' => __( 'Main Sidebar', 'devtheme' ),
        'id' => 'sidebar-1',
        'description' => __( 'Main sidebar content for site', 'devtheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>'
    ));
    register_sidebar(array(
        'name' => __('Secondary Sidebar', 'devtheme' ),
        'id' => 'sidebar-2',
        'description' => __( 'Alternate sidebar content for site', 'devtheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>'
    ));
    register_sidebar(array(
        'name' => __( 'Footer Area', 'devtheme' ),
        'id' => 'sidebar-3',
        'description' => __( 'Footer area content for site', 'devtheme' ),
        'before_widget' => '<li class="widget">',
        'after_widget' => '</li>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>'
    ));
    register_sidebar(array(
        'name' => __('Locations Sidebar', 'devtheme' ),
        'id' => 'sidebar-4',
        'description' => __( 'Special sidebar content for Locations', 'devtheme' ),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>'
    ));
}
add_action( 'widgets_init', 'devtheme_widgets_init' );

// Enqueue scripts and functions specific for theme
function devtheme_scripts () {
    wp_enqueue_script( 'devtheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
}
add_action( 'wp_enqueue_scripts', 'devtheme_scripts' );

// Alter length of the Excerpt.
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Alter the more of the Excerpt.
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Enable Shortcodes in Widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

// Add Custom Shortcodes
// Shortcode for [inspect-request]
function insert_inspection_request() {
    return '<h6><a href="'. home_url() .'/inspection-request"><i>Request a FREE property damage inspection today for your home or business</i></a></h6>';
}
add_shortcode('inspect-request', 'insert_inspection_request');

// Shortcode for [job-listing number="10" location="Apex+NC"]
function insert_job_listing( $atts ) {
    $options = shortcode_atts( array(
        'number' => '10',
        'location' => ''
    ), $atts );
    return '
    <script type="text/javascript">
    <!--
    indeed_jobroll_title = \'Storm Guard Restoration Jobs\';
    indeed_jobroll_background_color = "#FFFFFF";
    indeed_jobroll_width = "100%";
    indeed_jobroll_link_color = "#000000";
    //-->
    </script>
    <script type="text/javascript" src="http://www.indeed.com/jobroll?q=Storm+Guard+Restoration&l='.$options['location'].'&limit='.$options['number'].'">
    </script>
    <noscript><a href="http://www.indeed.com/">Jobs</a> by Indeed</noscript>
    ';
}
add_shortcode('job-listing', 'insert_job_listing');

//Create custom display for Social Media icons as grouped set, using 'hdr' or 'ftr' for location on page.
function display_social_media_icons( $page_location ){
    global $post;
    //first we pull the official corporate values from the custom options set in the theme admin
    $sm_default_option = get_option('custom_option_name');
    $location = ($page_location == 'header' ? 'hdr' : 'ftr');
    $sm_fb_link = ( get_user_meta( $post->post_author, 'sm_fb', true ) ? get_user_meta( $post->post_author, 'sm_fb', true ) : $sm_default_option['fb_link'] );
    $sm_tw_link = ( get_user_meta( $post->post_author, 'sm_tw', true )  ? get_user_meta( $post->post_author, 'sm_tw', true ) : $sm_default_option['tw_link'] );
    $sm_gp_link = ( get_user_meta( $post->post_author, 'sm_gp', true )  ? get_user_meta( $post->post_author, 'sm_gp', true ) : $sm_default_option['gp_link'] );
    $sm_li_link = ( get_user_meta( $post->post_author, 'sm_li', true )  ? get_user_meta( $post->post_author, 'sm_li', true ) : $sm_default_option['li_link'] );
    echo '<div class="social-icons">';
    if ( $sm_default_option['fb_link'] ) {
        echo '<a href="'.$sm_fb_link.'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_fb.png"></a>&nbsp;';
    }
    if ( $sm_default_option['tw_link'] ) {
        echo '<a href="'.$sm_tw_link.'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_tw.png"></a>&nbsp;';
    }
    if ( $sm_default_option['gp_link'] ) {
        echo '<a href="'.$sm_gp_link.'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_yt.png"></a>&nbsp;';
    }
    if ( $sm_default_option['li_link'] ) {
        echo '<a href="'.$sm_li_link.'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_li.png"></a>';
    }
    echo '</div>';
}
add_action( 'social_icons', 'display_social_media_icons', 10, 1 );

//Create custom display for Company Phone Number Call To Action using 'hdr' or 'ftr' for location on page.
function display_cta_phone( $page_location ){
    global $post;
    $location = ($page_location == 'footer' ? 'ftr' : 'hdr');
    $custom_option = get_option('custom_option_name');
    if ( get_user_meta( $post->post_author, 'phone', true ) ) :
        $location_phone = get_user_meta( $post->post_author, 'phone', true );
    else :
        $location_phone = $custom_option['ph_info'];
    endif;
    echo '<div class="cta-phone">';
    //echo '<span class="phone-'.$location.'-icon"></span>';
    echo '<a href="tel://'.$location_phone.'"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_pho.png"></a>';
    echo '<div class="phone-'.$location.'">'.$location_phone.'</div>';
    echo '</div>';
}
add_action( 'cta_phone', 'display_cta_phone', 10, 1 );

//Create custom display for Call To Action Panel using 'hdr' or 'ftr' for location on page.
function display_cta_panel( $page_location ){
    global $post;
    //$pt_switch = (get_post_type( $post ) != 'location' ? ' hide-for-small-up' : '');
    $location = ($page_location == 'footer' ? 'ftr' : 'hdr');
    echo '<div class="cta-panel">';
    echo '<div class="'.$location.'-location-link hide"><a href="'.home_url().'/'.$_COOKIE["fm-location"].'">Back to '.$_COOKIE["fm-name"].' Page &raquo;</a></div>';

    //--------------------START REVISED-------------------//
    //echo '<div class="location-form '.$location.'-location-form"><form>';
    echo '<div class="location-form '.$location.'-location-form"><form method="post" action="">';
    //--------------------END REVISED-------------------//

    if ($page_location == 'footer') { echo '<div class="wpsl-detail-icomap"> </div>'; }
    echo '<div class="location-'.$location.'">Find a Location</div>';
    if ($page_location == 'mobile') { echo '<br />'; }

    if ($page_location != 'footer') { echo '<div class="wpsl-detail-wtri"> </div>'; }

    //--------------------START REVISED-------------------//
    //echo '<div class="wpsl-input-'.$location.'"><input id="wpsl-search-input-'.$location.'" autocomplete="on" type="text" value="" placeholder=" Enter Zip Code"></div>';
    echo '<div class="wpsl-input-'.$location.'"><input id="wpsl-search-input-'.$location.'" autocomplete="on" type="text" name="zip-code-lookup" value="" placeholder=" Enter Zip Code" /></div>';
    //--------------------END REVISED-------------------//

    if ($page_location != 'footer') { echo '<div class="wpsl-detail-ytri"> </div>'; }

    echo '<div class="wpsl-button-'.$location.'"><input type="submit" name="submit" id="wpsl-search-button-'.$location.'" value=""></div>';
    echo '</form></div>';

    if ($page_location == 'header') {
        require get_template_directory() . '/includes/pdi-form.php';
    }
    echo '</div>';
}
add_action( 'cta_panel', 'display_cta_panel', 10, 1 );

//Create custom display for Services list links by location
function show_services_list( $list_location ) {
    echo '<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">';
    $main_location = array( 'Roofing', 'Gutters', 'Siding', 'Painting', 'Windows', 'Emergency Tarping' );
    if ( $list_location == 'main' ) {
        echo '<ul class="service-icons small-block-grid-2">';
        echo '<li><a href="services/residential-services" class="service-icons-box" id="icn-roof"><span class="service-icons-text">Roofing</span></a></li>';
        echo '<li><a href="services/residential-services" class="service-icons-box" id="icn-gutter"><span class="service-icons-text">Gutters</span></a></li>';
        echo '<li><a href="services/residential-services" class="service-icons-box" id="icn-side"><span class="service-icons-text">Siding</span></a></li>';
        echo '<li><a href="services/residential-services" class="service-icons-box" id="icn-paint"><span class="service-icons-text">Paint</span></a></li>';
        echo '<li><a href="services/residential-services" class="service-icons-box" id="icn-wind"><span class="service-icons-text">Windows</span></a></li>';
        echo '<li><a href="services/residential-services" class="service-icons-box" id="icn-tarp"><span class="service-icons-text">Emergency Tarping</span></a></li>';
        echo '</ul>';
    }
    echo '</div>';
}
add_action( 'show_serv_list', 'show_services_list', 10, 1 );




// Custom Action to lookup Territory/Zone info for Franchisee
function fm_display_zone_franchise() {
    if ( isset( $_POST['zip-code-lookup'] ) ) {
        $submitted_zip = $_POST['zip-code-lookup'];
        $args  = array(
            'fields' => 'all',
            'meta_query' => array(
                array(
                    'key' => 'zone',
                    'value' => $submitted_zip,
                    'compare' => 'LIKE'
                )
            ));
        $locations = get_users($args);
        foreach ( $locations as $location) :
            $user_id = $location->user_url;
        endforeach;
        if ( isset($user_id) ) {
            wp_redirect( $user_id ); exit;
        } else {
            wp_redirect( home_url().'/locations/?zip='.$submitted_zip.'' ); exit;
        }
    }
}
add_action( 'init', 'fm_display_zone_franchise', 10, 1);






// Add EXCERPT to Testimonial Plugin
add_action('init', 'add_testimonial_excerpt');
function add_testimonial_excerpt() {
    add_post_type_support( 'testimonial', 'excerpt' );
}

//Add custom display for Testimonial Plugin
function render_testimonial () {
    if( class_exists( 'WP_Testimonial' ) ) {
        if( $testimonial = get_posts( array(
            'post_type' => 'testimonial',
            'posts_per_page' => 1,
            'orderby' => 'rand'
        ) ) ) {
            $testimonial = new WP_Testimonial( array_pop( $testimonial )->ID );
            echo '<div class="featured-testimonial">';
            echo '<h5>Featured Testimonial</h5><img src="'. get_template_directory_uri(). '/img/sgd_grfx_sid_ico_testm.png">';
                echo '<div class="single-testimonial">';
                    echo '<div class="st-quote">'.$testimonial->post_excerpt.'</div>';
                    echo '<div class="st-name">';
                    if( !empty( $testimonial->company ) ):
                        echo $testimonial->client .'<br />'. $testimonial->company;
                    else:
                        echo $testimonial->client;
                    endif;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
}
add_action( 'show_custom_testimonial', 'render_testimonial', 10 );















function super_custom_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    $order = '';
    $orderby = '';
    $id = '';
    $itemtag = '';
    $icontag = '';
    $columns = '';
    $size = '';
    $include = '';
    $exclude = '';
    $type = '';
    $customclass = '';

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'type'       => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    if ($type == 'custom') {
        $itemtag = 'div';
        $icontag = 'div';
        $columns = 0;
        $customclass = 'slider';
        //}
        $itemtag = tag_escape($itemtag);
        $icontag = tag_escape($icontag);
        $columns = intval($columns);
        $itemwidth = $columns > 0 ? floor(100 / $columns) : 100;
        $float = is_rtl() ? 'right' : 'left';
        $selector = "gallery-{$instance}";

        $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 5px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 0px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
    <div id='$selector' class='$customclass gallery galleryid-{$id} gallery-{$type}'>");

        $i = 0;
        foreach ($attachments as $id => $attachment) {
            //$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
            $img = wp_get_attachment_image_src($id, 'full');
            $output .= "<{$itemtag} class='gallery-item'>";
            $output .= "
                <{$icontag} class='gallery-icon'>
                    <a href='{$img[0]}' class='lightbox_trigger'>" . wp_get_attachment_image($id, 'news-thumb') . "</a>
                </{$icontag}>";
            $output .= "</{$itemtag}>";
            if ($columns > 0 && ++$i % $columns == 0)
                $output .= '<br style="clear: both;" />';
        }
        $output .= "</div>\n";
        return $output;
    }
}


























































//ORIGINAL WORKING VERSION BELOW -------------------------------
//Add custom Post Gallery for Sidebar
function custom_post_gallery( $output, $attr)
{
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    $order = '';
    $orderby = '';
    $id = '';
    $itemtag = '';
    $icontag = '';
    $captiontag = '';
    $columns = '';
    $size = '';
    $include = '';
    $exclude = '';
    $type = '';
    $customclass = '';

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => '',
        'type' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order)
        $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $exclude = preg_replace('/[^0-9,]+/', '', $exclude);
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if (empty($attachments))
        return '';

    if (is_feed()) {
        $output = "\n";
        foreach ($attachments as $att_id => $attachment)
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    if ($type == 'custom') {
        $itemtag = 'div';
        $icontag = 'div';
        $captiontag = 'div';
        $columns = 0;
        $customclass = 'slider';
    }
    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100 / $columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 5px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 0px solid #cfcfcf;
            }

        </style>
        <div id='$selector' class='$customclass gallery galleryid-{$id} gallery-{$type}'>");

    $i = 0;
    foreach ($attachments as $id => $attachment) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        /*$output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";*/

        /*if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }*/

        $output .= "
        <{$icontag} class='gallery-icon'>
            <a href='#' data-reveal-id='modal-$id'>" . wp_get_attachment_image($id, $size) . "</a>
        </{$icontag}>";

        if ($captiontag) {
            $output .= "
                <{$captiontag} id='modal-$id' class='reveal-modal medium' data-reveal>
                <br />" . wp_get_attachment_image($id, 'full') . "<a class='close-reveal-modal'>&#215;</a>
                </{$captiontag}>";
        }

        $output .= "</{$itemtag}>";
        if ($columns > 0 && ++$i % $columns == 0)
            $output .= '<br style="clear: both;" />';
    }
    $output .= "</div>\n";

    return $output;
}

//add_filter( 'post_gallery', 'custom_post_gallery', 10, 2 );
//add_filter('post_gallery', 'super_custom_post_gallery', 10, 2);







// Add Column Classes to Display Posts Shortcodes
function be_display_post_class( $classes, $post, $listing, $atts ) {
    if( !isset( $atts['columns'] ) )
        return $classes;
    $columns = array( '', '', 'one-half', 'one-third', 'one-fourth', 'one-fifth', 'one-sixth' );
    $classes[] = $columns[$atts['columns']];
    if( 0 == $listing->current_post || 0 == $listing->current_post % $atts['columns'] )
        $classes[] = 'first';
    return $classes;
}
add_filter( 'display_posts_shortcode_post_class', 'be_display_post_class', 10, 4 );
function be_display_posts_shortcode_exclude_posts( $args, $atts ) {
    if( isset( $atts['not_in'] ) ) {
        $posts = explode( ',', $atts['not_in'] );
        $args['post__not_in'] = $posts;
    }
    return $args;
}
add_filter( 'display_posts_shortcode_args', 'be_display_posts_shortcode_exclude_posts', 10, 2 );