(function($) {
  'use strict';

  /* Page Section Intro Effects */
  /* -------------------------------------------------------------------- */

  function mk_section_intro_effects() {
    if (!MK.utils.isMobile()) {
      if (!$.exists('.mk-page-section.intro-true')) return;

      $('.mk-page-section.intro-true').each(function() {
        var that = this;
        MK.core.loadDependencies([ MK.core.path.plugins + 'jquery.sectiontrans.js', MK.core.path.plugins + 'tweenmax.js' ], function() {
          var $this = $(that),
            $pageCnt = $this.parent().nextAll('div'),
            windowHeight = $(window).height(),
            effectName = $this.attr('data-intro-effect'),
            $header = $('.mk-header');

          var effect = {
            fade: new TimelineLite({paused: true})
              .set($pageCnt, { opacity: 0, y: windowHeight * 0.3 })
              .to($this, 1, { opacity: 0, ease:Power2.easeInOut })
              .to($pageCnt, 1, { opacity: 1, y: 0, ease:Power2.easeInOut}, "-=.7")
              .set($this, { zIndex: '-1'}),

            zoom_out: new TimelineLite({paused: true})
              .set($pageCnt, { opacity: 0, y: windowHeight * 0.3})
              .to($this, 1.5, { opacity: .8, scale: 0.8, y: -windowHeight - 100, ease:Strong.easeInOut })
              .to($pageCnt, 1.5, { opacity: 1, y:  0, ease:Strong.easeInOut}, "-=1.3"),

            shuffle: new TimelineLite({paused: true})
              .to($this, 1.5, { y: -windowHeight/2, ease:Strong.easeInOut })
              .to($pageCnt.first(), 1.5, { paddingTop: windowHeight/2, ease:Strong.easeInOut }, "-=1.3")
          };

          console.log($pageCnt);
        

          $this.sectiontrans({
            effect: effectName
          });

          if($this.hasClass('shuffled')) {
            TweenLite.set($this, { y: -windowHeight/2 });
            TweenLite.set($this.nextAll('div').first(), { paddingTop: windowHeight/2 });
          }

          $('body').on('page_intro', function() {
            MK.utils.scroll.disable();
            $(this).data('intro', true);
            effect[effectName].play();
            setTimeout(function() {
              $header.addClass('pre-sticky');
              $header.addClass('a-sticky');
              $('.mk-header-padding-wrapper').addClass('enable-padding');
              $('body').data('intro', false);
              if(effectName === 'shuffle') $this.addClass('shuffled');
            }, 1000);

            setTimeout(MK.utils.scroll.enable, 1500);
          });

          $('body').on('page_outro', function() {
            MK.utils.scroll.disable();
            $(this).data('intro', true);
            effect[effectName].reverse();
            setTimeout(function() {
              $header.removeClass('pre-sticky');
              $header.removeClass('a-sticky');
              $('.mk-header-padding-wrapper').removeClass('enable-padding');
              $('body').data('intro', false);
              if($this.hasClass('shuffled')) $this.removeClass('shuffled');
            }, 1000);
            
            setTimeout(MK.utils.scroll.enable, 1500);
          });
        });
      });

    } else {
      $('.mk-page-section.intro-true').each(function() {
        $(this).attr('data-intro-effect', '');
      });
    }
  }

  mk_section_intro_effects();

  var debounceResize = null;
  $(window).on("resize", function() {
    if( debounceResize !== null ) { clearTimeout( debounceResize ); }
    debounceResize = setTimeout( mk_section_intro_effects, 300 );
  });
  
  /* Page Section Adaptive Height */
  /* -------------------------------------------------------------------- */
    
  function mk_section_adaptive_height() {
      $( ".mk-page-section.mk-adaptive-height" ).each( function() {
          var imageHeight = $( this ).find( ".mk-adaptive-image" ).height();
          $( this ).css( "height", imageHeight );
      });
  }
  
  $( window ).on( "load resize", mk_section_adaptive_height );


  /* Page Section Image Loader */
  /* -------------------------------------------------------------------- */

  // Get All Related Layers
  var $allLayers = $('.mk-page-section .background-layer').filter(function(index) {
    var isLazyLoad = $(this).attr('data-mk-lazyload') === 'true';
    if ( !isLazyLoad ) {
      MK.component.BackgroundImageSetter.init( $(this) );
    }
    return isLazyLoad;
  });;
  
  // Load BG Images if the user scroll to them
  if ( $allLayers.length ) {

    $(window).on('scroll.mk_page_section_lazyload', MK.utils.throttle(500, function(){
      $allLayers.each(function(index, elem) {
        if ( MK.utils.isElementInViewport(elem) ) {
          MK.component.BackgroundImageSetter.init( $(elem) );
          $allLayers = $allLayers.not( $(elem) );  // Remove element from the list when loaded to reduce the amount of iteration in each()
        }
      });
    }));

    // First init
    $(window).trigger('scroll.mk_page_section_lazyload');

    // Handle the resize
    MK.component.BackgroundImageSetter.onResize($allLayers);

  }

  /* Page Section Layout */
  /* -------------------------------------------------------------------- */

  function mk_section_half_layout() {
    $(".mk-page-section.half_boxed").each(function() {
      var $section = $(this);
      if ($(window).width() > mk_grid_width) {
        var margin = ($(window).width() - mk_grid_width) / 2;
        var $section_inner = $section.find('.mk-half-layout-inner');
        if($section.hasClass('half_left_layout')){
          $section_inner.css({
            marginRight: margin + 'px'
          });
        }
        if($section.hasClass('half_right_layout')){
          $section_inner.css({
            marginLeft: margin + 'px'
          });
        }
      }
    });
  }

  $(window).on("load resize", mk_section_half_layout);


}(jQuery));