(function($) {
    'use strict';

    var zIndex = 0;

    $('.mk-newspaper-wrapper').on('click', '.blog-loop-comments', function (event) {
        event.preventDefault();

        var $this = $(event.currentTarget);
        var $parent = $this.parents('.mk-blog-newspaper-item');

        $parent.css('z-index', ++zIndex);
        $this.parents('.newspaper-item-footer').find('.newspaper-social-share').slideUp(200).end().find('.newspaper-comments-list').slideDown(200);
        setTimeout( function() {
          MK.utils.eventManager.publish('item-expanded');
        }, 300);
    });

    $('.mk-newspaper-wrapper').on('click', '.newspaper-item-share', function (event) {
        event.preventDefault();

        var $this = $(event.currentTarget);
        var $parent = $this.parents('.mk-blog-newspaper-item');

        $parent.css('z-index', ++zIndex);
        $this.parents('.newspaper-item-footer').find('.newspaper-comments-list').slideUp(200).end().find('.newspaper-social-share').slideDown(200);
        setTimeout( function() {
          MK.utils.eventManager.publish('item-expanded');
        }, 300);
    });


    // Get All Related Layers
    var $blog = $('.mk-blog-container');
    var $imgs = $blog.find('img[data-mk-image-src-set]');

    if ( $blog.hasClass('mk-blog-container-lazyload') && $imgs.length ) {

        // Load Images if the user scrolls to them
        $(window).on('scroll.mk_blog_lazyload', MK.utils.throttle(500, function(){
            $imgs.each(function(index, elem) {
                if ( MK.utils.isElementInViewport(elem) ) {
                    MK.component.ResponsiveImageSetter.init( $(elem) );
                    $imgs = $imgs.not( $(elem) );  // Remove element from the list when loaded to reduce the amount of iteration in each()
                }
            });
        }));

        $(window).trigger('scroll.mk_blog_lazyload');

        // Handle the resize
        MK.component.ResponsiveImageSetter.onResize($imgs);

    } else {

        MK.component.ResponsiveImageSetter.init($imgs);
        MK.component.ResponsiveImageSetter.onResize($imgs);

    }

}(jQuery));