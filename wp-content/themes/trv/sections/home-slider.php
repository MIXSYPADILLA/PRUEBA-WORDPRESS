<?php 
$slider_overlay = get_theme_mod('transportex_overlay_slider_color_control'); 
$transportex_slider_enable = get_theme_mod('transportex_slider_enable','true');
$transportex_slider_category = get_theme_mod('slider_category');
if($transportex_slider_enable != 'false')
{ ?>
<!--==================== SLIDER SECTION ====================-->
<section class="ta-slider-warraper">
  <div id="ta-slider" class="owl-carousel">
    <?php if(is_active_sidebar( 'sidebar-slider' )):
            dynamic_sidebar( 'sidebar-slider' ); 
            else:

              the_widget( 'transportex_slider_widget','slider_title=Transportex&slider_desc=To Add Slider Widget go to widgets > drag Tx - Slider Widget drop into Slider Section Widgets.&btnone=Read more&btnonelink=#&btntwo=Read more&btntwolink=#&image_uri=' . get_stylesheet_directory_uri() . '/images/slide/slide.jpg', array('before_widget' => '', 'after_widget' => '') );

              the_widget( 'transportex_slider_widget','slider_title=Transportex&slider_desc=To Add Slider Widget go to widgets > drag Tx - Slider Widget drop into Slider Section Widgets.&btnone=Read more&btnonelink=#&btntwo=Read more&btntwolink=#&image_uri=' . get_stylesheet_directory_uri() . '/images/slide/slide.jpg', array('before_widget' => '', 'after_widget' => '') );

            endif; ?>
  </div>
</section>
<?php } ?>
<div class="clearfix"></div>

