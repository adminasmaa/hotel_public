!(function ($) {
    "use strict";



    // daterangepicker
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

    });


    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });




    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 1;
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function () {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    // Mobile Navigation
    if ($('.nav-menu').length) {
        var $mobile_nav = $('.nav-menu').clone().prop({
            class: 'mobile-nav d-lg-none'
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');

        $(document).on('click', '.mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').toggle();
        });

        $(document).on('click', '.mobile-nav .drop-down > a', function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });

        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });





    // Porfolio isotope and filter
    $(window).on('load', function () {
        var portfolioIsotope = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-item',
            layoutMode: 'fitRows'
        });

        $('#portfolio-flters li').on('click', function () {
            $("#portfolio-flters li").removeClass('filter-active');
            $(this).addClass('filter-active');

            portfolioIsotope.isotope({
                filter: $(this).data('filter')
            });
            aos_init();
        });

        // Initiate venobox (lightbox feature used in portofilo)
        $(document).ready(function () {
            $('.venobox').venobox();
        });
    });

    // Skills section
    $('.skills-content').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {
        offset: '80%'
    });



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
        loop: false,
        items: 1,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ["<i class='bx bxs-chevron-right'></i>", "<i class='bx bxs-chevron-left'></i>"],
    });


    // carousel-panorama
    $('.carousel-panorama').owlCarousel({
        rtl: true,
        loop: false,
        items: 2,
        margin: 0,
        nav: false,
        dots: true,
        autoplay: false,
        autoplayHoverPause: true,
        navText: ["<i class='bx bxs-chevron-right'></i>", "<i class='bx bxs-chevron-left'></i>"],

    });





    // carusel-haze
    $('.carousel-haze').owlCarousel({
        rtl: true,
        loop: true,
        items: 1,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ["<i class='bx bxs-chevron-right'></i>", "<i class='bx bxs-chevron-left'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 1
            },
            1000: {
                items: 1,
            }
        }
    });






    // // // // // // /مضاف جديد/ // // // // // //




    $('#image-gallery').lightSlider({
        gallery: true,
        item: 1,
        rtl: true,
        thumbItem: 9,
        slideMargin: 0,
        speed: 500,
        auto: true,
        loop: true,
        onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });


    $(".carousel-photo").owlCarousel({
        rtl: true,
        loop: true,
        items: 1,
        margin: 30,
        nav: true,
        dots: false,
        pagination: true,
        autoplay: false,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-double-right fa-lg'></i>", "<i class='fa  fa-angle-double-left fa-lg'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });





    $('.carousel-panorama-1').owlCarousel({
        rtl: true,
        loop: true,
        items: 3,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-double-right fa-lg'></i>", "<i class='fa  fa-angle-double-left fa-lg'></i>"],
        responsive: {
            0: {
                items: 1
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




    var starRatingControls = new StarRating('.star-rating');









    // // // // // // // // // // // // //





    // Init AOS
    function aos_init() {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true
        });
    }
    $(window).on('load', function () {
        aos_init();
    });



    $(".js-example-basic-single").select2({
        dir: "rtl",
    });

    $('[data-toggle="popover"]').popover();


    $('#accordion').collapse({
        toggle: false
    });




    // phone
    var input = document.querySelector("#phone");
    intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function (success, failure) {
            $.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        },

        utilsScript: "js/utils.js"
    });









})(jQuery);
