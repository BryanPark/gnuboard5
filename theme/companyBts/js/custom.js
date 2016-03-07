jQuery(function($) {
  "use strict";

    $('.navigation').singlePageNav({
        currentClass: 'active',
        changeHash: true,
        scrollSpeed: 750,
        offset: 0,
        filter: ':not(.external)',
        easing: 'swing'
    });

    $('.nav a').on('click', function(){
        if($('.navbar-toggle').css('display') !='none'){
            $(".navbar-toggle").trigger( "click" );
        }
    });

    /*Smooth Scroll*/
    smoothScroll.init({
        speed: 400,
        easing: 'easeInQuad',
        offset:0,
        updateURL: true,
        callbackBefore: function ( toggle, anchor ) {},
        callbackAfter: function ( toggle, anchor ) {}
    });

    $('#slider_part').carousel({
        pause: true,
        interval: 100000,
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top').click(function () {
        $('#back-top a').tooltip('hide');
        $('body,html').animate({ scrollTop: 0 }, 800);
        return false;
    });

    $('#back-top').tooltip('hide');
});