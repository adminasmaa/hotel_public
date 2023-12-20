!(function ($) {
    "use strict";



    // carusel-cities
    $('.carusel-cities').owlCarousel({
        rtl: true,
        loop: true,
        items: 3,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ["<i class='bx bxs-chevron-right'></i>", "<i class='bx bxs-chevron-left'></i>"],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1000: {
                items: 3,
            }
        }
    });

    // carusel-post
    $('.carousel-post').owlCarousel({
        rtl: true,
        loop: true,
        items: 1,
        margin: 30,
        nav: true,
        dots: true,
        autoplay: false,
        autoplayHoverPause: true,
        navText: ["<i class='bx bxs-chevron-right'></i>", "<i class='bx bxs-chevron-left'></i>"],
    });

    // carousel-panorama
    $('.carousel-panorama').owlCarousel({
        rtl: true,
        loop: true,
        items: 4,
        margin: 0,
        nav: true,
        dots: false,
        autoplay: false,
        autoplayHoverPause: true,
        navText: ["<i class='bx bxs-chevron-right'></i>", "<i class='bx bxs-chevron-left'></i>"],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            800: {
                items: 4
            },
            1000: {
                items: 4,
            }
        }
    });



})(jQuery);
