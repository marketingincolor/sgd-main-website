/**
 * Theme jQuery Functions file
 *
 * Contains jQuery handlers for Franchise Manager and Location Finder Plugins
 *
 */
( function( $ ) {
    // Sets cookie for Franchise Manager and Location Finder Customizations
    $(function () {
        var current = window.location.href.split('/');
        var part = current.pop() == '' ? current[current.length - 1] : current.pop();
        if (readCookie('fm-location')) {
            if (readCookie('fm-location') != part) {
                $('.hdr-location-form').addClass('hide-for-small-up');
                $('.hdr-location-link').removeClass('hide');
            }
            else {
                $('.hdr-location-form').removeClass('hide-for-small-up').addClass('');
            }
        }
    });
    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = '; expires='+date.toGMTString();
        }
        else var expires = '';
        document.cookie = name+'='+value+expires+'; path=/';
    }
    function readCookie(name) {
        var nameEQ = name + '=';
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function eraseCookie(name) {
        createCookie(name,'',-1);
    }

// zip code search (header)
    $(function (){
        $('#wpsl-search-button-hdr').click(function() {
            //var url = '/pages/location-search/?zip=';
            //var url = '/stormguard/locations/?zip=';
            //var inputURL = $('#wpsl-search-input-hdr').val();
            //window.location.href = url + inputURL;
            //return false;
        });
    });
// zip code search (footer)
    $(function (){
        $('#wpsl-search-button-ftr').click(function() {
            //var url = '/pages/location-search/?zip=';
            //var url = '/stormguard/locations/?zip=';
            //var inputURL = $('#wpsl-search-input-ftr').val();
            //window.location.href = url + inputURL;
            //return false;
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

