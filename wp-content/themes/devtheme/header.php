<?php
/**
 * The Header for Dev Theme
 * Displays all of the <head> content and <header> section and main site <nav>
 * Date: 7/15/14
 * Time: 11:29 AM
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<header id="masthead" class="site-header" role="banner">
    <div class="bgnd">
        <div class="contain-to-grid">
            <div id="site-title" class="large-7 medium-7 show-for-medium-up columns">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_hdr_logo.png"></a>
            </div>
            <div id="social-container" class="large-5 medium-5 columns show-for-large-up">
                <?php do_action( 'social_icons', 'header' ); ?>
                <?php do_action( 'cta_phone', 'header' ); ?>
                <?php do_action( 'cta_panel', 'header' ); ?>
            </div>

            <!-- Start Mobile Only Header -->
            <div id="mobile-header" class="small-12 show-for-small-only columns">
                <img id="mobile-logo" src="<?php echo get_template_directory_uri(); ?>/img/sgd_grfx_hdr_logo.png">
            </div>
            <!-- End Mobile Only Header -->

        </div>
    </div>
</header>

<div class="contain-to-grid">
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
<?php if ( is_front_page() ) :
    require get_template_directory() . '/includes/orbit-slideshow.php';
?>

<?php else :
    if ( '' != get_the_post_thumbnail() ) :
        echo get_the_post_thumbnail( $page->ID, 'full', array('class' => 'hdl-img') );
    else :
        echo '';
    endif;
endif; ?>

<main role="main"><!-- start main -->
    <div class="row"><br clear="all" />