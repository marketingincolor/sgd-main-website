<?php
/**
 * Insert Free Property Damage Inspection Form for Front Page
 *
 */
?>
<div class="inspection-form">
    <div class="wpsl-detail-rtri"></div>
    <a href="<?php echo home_url(); ?>/inspection-request/" class="button no-dropdown">Free Property Damage Inspection</a>
    <!--<a href="#" class="button dropdown" data-dropdown="if-drop" data-options="is_hover:true">Free Property Damage Inspection</a>-->
</div>
<div id="if-drop" data-dropdown-content class="inform-dropdown content">
    <?php
    $the_post_slug = $post->post_name;
    if ( get_post_type( $post ) == 'location' ) :
        $the_location = $the_post_slug;
    else :
        $the_location = '';
    endif;
    //echo do_shortcode('[contact-form-7 title="Inspection Request SHORT '.$the_location.'"]');
    ?>
</div>