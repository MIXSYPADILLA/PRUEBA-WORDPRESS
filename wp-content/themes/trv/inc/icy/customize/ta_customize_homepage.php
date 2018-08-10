<?php function transportex_homepage_setting( $wp_customize ) { 
			
			$wp_customize->add_panel( 'homepage_setting', array(
                'priority' => 400,
                'capability' => 'edit_theme_options',
                'title' => __('Frontpage Settings', 'transportex'),
            ) );

            /* --------------------------------------
            =========================================
            Slider Section
            =========================================
            -----------------------------------------*/ 
            $wp_customize->add_section(
                'transportex_slider_section_settings', array(
                'title' => __('Slider Setting','transportex'),
                'panel'  => 'homepage_setting',
            ) );
			
			//Slider Enable/Disable setting
            $wp_customize->add_setting(
                'transportex_slider_enable', array(
                'default' => 'true',
                'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('transportex_slider_enable', array(
                'label'   => __('Hide/Show Slider Section', 'transportex'),
                'section' => 'transportex_slider_section_settings',
                'type'    => 'radio',
                 'choices'=>array('true'=>'On','false'=>'Off'),
            ));
			
			
			//Slider Overlay Color
			$wp_customize->add_setting(
				'transportex_overlay_slider_color_control', array( 'sanitize_callback' => 'sanitize_text_field',
				
			) );
			
			$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'transportex_overlay_slider_color_control', array(
				'label'      => __('Slider Overlay Color', 'transportex' ),
				'palette' => true,
				'section' => 'transportex_slider_section_settings')
			) );
			
			
			class transportex_slider_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<?php _e('<b><h3>How to add slider on the frontpage</b></h3>','transportex'); ?>
				<?php _e('For Enable slider on Front page Go to widget setting <b>( Appreance -> Widgets )</b> and drag <b> Tx- Slider widget</b> in Slider section widget area then fill the slider required filed.','transportex'); ?>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('slider_widget',	array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( new transportex_slider_Customize_Control( $wp_customize, 'slider_widget', array(	
				'section' => 'transportex_slider_section_settings',
			) )	);
			

			/* --------------------------------------
            =========================================
            Call To Action Section
            =========================================
            -----------------------------------------*/  
            //calltoaction settings
            $wp_customize->add_section(
                'transportex_calltoaction_section_settings', array(
                'title' => __('Call To Action Setting','transportex'),
                'description' => '',
                'panel'  => 'homepage_setting',
            ) ); 

        	//Call to action Enable / Disable setting
        	$wp_customize->add_setting(
        		'transportex_calltoaction_enable', array(
        		'default'        => 'true',
        		'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
        	) );
        	$wp_customize->add_control('transportex_calltoaction_enable', array(
        		'label'   => __('Hide/Show Call to Action Section', 'transportex'),
        		'section' => 'transportex_calltoaction_section_settings',
        		'type'    => 'radio',
        		'choices'=>array('true'=>'On','false'=>'Off'),
        	) );

            //Call to action Background image
            $wp_customize->add_setting( 'transportex_calltoaction_background', array(
                'sanitize_callback' => 'esc_url_raw',
            ) );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
            	'transportex_calltoaction_background', array(
                'label'    => __( 'Choose Background Image', 'transportex' ),
                'section'  => 'transportex_calltoaction_section_settings',
                'settings' => 'transportex_calltoaction_background',) 
            ) );
           
			//Callto-action overlay color
			$wp_customize->add_setting(
				'transportex_calltoaction_overlay_color', array( 'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control(new Transportex_Customize_Alpha_Color_Control( $wp_customize,'transportex_calltoaction_overlay_color', array(
				'label'      => __('Overlay Color', 'transportex' ),
				'palette' => true,
				'section' => 'transportex_calltoaction_section_settings')
			) );

            //product Text Color setting
            $wp_customize->add_setting(
                'transportex_calltoaction_text_color', array( 'sanitize_callback' => 'sanitize_text_field',
                
            ) );
            
            $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'transportex_calltoaction_text_color', array(
               'label'      => __('Text Color', 'transportex' ),
                'palette' => true,
                'section' => 'transportex_calltoaction_section_settings')
            ) );

            // Call to action Title Setting
            $wp_customize->add_setting(
            	'transportex_calltoaction_title', array(
                'default' => __('Make A Difference With <span>Expert Team</span>','transportex'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'transportex_calltoaction_title', array(
                'label'   => __('Call To Action Title','transportex'),
                'section' => 'transportex_calltoaction_section_settings',
                'type' => 'text',
            ) );
			
			// Call to action Description
            $wp_customize->add_setting(
            	'transportex_calltoaction_subtitle', array(
                'capability' => 'edit_theme_options',
				'sanitize_callback' => 'transportex_template_sanitize_text',
				'a'
            ) );  
            $wp_customize->add_control( 
            	'transportex_calltoaction_subtitle', array(
                'label'   => __('Call To Action SubTitle','transportex'),
                'section' => 'transportex_calltoaction_section_settings',
                'type' => 'textarea',
            ) );
   
            // Call to action Button  Label
            $wp_customize->add_setting(
                'transportex_calltoaction_button_one_label', array(
                'default' => __('Lets Start','transportex'),
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'transportex_calltoaction_button_one_label', array(
                'label'   => __('Button Title','transportex'),
                'section' => 'transportex_calltoaction_section_settings',
                'type' => 'text',
            ) ); 

            // Call to action Button  link
            $wp_customize->add_setting(
                'transportex_calltoaction_button_one_link', array(
                'default' => __('#','transportex'),
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'transportex_calltoaction_button_one_link', array(
                'label'   => __('Button URL','transportex'),
                'section' => 'transportex_calltoaction_section_settings',
                'type' => 'text'
            ) );  

             //Call to action Button Target
            $wp_customize->add_setting(
                'transportex_calltoaction_button_one_target', array(
                'default' => 'true',
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'transportex_calltoaction_button_one_target', array(
                'label'   => __('Open Link New window','transportex'),
                'section' => 'transportex_calltoaction_section_settings',
                'type' => 'checkbox'
            ) );
			
			
		    /* --------------------------------------
		    =========================================
		    Service Section
		    =========================================
		    -----------------------------------------*/  
		    // add section to manage Services
		    $wp_customize->add_section(
		        'transportex_service_section_settings', array(
		        'title' => __('Service Setting','transportex'),
		        'description' => '',
		        'panel'  => 'homepage_setting',
		    ) );

			//Service Enable / Disable setting
            $wp_customize->add_setting(
            	'transportex_service_enable', array(
                'default'        => 'true',
                'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control(
            	'transportex_service_enable', array(
                'label'   => __('Hide/Show Service Section', 'transportex'),
                'section' => 'transportex_service_section_settings',
                'type'    => 'radio',
                'choices'=>array('true'=>'On','false'=>'Off'),
            ) );
            
            //Service Background image
            $wp_customize->add_setting( 
            'transportex_service_background', array(
             'sanitize_callback' => 'esc_url_raw',
             ) );

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'transportex_service_background', array(
                'label'    => __( 'Choose Background Image', 'transportex' ),
                'section'  => 'transportex_service_section_settings',
                'settings' => 'transportex_service_background',
            ) ) );

             //Service Overlay 
		
            
            
             //Funfact Overlay Setting
		   $wp_customize->add_setting(
				'transportex_service_overlay_color', array( 'sanitize_callback' => 'sanitize_text_field',
						
			) );

			$wp_customize->add_control( new Transportex_Customize_Alpha_Color_Control( $wp_customize,'transportex_service_overlay_color', array(
				'label'      => __('Overlay Color', 'transportex' ),
				'section'    => 'transportex_service_section_settings',
				'palette' => true,
				'settings'   => 'transportex_service_overlay_color',) 
			) );
            
			

            //Service text color setting
            $wp_customize->add_setting(
                'transportex_service_text_color', array( 'sanitize_callback' => 'sanitize_text_field',
                
            ) );
            
            $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'transportex_service_text_color', array(
               'label'      => __('Text Color', 'transportex' ),
                'palette' => true,
                'section' => 'transportex_service_section_settings')
            ) );

            //Service Title setting
		   	$wp_customize->add_setting(
                'transportex_service_title', array(
                'default' => __('Show off those skills, work & awesome <span>projects</span>','transportex'),
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );	
            $wp_customize->add_control( 
            	'transportex_service_title',array(
                'label'   => __('Service Title','transportex'),
                'section' => 'transportex_service_section_settings',
                'type' => 'text',
            ) );

            //Service SubTitle setting
            $wp_customize->add_setting(
                'transportex_service_subtitle', array(
                'default' => 'laoreet ipsum eu laoreet. ugiignissimat Vivamus dignissim feugiat erat sit amet convallis.',
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'transportex_template_sanitize_text',
            ) );  
            $wp_customize->add_control( 'transportex_service_subtitle', array(
                'label'   => __('Service Subtitle','transportex'),
                'section' => 'transportex_service_section_settings',
                'type' => 'textarea',
            ) );
			
			
			class transportex_service_Customize_Control extends WP_Customize_Control {
				
				public $type = 'new_menu';
				public function render_content() {
				?>
				<p>
				<?php _e('<b><h3>How to add service on the frontpage</b></h3>','transportex'); ?>
				<?php _e('For Enable service on Front page Go to widget setting <b>( Appreance -> Widgets )</b> and drag <b> Tx- Service widget</b> in Service section widget area then fill the service required filed.','transportex'); ?>
				</p>
				<?php
				}
			}
			
			$wp_customize->add_setting('slider_widget',	array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( new transportex_service_Customize_Control( $wp_customize, 'slider_widget', array(	
				'section' => 'transportex_service_section_settings',
			) )	);

            
             /* --------------------------------------
		    =========================================
		    Callout Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Callout
		    $wp_customize->add_section(
		    	'transportex_callout_section_settings', array(
		        'title' => __('Callout Setting','transportex'),
		        'panel'  => 'homepage_setting',
		    ) );
			
			//Callout Enable / Disable setting
			$wp_customize->add_setting(
				'transportex_callout_enable', array(
				'default' => 'true',
				'capability' => 'edit_theme_options',
				 'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control(
				'transportex_callout_enable', array(
				'label' => __('Hide/Show Callout Section', 'transportex'),
				'section' => 'transportex_callout_section_settings',
				'type'    => 'radio',
				'choices' => array('true'=>'On','false'=>'Off'),
			) );

		    //Callout Background image
		    $wp_customize->add_setting( 
		    	'transportex_callout_background', array(
		    	'sanitize_callback' => 'esc_url_raw',
		    ) );

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
		    	'transportex_callout_background', array(
		    	'label'    => __( 'Choose Background Image', 'transportex' ),
		    	'section'  => 'transportex_callout_section_settings',
		    	'settings' => 'transportex_callout_background',) 
		    ) );

		    //Callout Overlay Color
			$wp_customize->add_setting(
				'transportex_callout_overlay_color', array( 'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control(new Transportex_Customize_Alpha_Color_Control( $wp_customize,'transportex_callout_overlay_color', array(
				'label' => 'Overlay Color',
				'palette' => true,
				'section' => 'transportex_callout_section_settings')
			) );

            //Callout Text Color setting
            $wp_customize->add_setting(
                'transportex_callout_text_color', array( 'sanitize_callback' => 'sanitize_text_field',
            ) );
            
            $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'transportex_callout_text_color', array(
               'label'      => __('Text Color', 'transportex' ),
                'palette' => true,
                'section' => 'transportex_callout_section_settings')
            ) );
			

            //Callout align Setting
            $wp_customize->add_setting(
                'transportex_callout_text_align', array(
                'default' => 'center',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'transportex_template_sanitize_text',
            ) );  
            $wp_customize->add_control( 
                'transportex_callout_text_align',array(
                'label' => __('Callout Text Align','transportex'),
                'section' => 'transportex_callout_section_settings',
                'type' => 'radio',
                'choices'=>array('left'=>'text-left','center'=>'text-center','right'=>'text-right'),
            ) );

		    // Callout Title Setting
		    $wp_customize->add_setting(
		    	'transportex_callout_title', array(
		        'default' => __('Reach Your Place Sure & Safe','transportex'),
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'transportex_template_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_title', array(
		    	'label'   => __('Callout Title','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'text',
		    ) );	

			// Callout Description Setting	    
		    $wp_customize->add_setting(
		    	'transportex_callout_description', array(
		        'default' => __('We take care with merchandise and deliver your order where you are on time.','transportex'),
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'transportex_template_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_description', array(
		    	'label'   => __('Callout Description','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'textarea',
		    ) );	

		    // Callout Button One Label Setting	 
		    $wp_customize->add_setting(
		    	'transportex_callout_button_one_label', array(
		        'default' => __('Buy Now!','transportex'),
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_button_one_label', array(
		    	'label' => __('Button One Title','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button One Link Setting	
		    $wp_customize->add_setting(
		    	'transportex_callout_button_one_link', array(
		        'default' => __('#','transportex'),
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_button_one_link',array(
		    	'label' => __('Button One URL','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button One Target Setting	
		    $wp_customize->add_setting(
		    	'transportex_callout_button_one_target', array(
		        'default' => 'true',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_button_one_target',array(
		    	'label' => __('Open Link New window','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );

		    //Callout Button Two Label Setting	
		    $wp_customize->add_setting(
		    	'transportex_callout_button_two_label', array(
		        'default' => __('Know More','transportex'),
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_button_two_label', array(
		    	'label' => __('Button Two Title','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'text',
		    ) );	

		    //Callout Button Two Link Setting
		    $wp_customize->add_setting(
		    	'transportex_callout_button_two_link', array(
		        'default' => '#',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'esc_url_raw',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_button_two_link', array(
		    	'label' => __('Button Two URL','transportex'),
		    	'type' => 'text',
		    	'section' => 'transportex_callout_section_settings',
		    ) );	

		    //Callout Button Two Target Setting
		    $wp_customize->add_setting(
		    	'transportex_callout_button_two_target', array(
		        'default' => 'true',
		        'capability' => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_text_field',
		    ) );	
		    $wp_customize->add_control( 
		    	'transportex_callout_button_two_target', array(
		    	'label' => __('Open Link New window','transportex'),
		    	'section' => 'transportex_callout_section_settings',
		    	'type' => 'checkbox',
		    ) );

            /* --------------------------------------
            =========================================
            Latest News Section
            =========================================
            -----------------------------------------*/
            // add section to manage Latest News
            $wp_customize->add_section(
                'transportex_news_section_settings', array(
                'title' => __('News & Events Setting','transportex'),
                'description' => '',
                'panel'  => 'homepage_setting'
            ) );
            
            //Latest News Enable / Disable setting

            $wp_customize->add_setting(
                'transportex_news_enable', array(
                'default' => 'true',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                
            ));
            $wp_customize->add_control('transportex_news_enable', array(
                'label' => __('Hide/Show News Section', 'transportex'),
                'section' => 'transportex_news_section_settings',
                'type' => 'radio',
                'choices'=>array('true'=>'On','false'=>'Off'),
            ));

            //Latest News Background Image
            $wp_customize->add_setting( 
                'transportex_news_background', array(
                'sanitize_callback' => 'esc_url_raw',
            ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
                'transportex_news_background', array(
                'label'    => __( 'Choose Background Image', 'transportex' ),
                'section'  => 'transportex_news_section_settings',
                'settings' => 'transportex_news_background', ) 
            ) );
            
            //Latest News Overlay color
            $wp_customize->add_setting(
                'transportex_news_overlay_color', array( 'sanitize_callback' => 'sanitize_text_field',
            ) );
            
            $wp_customize->add_control(new Transportex_Customize_Alpha_Color_Control( $wp_customize,'transportex_news_overlay_color', array(
                'label' => __('Overlay Color', 'transportex' ),
                'palette' => true,
                'section' => 'transportex_news_section_settings')
            ) );

            //Latest News text color
            $wp_customize->add_setting(
                'transportex_news_text_color', array( 'sanitize_callback' => 'sanitize_text_field',
            ) );
            
            $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'transportex_news_text_color', array(
                'label' => __('Text Color', 'transportex' ),
                'palette' => true,
                'section' => 'transportex_news_section_settings')
            ) );

            // hide meta content
            $wp_customize->add_setting(
                'disable_news_meta', array(
                'default' => false,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control(
                'disable_news_meta', array(
                'label' => __('Hide/Show Blog Meta:- Like author name,categories','transportex'),
                'section' => 'transportex_news_section_settings',
                'type' => 'checkbox',
            ) );

            // Latest News Title Setting
            $wp_customize->add_setting(
                'transportex_news_title', array(
                'default' => 'Latest News',
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );    
            $wp_customize->add_control( 
                'transportex_news_title',array(
                'label'   => __('Latest News Title','transportex'),
                'section' => 'transportex_news_section_settings',
                'type' => 'text',
            ) );

            // Latest News Subtitle Setting
            $wp_customize->add_setting(
                'transportex_news_subtitle', array(
                'default' => 'laoreet ipsum eu laoreet. ugiignissimat Vivamus dignissim feugiat erat sit amet convallis.',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'transportex_template_sanitize_text',
            ) );  
            $wp_customize->add_control( 
                'transportex_news_subtitle',array(
                'label'   => __('Latest News Subtitle','transportex'),
                'section' => 'transportex_news_section_settings',
                'type' => 'textarea',
            ) );    

            //Select number of latest news on front page
            $wp_customize->add_setting(
                'news_select', array(
                'default' =>'3',
                'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control(
                'news_select', array(
                'type' => 'select',
                'label' => __('Select Number of Post','transportex'),
                'section' => 'transportex_news_section_settings',
                'choices' => array('3'=>__('3', 'transportex'),'6' => __('6','transportex'), '9' => __('9','transportex'),'12'=> __('12','transportex'), '15'=> __('15','transportex'),'18'=> __('18','transportex'), '21' =>__('21','transportex')),
            ) );

			
			function transportex_template_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}
	
			function transportex_template_sanitize_html( $input ) {

			return force_balance_tags( $input );

			}
}

add_action( 'customize_register', 'transportex_homepage_setting' );
?>