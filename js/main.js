jQuery(document).ready(function ($) {

    $(".pll-parent-menu-item").on("click", ".dropdown-toggle", function (e) {
        e.preventDefault();
        $(this).parent().addClass("show");
        $(this).attr("aria-expanded", "true");
        $(this).next().addClass("show");
    });

    // SMOOTH SCROLL
    jQuery('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (event) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                event.preventDefault();
                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function () {
                    var $target = jQuery(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

    // Hide Header on on scroll down ---
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('#header').outerHeight();

    $(window).scroll(function (event) {
        didScroll = true;

        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    });

    pdsize = 120;
    function hasScrolled() {
        var st = $(this).scrollTop();

        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('#header').addClass('fixed-top');
            $('body').css('padding-top', pdsize + 'px');
        } else {
            // Scroll Up
            if (st < lastScrollTop && st < navbarHeight) {
                $('#header').removeClass('fixed-top');
                $('body').css('padding-top', 0 + 'px');
            }
        }

        lastScrollTop = st;
    }

    AOS.init({
        once: true
    });

    /*$('.banner-principal').slick({
        infinite: true,
        dots: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 8000,
        fade: true,
        pauseOnFocus: true,
        prevArrow: '<button type="button" class="prev-slide"><i class="fi flaticon-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="next-slide"><i class="fi flaticon-arrow-right"></i></button>',
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                }
            },
        ]
    });*/


    $('.depoimentos-slide').slick({
        infinite: true,
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: false,
        autoplaySpeed: 8000,
        arrows: false,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]
    });

    $('.afiliados-slide').slick({
        infinite: true,
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: false,
        autoplaySpeed: 8000,
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: true,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                }
            },
        ]
    });


    $('.galeria').slick({
        lazyLoad: 'progressive',
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        variableWidth: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        arrows: false,
    });

    $('[data-fancybox="gallery"]').fancybox({
        backFocus: false,
    });

    $(".video-thumb").on("click", function () {
        var $videoThumb = $(this);
        var $videoContainer = $videoThumb.next();
        var $videoPlayer = $videoContainer.children();
        $videoPlayer.attr('src', $videoPlayer.attr('data-src'));
        $videoThumb.fadeOut("slow", function () {
            $videoContainer.fadeIn();
            $videoPlayer[0].src += "&autoplay=1";
        });
    });

    // DROPDOWN HIDE FIX

    $('#menu-header-mobile a:not(.dropdown-toggle)').on('click', function () {
        $('#menu-header-mobile').collapse('hide');
    });


    //FIX CONTACT FORM 7 SUBMIT
    fixCF7MultiSubmit();

    function fixCF7MultiSubmit() {
        jQuery('input.wpcf7-submit[type="submit"]').click(function () {
            var disabled = jQuery(this).attr('data-disabled');
            if (disabled && disabled == "disabled") {
                return false;
            } else {
                jQuery(this).attr('data-disabled', "disabled");
                return true;
            }
        });
        jQuery('.wpcf7').bind("wpcf7submit", function () {
            jQuery(this).find('input.wpcf7-submit[type="submit"]').attr('data-disabled', "enabled");
        });
    }

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.wpcf7-tel').mask(SPMaskBehavior, spOptions);


    $("[data-trigger]").on("click", function () {
        var trigger_id = $(this).attr('data-trigger');
        $(trigger_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
    });

    // close button 
    $(".btn-close").click(function (e) {
        $(".navbar-collapse").removeClass("show");
        $("body").removeClass("offcanvas-active");
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $(document).ready(function () {
                if (document.getElementById('wpadminbar')) {
                    $('.navbar').addClass('wp-admin-space');
                    $('.navbar-collapse').removeClass('wp-admin-space-menu-mobile');
                } else {
                    $('.navbar').removeClass('wp-admin-space');
                }
            });
        } else {
            if (document.getElementById('wpadminbar')) {
                $('.navbar').removeClass('wp-admin-space');
                $('.navbar-collapse').addClass('wp-admin-space-menu-mobile');
            }
        }
    });

    // close if press ESC button 
    $(document).on('keydown', function (event) {
        if (event.keyCode === 27) {
            $(".navbar-collapse").removeClass("show");
            $("body").removeClass("overlay-active");
            $("body").removeClass("offcanvas-active");
        }
    });

    $(document).on('keyup', function (evt) {
        if (evt.keyCode == 27) {
            $(".navbar-collapse").removeClass("show");
            $("body").removeClass("overlay-active");
            $("body").removeClass("offcanvas-active");
        }
    });

});