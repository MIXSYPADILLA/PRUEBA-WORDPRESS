<?php
/**
 * Customizer Options - Header
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_header_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Top Header Settings', 'spark-construction-lite' ),
	'description'	=> esc_html__( 'Configure Theme Header Section', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_theme_options'	
) );

// Tel Phone No
$wp_customize->add_setting( 'sparkconstructionlite_tel_phone_no', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_tel_phone_no'],
) );

$wp_customize->add_control( 'sparkconstructionlite_tel_phone_no', array(
	'label'				=> esc_html__( 'Company Contact Number', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_header_options',
	'type'				=> 'text', 
) );

// Email Number
$wp_customize->add_setting( 'sparkconstructionlite_company_email', array(
	'sanitize_callback'	=> 'sanitize_email',
	'default'			=> $defaults['sparkconstructionlite_company_email'],
) );

$wp_customize->add_control( 'sparkconstructionlite_company_email', array(
	'label'				=> esc_html__( 'Company Email', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_header_options',
	'type'				=> 'email', 
) );

// Working Hours
$wp_customize->add_setting( 'sparkconstructionlite_working_hour', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_working_hour'],
) );

$wp_customize->add_control( 'sparkconstructionlite_working_hour', array(
	'label'				=> esc_html__( 'Company Working Hour', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_header_options',
	'type'				=> 'text', 
) );

