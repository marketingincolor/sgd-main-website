<?php
/**
 * The CUSTOM Template for displaying all Reviews from Bazaar Voice
 *
 */
?>

<script type="text/javascript" src="//display-stg.ugc.bazaarvoice.com/static/stormguard/en_US/bvapi.js"></script>
<script type="text/javascript">
    $BV.configure('global', { productId : 'FAM-Services' });
</script>
<div id="BVRRContainer"></div>
<script type="text/javascript">
    $BV.ui( 'rr', 'show_reviews', {
        doShowContent : function () {
        // If the container is hidden (such as behind a tab), put code here to make it visible (open the tab).
        }
    });
</script>