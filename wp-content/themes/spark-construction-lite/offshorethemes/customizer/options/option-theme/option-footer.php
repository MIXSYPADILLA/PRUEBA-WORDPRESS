<?php
/**
 * Customizer Options - Footer
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

// Section - Footer Bottom
$wp_customize->add_section( 'sparkconstructionlite_footer_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Footer Settings', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_theme_options'	
) );

// Copyright Text
$wp_customize->add_setting( 'sparkconstructionlite_copyright_text', array(
	'sanitize_callback'		=> 'sanitize_text_field',
	'default'				=> $defaults['sparkconstructionlite_copyright_text'] 
) ); 

$wp_customize->add_control( 'sparkconstructionlite_copyright_text', array(
	'label'					=> esc_html__( 'Coyright Text', 'spark-construction-lite' ),
	'section'				=> 'sparkconstructionlite_footer_option',
	'type'					=> 'text'
) );
