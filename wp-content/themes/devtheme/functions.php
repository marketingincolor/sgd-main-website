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
        add_image_size( 'main-thumb', 280, 270, true );
        add_image_size( 'related-thumb', 180, 124, true );
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

//Initialize and Register sidebars for theme
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
}
add_action( 'widgets_init', 'devtheme_widgets_init' );

// Enqueue scripts and functions specific for theme
function devtheme_scripts () {
    wp_enqueue_script( 'devtheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
}
add_action( 'wp_enqueue_scripts', 'devtheme_scripts' );

//Create custom display for Social Media icons as grouped set, using 'hdr' or 'ftr' for location on page.
function display_social_media_icons( $pagelocation ){
    $custom_option = get_option('custom_option_name');
    $location = ($pagelocation == 'header' ? 'hdr' : 'ftr');
    echo '<div class="social-icons">';
    echo '<a href="'.$custom_option['fb_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_fb"></a>&nbsp;';
    echo '<a href="'.$custom_option['tw_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_tw.png"></a>&nbsp;';
    echo '<a href="'.$custom_option['gp_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_yt.png"></a>&nbsp;';
    echo '<a href="'.$custom_option['li_link'].'" target="_blank"><img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_li.png"></a>';
    echo '</div>';
}
add_action( 'social_icons', 'display_social_media_icons', 10, 1 );

//Create custom display for Company Phone Number Call To Action using 'hdr' or 'ftr' for location on page.
function display_cta_phone( $pagelocation ){
    $custom_option = get_option('custom_option_name');
    $location = ($pagelocation == 'header' ? 'hdr' : 'ftr');
    echo '<div class="cta-phone">';
    //echo '<span class="phone-'.$location.'-icon"></span>';
    echo '<img src="'. get_template_directory_uri(). '/img/sgd_grfx_'.$location.'_ico_pho.png"></a>';
    echo '<span class="phone-'.$location.'">'.$custom_option['ph_info'].'</span>';
    echo '</div>';
}
add_action( 'cta_phone', 'display_cta_phone', 10, 1 );

//Create custom display for Call To Action Panel using 'hdr' or 'ftr' for location on page.
function display_cta_panel( $pagelocation ){
    $location = ($pagelocation == 'header' ? 'hdr' : 'ftr');
    echo '<br /><div class="cta-panel">';
    echo '<div class="location-'.$location.'">Find a Location</div>';

    if ($pagelocation == 'header') { echo '<div class="wpsl-detail-wtri"> </div>'; }

    echo '<div class="wpsl-input-'.$location.'"><input id="wpsl-search-input-'.$location.'" autocomplete="on" type="text" value=""></div>';

    if ($pagelocation == 'header') { echo '<div class="wpsl-detail-ytri"> </div>'; }

    echo '<div class="wpsl-button-'.$location.'"><input type="submit" id="wpsl-search-button-'.$location.'" value=""></div>';
    if ($pagelocation == 'header') {
        require get_template_directory() . '/includes/pdi-form.php';
    }
    echo '</div>';
}
add_action( 'cta_panel', 'display_cta_panel', 10, 1 );

//Create custom display for Display area links
function display_area_dealer_links() {
    echo '...';
}
add_action( 'sm_dlr_text', 'display_area_dealer_links', 10 );

//Create custom display for Mobile Adverts.
function display_mobile_advert_insert( $pagelocation ){

    if ($pagelocation == '1') {
        echo '<span class="mob-adv"><h5>Slot 1 Adverts</h5></span>';
    }
    elseif ($pagelocation == '2') {
        echo '<span class="mob-adv"><h5>Slot 2 Adverts</h5></span>';
    }
}
add_action( 'mobile_advert_insert', 'display_mobile_advert_insert', 10, 1 );

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

// Add Custom Shortcodes
function insert_inspection_request() {
    return '<h6><a href=""><i>Request a FREE property damage inspection today</i></a> for your home or business</h6>';
}
add_shortcode('inspect-request', 'insert_inspection_request');

//Enable Shortcodes in Widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

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
            echo '<h5>Featured Testimonial</h5>';
                    echo '<div class="single-testimonial">';
                         echo $testimonial->post_content;
                    echo '</div>';
                    if( !empty( $testimonial->company ) ):
                        echo $testimonial->client .', '. $testimonial->company;
                    else:
                        echo $testimonial->client;
                    endif;
            echo '</div>';
        }
    }
}
add_action( 'show_custom_testimonial', 'render_testimonial', 10 );


// Add Column Classes to Display Posts Shortcodes
// @author Bill Erickson
// @link http://www.billerickson.net/code/add-column-classes-to-display-posts-shortcode
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