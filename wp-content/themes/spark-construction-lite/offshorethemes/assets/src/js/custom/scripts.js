( function($) {
    'use strict';

    $(document).ready(function() {

        // init bact to top button
        $('body').append('<div id="toTop" class="btn_backtotop"><i class="fa fa-level-up" aria-hidden="true"></i></div>');
        $(window).scroll(function() {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function() {
            $("html, body").animate({ scrollTop: 0 }, 1200);
            return false;
        });


        // Init primary nav 

        $('.primary_nav').slimmenu({
            resizeWidth: '800',
            collapserTitle: '',
            animSpeed: 'medium',
            easingEffect: '',
            indentChildren: true,
            childrenIndenter: '',
            expandIcon: '<i class="fa fa-angle-down" aria-hidden="true"></i>',
            collapseIcon: '<i class="fa fa-angle-up" aria-hidden="true"></i>',

        });

        $(".primary_nav").append('<li class="primarynav_search_icon"><a data-toggle="modal" data-target=".bs-example-modal-lg" class="search_box" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>');
        $(".primary_nav").prepend('<li class="menu_close_btn"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></li>');

        $('.menu_close_btn').click(function(e) {
            e.preventDefault();
            $('.primary_nav').slideToggle();
        });

        // init owl for main homepage slider

        $('.home_page_slider').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: true,
            rtl: false,
            dots: false,
            autoplay: true,
            autoWidth: false,
            stagePadding: 0,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],

        });

        // youtube video fancybox styles

        $("a[rel^='prettyPhoto']").prettyPhoto({
            show_title: false,
            default_width: 853,
            default_height: 480,
            social_tools: false,
            deeplinking: false,
            markup: '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#">next</a> \
                                            <a class="pp_previous" href="#">previous</a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>',
        });

        // who we are section accordion

        $('.who_we_are_accordion > li:eq(0) a').addClass('active').next().slideDown();

        $('.who_we_are_accordion a').click(function(j) {
            var dropDown = $(this).closest('li').find('p');

            $(this).closest('.who_we_are_accordion').find('p').not(dropDown).slideUp();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).closest('.who_we_are_accordion').find('a.active').removeClass('active');
                $(this).addClass('active');
            }

            dropDown.stop(false, true).slideToggle();

            j.preventDefault();
        });


        // counterup 

        $('.counter').counterUp({
            delay: 10,
            time: 4000,
            offset: 70,
            beginAt: 0,
            formatter: function(n) {
                return n.replace(/,/g, '.');
            }
        });

        // init team carousel

        $('.team_carousel').owlCarousel({
            items: 4,
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                400: {
                    items: 1
                },
                500: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 3
                },
                1024: {

                    items: 3
                },
                1200: {
                    items: 4
                }
            },

        });

        // init testimonial carousel

        $('.testinomial_carousel').owlCarousel({
            items: 2,
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            autoplay: false,
            autoplayTimeout: 100000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 2
                },
                1200: {
                    items: 2
                }
            },

        });

        // init owl for partners

        $('.partners_carousel').owlCarousel({
            items: 6,
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                390: {
                    items: 2
                },
                768: {
                    items: 4
                },
                992: {
                    items: 4
                },
                1024: {

                    items: 5
                },
                1200: {
                    items: 6
                }
            },

        });

    });

} ) (jQuery);