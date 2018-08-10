<?php 
/**
 *Massage Spa Theme Customizer
 *
 * @package Massage Spa
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function massage_spa_customize_register( $wp_customize ) {	
	
	function massage_spa_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
			'title'	=> __('Site Layout','massage-spa'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
			'sanitize_callback' => 'massage_spa_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	   'section'   => 'layout_option',    	 
		   'label'	=> __('Check to Box Layout','massage-spa'),
		   'description'	=> __('if you want to box layout please check the Box Layout Option.','massage-spa'),
    	   'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#cf3a35',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','massage-spa'),			
			 'description'	=> __('More color options in PRO Version','massage-spa'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
            'title' => __('Slider Section', 'massage-spa'),
            'priority' => null,
			'description'	=> __('Default image size for slider is 1400 x 717 pixel.','massage-spa'),            			
    ));
	
	$wp_customize->add_setting('sliderpage1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('sliderpage1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','massage-spa'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('sliderpage2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','massage-spa'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('sliderpage3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','massage-spa'),
			'section'	=> 'slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('slider_morebtn',array(
	 		'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 
	 $wp_customize->add_control('slider_morebtn',array(
	 		'settings'	=> 'slider_morebtn',
			'section'	=> 'slider_options',
			'label'		=> __('Add text for slide read more button','massage-spa'),
			'type'		=> 'text'
	 ));// Slider Read more	
	
	$wp_customize->add_setting('show_slider',array(
				'default' => false,
				'sanitize_callback' => 'massage_spa_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
			   'settings' => 'show_slider',
			   'section'   => 'slider_options',
			   'label'     => __('Check To Show This Section','massage-spa'),
			   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	  // Three Column Services Section
	$wp_customize->add_section('pageboxs_section', array(
		'title'	=> __('Services Page Section','massage-spa'),
		'description'	=> __('Select pages from the dropdown for three column Services Page section','massage-spa'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('services-pagebox1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox1',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));		
	
	$wp_customize->add_setting('services-pagebox2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox2',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('services-pagebox3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox3',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('services-pagebox4',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'services-pagebox4',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('show_servicesbox',array(
			'default' => false,
			'sanitize_callback' => 'massage_spa_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_servicesbox', array(
			   'settings' => 'show_servicesbox',
			   'section'   => 'pageboxs_section',
			   'label'     => __('Check To Show This Section','massage-spa'),
			   'type'      => 'checkbox'
	 ));//Show Services Section	 
	
	
	// Fashioners Page Section 	
	$wp_customize->add_section('fashioners_section', array(
		'title'	=> __('We are Fashioners Section','massage-spa'),
		'description'	=> __('Select Pages from the dropdown for We are Fashioners section','massage-spa'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('fashioner_page',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
		));
 
	$wp_customize->add_control(	'fashioner_page',array(
			'type' => 'dropdown-pages',			
			'section' => 'fashioners_section',
	));		
	
	
	$wp_customize->add_setting('show_fashioner_page',array(
			'default' => false,
			'sanitize_callback' => 'massage_spa_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_fashioner_page', array(
			   'settings' => 'show_fashioner_page',
			   'section'   => 'fashioners_section',
			   'label'     => __('Check To Show This Section','massage-spa'),
			   'type'      => 'checkbox'
	 ));//Show Fashioner Page Section 
	 
		 
}
add_action( 'customize_register', 'massage_spa_customize_register' );

function massage_spa_custom_css(){
		?>
        	<style type="text/css"> 					
					a, .recent_articles h2 a:hover,
				#sidebar ul li a:hover,									
				.recent_articles h3 a:hover,					
				.recent-post h6:hover,					
				.page-four-column:hover h3,												
				.postmeta a:hover,				
				.header-menu ul li a:hover, 
				.header-menu ul li.current-menu-item a,
				.header-menu ul li.current-menu-parent a.parent,
				.header-menu ul li.current-menu-item ul.sub-menu li a:hover,
				.social-icons a:hover{ 
				   color:<?php echo esc_html( get_theme_mod('color_scheme','#cf3a35')); ?>;
				   }					 
					
				.pagination ul li .current, .pagination ul li a:hover, 
				#commentform input#submit:hover,					
				.nivo-controlNav a.active,
				.learnmore,					
				.appbutton:hover,					
				#sidebar .search-form input.search-submit,				
				.wpcf7 input[type='submit'],
				#featureswrap,
				.column-four:hover .learnmore,
				nav.pagination .page-numbers.current{ 
					background-color:<?php echo esc_html( get_theme_mod('color_scheme','#cf3a35')); ?>;
				}					
			</style> 
<?php         
}          
add_action('wp_head','massage_spa_custom_css');	 


/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function massage_spa_customize_preview_js() {
	wp_enqueue_script( 'massage_spa_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'massage_spa_customize_preview_js' );