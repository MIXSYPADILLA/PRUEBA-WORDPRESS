<?php
/**
 * Customizer Options - Offer Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

$pages = sparkconstructionlite_get_pages();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_off_sec_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Our Services Section', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Enable Section
$wp_customize->add_setting( 'sparkconstructionlite_enable_off_sec', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_off_sec'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_off_sec', array(
	'label'				=> esc_html__( 'Enable Offer Section', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_off_sec_option',
	'type'				=> 'checkbox', 
) );

// Section Title
$wp_customize->add_setting( 'sparkconstructionlite_off_sec_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_off_sec_title'],
) );

$wp_customize->add_control( 'sparkconstructionlite_off_sec_title', array(
	'label'				=> esc_html__( 'Section Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_off_sec_option',
	'type'				=> 'text', 
) );

// Section Sub Title
$wp_customize->add_setting( 'sparkconstructionlite_off_sec_subtitle', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_off_sec_subtitle'],
) );

$wp_customize->add_control( 'sparkconstructionlite_off_sec_subtitle', array(
	'label'				=> esc_html__( 'Section Sub Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_off_sec_option',
	'type'				=> 'text', 
) );

// Offer Pages
$wp_customize->add_setting( 'sparkconstructionlite_off_page_selection', array(
	'sanitize_callback' => 'sparkconstructionlite_repeater_data_field',
	'transport' => 'postMessage', // refresh or postMessage
) );

$wp_customize->add_control( new sparkconstructionlite_Repeater_Control( $wp_customize,	'sparkconstructionlite_off_page_selection', array(
    'label' 		=> esc_html__('Services Area', 'spark-construction-lite'),
    'description'   => '',
    'section'       => 'sparkconstructionlite_off_sec_option',
    'live_title_id' => '', // apply for unput text and textarea only
    'title_format'  => '', // [live_title]
    'max_item'      => 6, // Maximum item can add
    'limited_msg' 	=> esc_html__( 'Only 6 items can be added.', 'spark-construction-lite' ),
    'fields'    => array(
    	'sparkconstructionlite_off_page'  => array(
        	'title' => esc_html__('Services Page', 'spark-construction-lite'),
        	'type'  => 'select',
        	'options' => $pages
        ),
        'sparkconstructionlite_off_icon'  => array(
        	'title' => esc_html__('Icon', 'spark-construction-lite'),
        	'type'  =>'icon',
        ),
    ),
  
) ) );

// Offer Content Length
$wp_customize->add_setting( 'sparkconstructionlite_off_sec_content', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_number',
	'default'			=> $defaults['sparkconstructionlite_off_sec_content'],
) );

$wp_customize->add_control( 'sparkconstructionlite_off_sec_content', array(
	'label'				=> esc_html__( 'Services Content Length', 'spark-construction-lite' ),
	'description'		=> esc_html__( 'Enter the length of contents of page to be displayed. Default is 12.', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_off_sec_option',
	'type'				=> 'number', 
) );