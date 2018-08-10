<?php
/**
 * Customizer Options - About Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

$pages = sparkconstructionlite_get_pages();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_abtsec_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'About Section', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Enable Section
$wp_customize->add_setting( 'sparkconstructionlite_enable_abt_sec', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_abt_sec'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_abt_sec', array(
	'label'				=> esc_html__( 'Enable About Section', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_abtsec_option',
	'type'				=> 'checkbox', 
) );

// Section Title
$wp_customize->add_setting( 'sparkconstructionlite_abt_sec_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_abt_sec_title'],
) );

$wp_customize->add_control( 'sparkconstructionlite_abt_sec_title', array(
	'label'				=> esc_html__( 'Section Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_abtsec_option',
	'type'				=> 'text',
) );

// Section Sub Title
$wp_customize->add_setting( 'sparkconstructionlite_abt_sec_subtitle', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_abt_sec_subtitle'],
) );

$wp_customize->add_control( 'sparkconstructionlite_abt_sec_subtitle', array(
	'label'				=> esc_html__( 'Section Sub Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_abtsec_option',
	'type'				=> 'text',
) );

// Vid Link
$wp_customize->add_setting( 'sparkconstructionlite_abt_sec_vidlink', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['sparkconstructionlite_abt_sec_vidlink'],
) );

$wp_customize->add_control( 'sparkconstructionlite_abt_sec_vidlink', array(
	'label'				=> esc_html__( 'Section Vid Link', 'spark-construction-lite' ),
	'description'		=> esc_html__( 'Enter the link of youtube or vimeo video link here.', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_abtsec_option',
	'type'				=> 'url',
) );

// Pages
$wp_customize->add_setting( 'sparkconstructionlite_abt_sec_pages', array(
	'sanitize_callback' => 'sparkconstructionlite_repeater_data_field',
	'transport' => 'postMessage', // refresh or postMessage
) );
$wp_customize->add_control( new sparkconstructionlite_Repeater_Control( $wp_customize, 'sparkconstructionlite_abt_sec_pages', array(
    'label' 		=> esc_html__('Accordion Content', 'spark-construction-lite'),
    'description'   => '',
    'section'       => 'sparkconstructionlite_abtsec_option',
    'live_title_id' => '', // apply for unput text and textarea only
    'title_format'  => '', // [live_title]
    'max_item'      => 5, // Maximum item can add
    'limited_msg' 	=> esc_html__( 'Only 5 accordion items can be added.', 'spark-construction-lite' ),
    'fields'    => array(
    	'sparkconstructionlite_abt_sec_page'  => array(
        	'title' => esc_html__('Page', 'spark-construction-lite'),
        	'type'  => 'select',
        	'options' => $pages
        ),
    ),
) ) );