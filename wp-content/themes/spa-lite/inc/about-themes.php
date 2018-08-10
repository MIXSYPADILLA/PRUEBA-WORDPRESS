<?php
//about theme info
add_action( 'admin_menu', 'spa_lite_abouttheme' );
function spa_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'spa-lite'), esc_html__('About Theme', 'spa-lite'), 'edit_theme_options', 'spa_lite_guide', 'spa_lite_mostrar_guide');   
} 
//guidline for about theme
function spa_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'spa-lite'); ?>
		   </div>
          <p><?php esc_attr_e('SKT Spa Lite is a spa and massage parlor WordPress theme suitable for spa, manicure, pedicure, massage, health clubs, panchkarma, ayurveda, yoga, fitness trainer, hairdresser, beauty, clinic, barber, therapist, pool, treatment, depression, stress, nail salon, herbal, luxury, resort, hotel, services and any other industry since the theme is multipurpose and is compatible with Visual Composer (WP Bakery), Elementor, Beaver and other page builders as well as WooCommerce for eCommerce shop and contact form plugins for call to action. Widget friendly and responsive mobile friendly and color changing.','spa-lite'); ?></p>
		  <a href="<?php echo esc_url(SPA_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SPA_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'spa-lite'); ?></a> | 
				<a href="<?php echo esc_url(SPA_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'spa-lite'); ?></a> | 
				<a href="<?php echo esc_url(SPA_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'spa-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SPA_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>