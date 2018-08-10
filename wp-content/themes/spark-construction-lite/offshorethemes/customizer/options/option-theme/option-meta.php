<?php
/**
 * Customizer Options - Meta
 *
 * @package sparkconstructionlite
 */


$defaults = sparkconstructionlite_get_default_theme_options();


// Section - Meta
$wp_customize->add_section( 'sparkconstructionlite_meta_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Singel Post Meta Settings', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_theme_options'	
) );

// Show Post Date
$wp_customize->add_setting( 'sparkconstructionlite_date_meta', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_date_meta'],
) );

$wp_customize->add_control( 'sparkconstructionlite_date_meta', array(
	'label'				=> esc_html__( 'Show Post Date', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_meta_options',
	'type'				=> 'checkbox' 
) );

// Show Author Name
$wp_customize->add_setting( 'sparkconstructionlite_author_meta', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_author_meta'],
) );

$wp_customize->add_control( 'sparkconstructionlite_author_meta', array(
	'label'				=> esc_html__( 'Show Post Author', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_meta_options',
	'type'				=> 'checkbox' 
) );

// Show Categories
$wp_customize->add_setting( 'sparkconstructionlite_category_meta', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_category_meta'],
) );

$wp_customize->add_control( 'sparkconstructionlite_category_meta', array(
	'label'				=> esc_html__( 'Show Post Categorys', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_meta_options',
	'type'				=> 'checkbox' 
) );