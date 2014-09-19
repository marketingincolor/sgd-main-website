<?php
/**
 * The Header for Dev Theme
 * Displays all of the <head> content and <header> section and main site <nav>
 * Date: 7/15/14
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/preload.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<header id="masthead" class="site-header" role="banner">
    <div class="header-bgnd">
        <div class="row">
            <div id="site-title" class="large-7 show-for-large-up columns">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_hdr_logo.png"></a>
            </div>
            <div id="social-container" class="large-5 columns show-for-large-up">
                <?php do_action( 'social_icons', 'header' ); ?>
                <?php do_action( 'cta_phone', 'header' ); ?>
                <?php do_action( 'cta_panel', 'header' ); ?>
            </div>



            <!-- Start Mobile Only Header -->
            <script type="text/javascript">
                jQuery(function($){
                    $( '.menu-btn' ).click(function(){
                        $('.responsive-menu').addClass('expand')
                        $('.menu-btn').addClass('btn-none')
                    })

                    $( '.close-btn' ).click(function(){
                        $('.responsive-menu').removeClass('expand')
                        $('.menu-btn').removeClass('btn-none')
                    })
                })
            </script>
            <?php global $post;
            $custom_option = get_option('custom_option_name');
            if ( get_user_meta( $post->post_author, 'phone', true ) ) :
                $location_phone = get_user_meta( $post->post_author, 'phone', true );
            else :
                $location_phone = $custom_option['ph_info'];
            endif; ?>

            <div id="mobile-header" class="small-12 show-for-medium-down columns"><a  name="pagetop"></a>
                <a><img id="mob-brg" class="menu-btn" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_mob_ico_burg.png"></a>&nbsp;&nbsp;&nbsp;
                <a id="mobile-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="mobile-logo" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_hdr_logo.png"></a>&nbsp;&nbsp;&nbsp;
                <a href="tel://<?php echo $location_phone; ?>"><img id="mob-phon" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_mob_ico_pho.png"></a>
            </div>

            <div id="mobile-menu" class="phone-menu responsive-menu">
                <div class="phone-menu-top">
                    &nbsp;
                    <div class="phone-menu-main">
                        <a><img id="phone-nav-close" class="close-btn" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_btn_close.png"></a>
                        <?php
                        $defaults = array(
                            'theme_location'  => 'primary',
                            'menu'            => 'main-menu',
                            'container'       => false,
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap'      => '<ul>%3$s</ul>',
                            'depth'           => 3
                        );
                        wp_nav_menu( $defaults );
                        ?>
                    </div>
                </div>
            </div>
            <!-- End Mobile Only Header -->

        </div>
    </div>
</header>

<div class="contain-to-grid show-for-large-up">
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name"><!-- Leave this empty --></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <?php
            $defaults = array(
                'theme_location'  => 'primary',
                'menu'            => 'main-menu',
                'container'       => false,
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'main-menu',
                'menu_id'         => 'top-bar-nav',
                'fallback_cb'     => 'wp_page_menu',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 3,
                'walker'          => new foundation_walker_nav_menu
            );
            wp_nav_menu( $defaults );
            ?>
        </section>
    </nav>
</div>
<?php /** Display Hero Container */
if ( is_front_page() ) {
    echo '<div class="hero-bgnd show-for-large-up">   <div class="row">';
    require get_template_directory() . '/includes/orbit-slideshow.php';
    echo '</div>    </div>';
} else if ( in_category('news') ) {
    echo '<div class="hero-bgnd show-for-large-up">   <div class="row">';
    echo '<img src="'.get_template_directory_uri().'/img/sgd_grfx_page_hdl_news.png">' ;
    echo '</div>    </div>';
} else if ( get_post_type( $post ) == 'location' ) {
    echo '';
} else if ( '' != get_the_post_thumbnail() ) {
    echo '<div class="hero-bgnd show-for-large-up">   <div class="row">';
    echo get_the_post_thumbnail( $page->ID, 'full', array('class' => 'hdl-img') );
    echo '</div>    </div>';
} else {
    echo '';
}
?>
<!-- Start Mobile Only Hero -->
<div class="hero-mobile-bgnd show-for-medium-down">
    <div class="row">
        <script type="text/javascript">
            jQuery(function($){
                $( '.form-btn' ).click(function(){
                    $('.mobile-form-menu').addClass('expand')
                    $('.form-btn').addClass('btn-none')
                })

                $( '.close-btn' ).click(function(){
                    $('.mobile-form-menu').removeClass('expand')
                    $('.form-btn').removeClass('btn-none')
                })
            })
        </script>

        <?php
        if ( is_front_page() ) {
            echo '<div class="hero-mobile-yellow small-12 small-centered">';
            echo 'Do you know if your home<br />or property has storm damage?';
            echo '</div>';
            echo '<div class="hero-mobile-content small-centered"><div class="hero-mobile-content-inner">';
            echo '<h6>We specialize in roofing, siding, windows, gutters, painting, and emergency tarping.</h6>';
            do_action('cta_phone', 'mobile');
            do_action('cta_panel', 'mobile');
            echo '</div></div>';
        } /*else if ( '' != get_the_post_thumbnail() ) {
            echo get_the_post_thumbnail( $page->ID, 'full', array('class' => 'hdl-img') );
        }*/ ?>

        <div class="mobile-pdi">
            <a class="form-btn">FREE Property Damage Inspection <span class="ind">&rsaquo;</span></a>
        </div>
        <div id="mobile-menu" class="phone-menu mobile-form-menu">
            <div class="phone-menu-top">
                &nbsp;
                <div class="phone-menu-main">
                    <a><img id="nav-alt-hb" class="close-btn" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_btn_close.png"></a>
                    <?php
                    $the_post_slug = $post->post_name;
                    if ( get_post_type( $post ) == 'location' ) :
                        $the_location = $the_post_slug;
                    else :
                        $the_location = '';
                    endif;
                    echo do_shortcode('[contact-form-7 title="Inspection Request SHORT '.$the_location.'"]');
                    ?>
                </div>
            </div>
        </div>



        <?php
        if ( is_front_page() ) {
            do_action('social_icons', 'header');
        } ?>

    </div>




</div>
<!-- End Mobile Only Hero -->
<div id="spacer" class="show-for-large-up">&nbsp;</div>
<main role="main"><!-- start main -->
    <div class="row">