<?php
/**
 * The CUSTOM Template for displaying the Summary for Locations from Bazaar Voice
 * Javascript Src URL below should be "display-stg" for Staging, and "display" for Production
 */
?>

<?php //echo ( get_user_meta( $post->post_author, 'sp_an', true ) ? get_user_meta( $post->post_author, 'sp_an', true ) : ''); ?>
<script type="text/javascript" src="//display-stg.ugc.bazaarvoice.com/static/stormguard/en_US/bvapi.js"></script>
<script type="text/javascript">
    //$BV.configure('global', { productId : '2000' });
</script>
<div id="BVRRSummaryContainer"></div>