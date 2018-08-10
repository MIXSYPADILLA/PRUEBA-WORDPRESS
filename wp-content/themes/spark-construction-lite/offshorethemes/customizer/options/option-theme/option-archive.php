<?php
/**
 * Customizer Options - Archive Page
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

// Section - Home
$wp_customize->add_section( 'sparkconstructionlite_archive_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Archive Page Layout Settings', 'spark-construction-lite' ),
	'description'	=> esc_html__( 'The options are affective on all archive pages such as blog, search, archive etc...', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_theme_options'	
) );

// Sidebar Position
$wp_customize->add_setting( 'sparkconstructionlite_archive_sidebar', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_select',
	'default'			=> $defaults['sparkconstructionlite_archive_sidebar'],
) );

$wp_customize->add_control( 'sparkconstructionlite_archive_sidebar', array(
	'label'				=> esc_html__( 'Sidebar Position', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_archive_option',
	'type'				=> 'radio', 
	'choices'			=> array(
		'right'	=> esc_html__( 'Right', 'spark-construction-lite' ),
		'left'	=> esc_html__( 'Left', 'spark-construction-lite' ),
		'none'	=> esc_html__( 'None', 'spark-construction-lite' ),
	),
) );

// Excerpt Length
$wp_customize->add_setting( 'sparkconstructionlite_excerpt_length', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_number',
	'default'			=> $defaults['sparkconstructionlite_excerpt_length'],
) );

$wp_customize->add_control( 'sparkconstructionlite_excerpt_length', array(
	'label'				=> esc_html__( 'Excerpt Length', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_archive_option',
	'type'				=> 'number', 
) );