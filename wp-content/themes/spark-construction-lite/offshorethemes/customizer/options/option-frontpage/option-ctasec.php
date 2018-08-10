<?php
/**
 * Customizer Options - CTA Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

$pages = sparkconstructionlite_get_pages();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_ctasec_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'CTA Section', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Enable Section
$wp_customize->add_setting( 'sparkconstructionlite_enable_cta_sec', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_cta_sec'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_cta_sec', array(
	'label'				=> esc_html__( 'Enable CTA Section', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_ctasec_option',
	'type'				=> 'checkbox', 
) );

// CTA Page
$wp_customize->add_setting( 'sparkconstructionlite_cta_page', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_dropdown_pages',
	'default'			=> $defaults['sparkconstructionlite_cta_page'],
) );

$wp_customize->add_control( 'sparkconstructionlite_cta_page', array(
	'label'				=> esc_html__( 'CTA Page', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_ctasec_option',
	'type'				=> 'dropdown-pages',
) );

// Section Button Title
$wp_customize->add_setting( 'sparkconstructionlite_cta_sec_btn_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_cta_sec_btn_title'],
) );

$wp_customize->add_control( 'sparkconstructionlite_cta_sec_btn_title', array(
	'label'				=> esc_html__( 'Section Button Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_ctasec_option',
	'type'				=> 'text', 
) );

// Section Button Link
$wp_customize->add_setting( 'sparkconstructionlite_cta_sec_btn_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['sparkconstructionlite_cta_sec_btn_link'],
) );

$wp_customize->add_control( 'sparkconstructionlite_cta_sec_btn_link', array(
	'label'				=> esc_html__( 'Section Button Link', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_ctasec_option',
	'type'				=> 'url', 
) );
