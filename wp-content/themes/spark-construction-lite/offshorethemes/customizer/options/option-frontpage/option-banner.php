<?php
/**
 * Customizer Options - Slider Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

$pages = sparkconstructionlite_get_pages();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_banner_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Slider Section Settings', 'spark-construction-lite' ),
	'panel'			=> 'sparkconstructionlite_homepage_options'	
) );

// Enable Banner
$wp_customize->add_setting( 'sparkconstructionlite_enable_banner', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_banner'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_banner', array(
	'label'				=> esc_html__( 'Enable Slider', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_banner_option',
	'type'				=> 'checkbox',
) );

// Enable Banner Caption
$wp_customize->add_setting( 'sparkconstructionlite_enable_banner_cap', array(
	'sanitize_callback'	=> 'sparkconstructionlite_sanitize_checkbox',
	'default'			=> $defaults['sparkconstructionlite_enable_banner_cap'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_banner_cap', array(
	'label'				=> esc_html__( 'Enable Slider Caption', 'spark-construction-lite' ),
	'section'			=> 'sparkconstructionlite_banner_option',
	'type'				=> 'checkbox',
) );

$wp_customize->add_setting( 'sparkconstructionlite_banner_selection', array(
	'sanitize_callback' => 'sparkconstructionlite_repeater_data_field',
	'transport' => 'postMessage', // refresh or postMessage
) );

$wp_customize->add_control( new sparkconstructionlite_Repeater_Control( $wp_customize,	'sparkconstructionlite_banner_selection', array(
    'label' 		=> esc_html__('Slider Content', 'spark-construction-lite'),
    'description'   => '',
    'section'       => 'sparkconstructionlite_banner_option',
    'live_title_id' => '', // apply for unput text and textarea only
    'title_format'  => '', // [live_title]
    'limited_msg'   => esc_html__( 'Only 5 slider items can be added.', 'spark-construction-lite' ), // Maximum item can add
    'max_item'      => 5, // Maximum item can add
    'fields'    => array(
    	'sparkconstructionlite_banner_page'  => array(
        	'title' => esc_html__('Slider Page', 'spark-construction-lite'),
        	'type'  => 'select',
        	'options' => $pages
        ),
        'sparkconstructionlite_banner_link_title'  => array(
        	'title' => esc_html__('Slider Button Title', 'spark-construction-lite'),
        	'type'  =>'text',
        ),
        'sparkconstructionlite_banner_link'  => array(
        	'title' => esc_html__('Slider Button Link', 'spark-construction-lite'),
        	'type'  =>'text',
        ),
    )

) ) );

