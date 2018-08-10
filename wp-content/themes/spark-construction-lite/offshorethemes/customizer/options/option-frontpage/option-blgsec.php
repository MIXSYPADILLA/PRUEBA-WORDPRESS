<?php
/**
 * Customizer Options - Blog Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

$pages = sparkconstructionlite_get_pages();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_blog_sec_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Blog Section', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Enable Section
$wp_customize->add_setting( 'sparkconstructionlite_enable_blog_sec', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_blog_sec'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_blog_sec', array(
	'label'				=> esc_html__( 'Enable Blog Section', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_blog_sec_option',
	'type'				=> 'checkbox', 
) );

// Section Title
$wp_customize->add_setting( 'sparkconstructionlite_blog_sec_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_blog_sec_title'],
) );

$wp_customize->add_control( 'sparkconstructionlite_blog_sec_title', array(
	'label'				=> esc_html__( 'Section Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_blog_sec_option',
	'type'				=> 'text', 
) );

// Section Sub Title
$wp_customize->add_setting( 'sparkconstructionlite_blog_sec_subtitle', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_blog_sec_subtitle'],
) );

$wp_customize->add_control( 'sparkconstructionlite_blog_sec_subtitle', array(
	'label'				=> esc_html__( 'Section Sub Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_blog_sec_option',
	'type'				=> 'text', 
) );

// Number of Blog Posts
$wp_customize->add_setting( 'sparkconstructionlite_blog_sec_post_no', array(
	'sanitize_callback'		=> 'absint',
	'default'				=> $defaults['sparkconstructionlite_blog_sec_post_no'] 
) ); 

$wp_customize->add_control( 'sparkconstructionlite_blog_sec_post_no', array(
	'label'					=> esc_html__( 'Numbers of Blog Posts', 'spark-construction-lite' ),
	'section'				=> 'sparkconstructionlite_blog_sec_option',
	'type'					=> 'number',
) );

// Section Button Title
$wp_customize->add_setting( 'sparkconstructionlite_blog_sec_all_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['sparkconstructionlite_blog_sec_all_title'],
) );

$wp_customize->add_control( 'sparkconstructionlite_blog_sec_all_title', array(
	'label'				=> esc_html__( 'More Post Button Title', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_blog_sec_option',
	'type'				=> 'text', 
) );

// Section Button Link
$wp_customize->add_setting( 'sparkconstructionlite_blog_sec_all_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['sparkconstructionlite_blog_sec_all_link'],
) );

$wp_customize->add_control( 'sparkconstructionlite_blog_sec_all_link', array(
	'label'				=> esc_html__( 'More Post Button Link', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_blog_sec_option',
	'type'				=> 'url', 
) );

// Blog Content Length
$wp_customize->add_setting( 'sparkconstructionlite_blog_sec_content', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_number',
	'default'			=> $defaults['sparkconstructionlite_blog_sec_content'],
) );

$wp_customize->add_control( 'sparkconstructionlite_blog_sec_content', array(
	'label'				=> esc_html__( 'Blog Content Length', 'spark-construction-lite' ),
	'description'		=> esc_html__( 'Enter the length of contents of blog posts to be displayed. Default is 40.', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_blog_sec_option',
	'type'				=> 'number', 
) );
