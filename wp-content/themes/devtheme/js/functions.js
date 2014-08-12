/**
 * Theme jQuery Functions file
 *
 * Contains jQuery handlers for Location Finder
 *
 */
( function( $ ) {
// zip code search (header)
    $(function (){
        $('#wpsl-search-button-hdr').click(function() {
            //var url = '/pages/location-search/?zip=';
            var url = '/stormguard/about-us/locations/?zip=';
            var inputURL = $('#wpsl-search-input-hdr').val();
            window.location.href = url + inputURL;
            return false;
        });
    });
// zip code search (footer)
    $(function (){
        $('#wpsl-search-button-ftr').click(function() {
            //var url = '/pages/location-search/?zip=';
            var url = '/stormguard/about-us/locations/?zip=';
            var inputURL = $('#wpsl-search-input-ftr').val();
            window.location.href = url + inputURL;
            return false;
        });
    });
// get parameter and post on location search
    $(function (){
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) {
                return null;
            } else {
                return results[1] || 0;
            }
        }
// example.com?zip=01000
        //$.urlParam('zip'); // name
        if ($.urlParam('zip')) {
            // set the default value of a text input field
            $('#wpsl-search-input').val(decodeURIComponent($.urlParam('zip')));
            // delay and click button
            setTimeout(function(){
                $('#wpsl-search-btn').click();
            },1000);
        }
    });
} )( jQuery );

