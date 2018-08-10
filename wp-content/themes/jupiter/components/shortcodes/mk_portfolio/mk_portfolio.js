jQuery(function($) {

  'use strict';

  // Get All Related Layers
  var $portfolio = $('.portfolio-grid');
  var $imgs = $portfolio.find('img[data-mk-image-src-set]');

  if ( $portfolio.hasClass('portfolio-grid-lazyload') && $imgs.length ) {

    // Load Images if the user scrolls to them
    $(window).on('scroll.mk_portfolio_lazyload', MK.utils.throttle(500, function(){
      $imgs.each(function(index, elem) {
        if ( MK.utils.isElementInViewport(elem) ) {
          MK.component.ResponsiveImageSetter.init( $(elem) );
          $imgs = $imgs.not( $(elem) );  // Remove element from the list when loaded to reduce the amount of iteration in each()
        }
      });
    }));

    $(window).trigger('scroll.mk_portfolio_lazyload');

    // Handle the resize
    MK.component.ResponsiveImageSetter.onResize($imgs);

  } else {

    MK.component.ResponsiveImageSetter.init($imgs);
    MK.component.ResponsiveImageSetter.onResize($imgs);

  }


});


