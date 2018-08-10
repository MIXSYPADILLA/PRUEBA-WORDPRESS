<?php
/**
 * Customizer Options - Partner Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

$pages = sparkconstructionlite_get_pages();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_part_sec_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Partner Section', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Enable Section
$wp_customize->add_setting( 'sparkconstructionlite_enable_part_sec', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_part_sec'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_part_sec', array(
	'label'				=> esc_html__( 'Enable Partner Section', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_part_sec_option',
	'type'				=> 'checkbox', 
) );

// Section Title
$wp_customize->add_setting( 'sparkconstructionlite_part_sec_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_part_sec_title'],
) );

$wp_customize->add_control( 'sparkconstructionlite_part_sec_title', array(
	'label'				=> esc_html__( 'Section Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_part_sec_option',
	'type'				=> 'text', 
) );

// Section Sub Title
$wp_customize->add_setting( 'sparkconstructionlite_part_sec_subtitle', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_part_sec_subtitle'],
) );

$wp_customize->add_control( 'sparkconstructionlite_part_sec_subtitle', array(
	'label'				=> esc_html__( 'Section Sub Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_part_sec_option',
	'type'				=> 'text', 
) );

// Team Pages
$wp_customize->add_setting( 'sparkconstructionlite_part_content_selection', array(
	'sanitize_callback' => 'sparkconstructionlite_repeater_data_field',
	'transport' => 'postMessage', // refresh or postMessage
) );
$wp_customize->add_control( new sparkconstructionlite_Repeater_Control( $wp_customize,	'sparkconstructionlite_part_content_selection', array(
    'label' 		=> esc_html__('Partner Content', 'spark-construction-lite'),
    'description'   => '',
    'section'       => 'sparkconstructionlite_part_sec_option',
    'live_title_id' => '', // apply for unput text and textarea only
    'title_format'  => '', // [live_title]
    'max_item'      => 8, // Maximum item can add
    'limited_msg' 	=> esc_html__( 'Only 8 items can be added.', 'spark-construction-lite' ),
    'fields'    => array(
    	'sparkconstructionlite_part_image'  => array(
        	'title' => esc_html__('Partner Image', 'spark-construction-lite'),
        	'type'  => 'media',
        ),
        'sparkconstructionlite_part_link'  => array(
        	'title' => esc_html__('Partner Link', 'spark-construction-lite'),
        	'type'  =>'url',
        ),
    ),
  
) ) );