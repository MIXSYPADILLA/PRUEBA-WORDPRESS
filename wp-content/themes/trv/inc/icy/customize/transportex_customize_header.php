<?php
function transportex_header_setting( $wp_customize ) {
/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority' => 400,
		'capability' => 'edit_theme_options',
		'title' => __('Header Settings', 'transportex'),
	) );
	
	// add Header widget one Setting

    $wp_customize->add_setting(
		'transportex_head_info_one', array(
        'default' => __('<a><i class="fa fa-clock-o "></i>Open-Hours:10 am to 7pm</a>','transportex'),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transportex_sanitize_text',
    ) );
    $wp_customize->add_control( 'transportex_head_info_one', array(
        'label' => __('Info one', 'transportex'),
        'section' => 'header_contact',
        'type' => 'textarea',
    ) );
	
	
	$wp_customize->add_setting(
		'transportex_head_info_two', array(
        'default' => __('<a href="mailto:info@themeansar.com" title="Mail Me"><i class="fa fa-envelope"></i> info@themeansar.com</a>','transportex'),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'transportex_sanitize_text',
    ) );
    $wp_customize->add_control( 'transportex_head_info_two', array(
        'label' => __('Info two', 'transportex'),
        'section' => 'header_contact',
        'type' => 'textarea',
    ) );

    $wp_customize->add_section( 'header_widget_one' , array(
		'title' => __('Header Widget One Setting', 'transportex'),
		'panel' => 'header_options',
		'priority'    => 600,
   	) );

   	$wp_customize->add_setting(
    	'transportex_header_widget_one_icon', array(
        'default' => __('fa-phone','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_one_icon', array(
        'label' => __('One Icon','transportex'),
        'section' => 'header_widget_one',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_one_title', array(
        'default' => __('Call Us:','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_one_title',array(
        'label'   => __('One Title','transportex'),
        'section' => 'header_widget_one',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_one_description', array(
        'default' => __('1800-6666-8888','transportex'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_one_description', array(
        'label' => __('One Description','transportex'),
        'section' => 'header_widget_one',
        'type' => 'textarea',
    ) );

    // add Header widget Two Setting
    
    $wp_customize->add_section( 'header_widget_two' , array(
		'title' => __('Header Widget Two Setting', 'transportex'),
		'panel' => 'header_options',
		'priority'    => 620,
   	) );

   	$wp_customize->add_setting(
    	'transportex_header_widget_two_icon', array(
        'default' => __('fa-map-marker','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_two_icon', array(
        'label' => __('Two Icon','transportex'),
        'section' => 'header_widget_two',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_two_title', array(
        'default' => __('Email Us:','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_two_title',array(
        'label'   => __('Two Title','transportex'),
        'section' => 'header_widget_two',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_two_description', array(
        'default' => __('info@company.com','transportex'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_two_description', array(
        'label' => __('Two Description','transportex'),
        'section' => 'header_widget_two',
        'type' => 'textarea',
    ) );

    // add Header widget Three Setting
    
    $wp_customize->add_section( 'header_widget_three' , array(
		'title' => __('Header Widget Three Setting', 'transportex'),
		'panel' => 'header_options',
		'priority'    => 620,
   	) );

   	$wp_customize->add_setting(
    	'transportex_header_widget_three_icon', array(
        'default' => __('fa-clock-o','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_three_icon', array(
        'label' => __('Three Icon','transportex'),
        'section' => 'header_widget_three',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_three_title', array(
        'default' => __('7:30 AM - 7:30 PM','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_three_title',array(
        'label'   => __('Three Title','transportex'),
        'section' => 'header_widget_three',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_three_description', array(
        'default' => __('Monday to Saturday','transportex'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_three_description', array(
        'label' => __('Three Description','transportex'),
        'section' => 'header_widget_three',
        'type' => 'textarea',
    ) );

    // add Header widget Three Setting
    
    $wp_customize->add_section( 'header_widget_four' , array(
        'title' => __('Header Widget Four Setting', 'transportex'),
        'panel' => 'header_options',
        'priority'    => 620,
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_four_label', array(
        'default' => __('Get Quote','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_four_label', array(
        'label' => __('Four Label','transportex'),
        'section' => 'header_widget_four',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_four_link', array(
        'default' => __('#','transportex'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_four_link',array(
        'label'   => __('Four Link','transportex'),
        'section' => 'header_widget_four',
        'type' => 'text',
    ) );

    $wp_customize->add_setting(
        'transportex_header_widget_four_target', array(
        'default' => 'true',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );  
    $wp_customize->add_control( 
        'transportex_header_widget_four_target', array(
        'label' => __('Open Link New window','transportex'),
        'section' => 'header_widget_four',
        'type' => 'checkbox',
    ) );
	
	
	function transportex_header_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	function transportex_sanitize_text( $input ) {
      return wp_kses_post( force_balance_tags( $input ) );
  }
	
	
	}
	add_action( 'customize_register', 'transportex_header_setting' );
	?>