<?php $transportex_service_enable = get_theme_mod('transportex_service_enable','true'); 
$transportex_service_overlay_color = get_theme_mod('transportex_service_overlay_color');
$transportex_service_background = get_theme_mod('transportex_service_background');
$transportex_service_text_color = get_theme_mod('transportex_service_text_color'); ?>
<style>
  #service h1 {
    color: <?php echo $transportex_service_text_color ?>;
  }
</style>
<?php if($transportex_service_enable !='false') { ?>
<!--==================== SERVICE SECTION ====================-->
<?php if($transportex_service_background != '') { ?>

<section id="service" class="ta-service-section" style="background-image:url('<?php echo $transportex_service_background;?>');">
<?php } else { ?>
<section id="service" class="ta-service-section">
  <?php } ?>
  <div class="overlay" style="background-color: <?php echo esc_attr($transportex_service_overlay_color);?>;">



  <div class="container">
    <div class="row padding-bottom-80 text-left">
      <div class="ta-heading">
            <?php
              $transportex_service_title = get_theme_mod('transportex_service_title',__('Our <span>Service</span> Says','transportex'));
            
            if( !empty($transportex_service_title) ):
          
              echo '<h3 class="ta-heading-inner">'.$transportex_service_title.'</h3>';
              
            endif; ?>
          </div>
          <?php $transportex_service_subtitle = get_theme_mod('transportex_service_subtitle',__('laoreet ipsum eu laoreet. ugiignissimat Vivamus dignissim feugiat erat sit amet convallis.','transportex'));

            if( !empty($transportex_service_subtitle) ):

              echo '<p class="subtitle">'.$transportex_service_subtitle.'</p>';

            endif; ?>
      </div>

    <div class="row">
     <div id="service-home">
      <?php 
		if(is_active_sidebar( 'servicehome_widget_area' )):
						
			dynamic_sidebar( 'servicehome_widget_area' );

			else: ?>
            <div class="margin-bottom-50 text-center"> 
           <?php echo "Service Home Widget Area"; ?>
            </div>
        <?php
		endif;
	  ?></div>
    </div>
  </div>
 </div> 
</section>
<?php } ?>