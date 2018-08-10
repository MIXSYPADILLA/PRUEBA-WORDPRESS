<?php
/**
 * Customizer Options - Home Page
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

// Section - Home
$wp_customize->add_section( 'sparkconstructionlite_home_page_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Enable Home Page (Front Page )', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Display Home Page Layout
$wp_customize->add_setting( 'sparkconstructionlite_enable_home_page', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_home_page'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_home_page', array(
	'label'				=> esc_html__( 'Enable Home Page', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_home_page_option',
	'type'				=> 'checkbox', 
) );
