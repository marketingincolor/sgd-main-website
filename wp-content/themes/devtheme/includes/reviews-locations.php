<?php
/**
 * The CUSTOM Template for displaying Reviews for Locations from Bazaar Voice
 * Javascript Src URL below should be "display-stg" for Staging, and "display" for Production
 */
?>

<?php
$location_code =  get_user_meta( $post->post_author, 'sp_an', true ) ? get_user_meta( $post->post_author, 'sp_an', true ) : '';
?>
<script type="text/javascript" src="//display-stg.ugc.bazaarvoice.com/static/stormguard/en_US/bvapi.js"></script>
<div id="BVRRContainer">
    <?php echo $bv->reviews->getReviews();?>
</div>
<script type="text/javascript">
    $BV.configure('global', { productId : 'FAM-<?php echo $location_code; ?>' });
    $BV.ui( 'rr', 'show_reviews', {
        doShowContent : function () {
            // If the container is hidden (such as behind a tab), put code here to make it visible (open the tab).
        }
    });
</script>