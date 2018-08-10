(function( $ ) {
    'use strict';

    // If we want to get access to API of already initilised component we run a regular new conctructor.
    // When instance is discovered in cache object then we return exisiting instance.
    // 
    // TODO move it to core functions and run logic on init
    var _instancesCollection = {};

    MK.component.SwipeSlideshow = function( el ) {
        var $this = $( el );
        var id = $this.parent().attr('id');

        this.el = el;
        this.id = id;
        this.config = $this.data( 'swipeslideshow-config' );
        if( this.config ) this.config.hasPagination = false;
    };

    MK.component.SwipeSlideshow.prototype = {
        init : function() {
            var slider = new MK.ui.Slider( this.el, this.config );
            slider.init();

            _instancesCollection[ this.id ] = slider;
        }
    };


    // Additional nav
    // Mostly for thumbs in woocommerce
    MK.component.SwipeSlideshowExtraNav = function( el ) {
        this.el = el;
    };

    MK.component.SwipeSlideshowExtraNav.prototype = {
        init : function init() {
            this.cacheElements();
            this.bindEvents();
        },

        cacheElements : function cacheElements() {
            var $this = $( this.el );

            this.sliderId = $this.data( 'gallery' );
            this.slider = _instancesCollection[this.sliderId]; 
            this.$thumbs = $( '#' + this.sliderId ).find( '.thumbnails a');
        },

        bindEvents : function bindEvents() {
            this.$thumbs.on( 'click', this.clickThumb.bind( this ) );
        },

        clickThumb : function clickThumb( e ) {
            e.preventDefault();
            var $this = $( e.currentTarget ),
                id = $this.index();

            this.slider.goTo( id );
        }
    };


    // Mostly for switcher in woocommerce
    MK.utils.eventManager.subscribe('gallery-update', function(e, config) {
        if(typeof _instancesCollection[config.id] === 'undefined') return;
        _instancesCollection[config.id].reset();
    });


    /*---------------------------------------------------------------------------------*/
    /*  Lazy Load
    /*---------------------------------------------------------------------------------*/

    // Get All Related Layers
    var $swiper = $('.mk-swipe-slideshow');
    var $imgs = $swiper.find('img[data-mk-image-src-set]');

    if ( $swiper.hasClass('mk-swipe-slideshow-lazyload') && $imgs.length ) {

        // Load Images if the user scrolls to them
        $(window).on('scroll.mk_swipe_slideshow_lazyload', MK.utils.throttle(500, function(){
            $imgs.each(function(index, elem) {
                if ( MK.utils.isElementInViewport(elem) ) {
                    MK.component.ResponsiveImageSetter.init( $(elem) );
                    $imgs = $imgs.not( $(elem) );  // Remove element from the list when loaded to reduce the amount of iteration in each()
                }
            });
        }));

        $(window).trigger('scroll.mk_swipe_slideshow_lazyload');

        // Handle the resize
        MK.component.ResponsiveImageSetter.onResize($imgs);

    } else {

        MK.component.ResponsiveImageSetter.init($imgs);
        MK.component.ResponsiveImageSetter.onResize($imgs);

    }


})( jQuery );