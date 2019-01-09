(function($) {
    "use strict"

    $(window).on('scroll', function() {
        // Fixed Nav
        var wScroll = $(this).scrollTop();
        wScroll > $('header').height() ? $('#nav-header').addClass('fixed') : $('#nav-header').removeClass('fixed');

        // Back to top appear
        wScroll > 740 ? $('#back-to-top').addClass('active') : $('#back-to-top').removeClass('active')
    });

    // Back to top
    $('#back-to-top').on("click", function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });

    // Mobile Toggle Btn
    $('#nav-header .nav-collapse-btn').on('click', function() {
        $('#main-nav').toggleClass('nav-collapse');
    });

    // Search Toggle Btn
    $('#nav-header .search-collapse-btn').on('click', function() {
        $(this).toggleClass('active');
        $('.search-form').toggleClass('search-collapse');
    });

    // Owl Carousel


    $('#owl-carousel-6').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        // navContainer: '#nav-carousel',
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        touchDrag: true,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
     $('.owl-carousel').owlCarousel({
         loop: true,
         margin: 10,
         nav: true,
         dots: false,
         // navContainer: '#nav-carousel',
         navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
         autoplay: true,
         autoplayTimeout: 5000,
         autoplayHoverPause: true,
         touchDrag: true,
         responsive: {
             0: {
                 items: 1
             },
             768: {
                 items: 2
             },
             992: {
                 items: 3
             },
             1200: {
                 items: 4
             }
         }
     });

})(jQuery);