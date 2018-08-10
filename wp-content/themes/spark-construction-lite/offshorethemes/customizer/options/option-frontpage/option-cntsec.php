<?php
/**
 * Customizer Options - Counter Section
 *
 * @package sparkconstructionlite
 */

$defaults = sparkconstructionlite_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'sparkconstructionlite_cnt_sec_option', array(
    'priority'      => 20,
    'title'         => esc_html__( 'Counter Section', 'spark-construction-lite' ),
    'panel'         => 'sparkconstructionlite_homepage_options'   
) );

// Enable Section
$wp_customize->add_setting( 'sparkconstructionlite_enable_cnt_sec', array(
    'sanitize_callback' => 'sparkconstructionlite_sanitize_checkbox',
    'default'           => $defaults['sparkconstructionlite_enable_cnt_sec'],
) );

$wp_customize->add_control( 'sparkconstructionlite_enable_cnt_sec', array(
    'label'             => esc_html__( 'Enable Counter Section', 'spark-construction-lite' ),
    'section'           => 'sparkconstructionlite_cnt_sec_option',
    'type'              => 'checkbox', 
) );

// Section Background Image
$wp_customize->add_setting('sparkconstructionlite_cnt_sec_background', array(
    'sanitize_callback' => 'esc_url_raw',
    'default'           => $defaults['sparkconstructionlite_cnt_sec_background'],
));

$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'sparkconstructionlite_cnt_sec_background', array(
    'label'       => esc_html__( 'Background Image', 'spark-construction-lite' ),
    'section'     => 'sparkconstructionlite_cnt_sec_option',
) ) );

// Counter Content
$wp_customize->add_setting( 'sparkconstructionlite_cnt_sec_content', array(
    'sanitize_callback' => 'sparkconstructionlite_repeater_data_field',
    'transport' => 'postMessage', // refresh or postMessage
) );

$wp_customize->add_control( new sparkconstructionlite_Repeater_Control( $wp_customize,    'sparkconstructionlite_cnt_sec_content', array(
    'label'         => esc_html__('Counter Content', 'spark-construction-lite'),
    'description'   => '',
    'section'       => 'sparkconstructionlite_cnt_sec_option',
    'live_title_id' => '', // apply for unput text and textarea only
    'title_format'  => '', // [live_title]
    'max_item'      => 4, // Maximum item can add
    'limited_msg'   => esc_html__( 'Only 4 counter items can be added.', 'spark-construction-lite' ),
    'fields'    => array(
        'sparkconstructionlite_cnt_sec_count'  => array(
            'title' => esc_html__('Count Number', 'spark-construction-lite'),
            'type'  => 'number',
        ),
        'sparkconstructionlite_cnt_sec_title' => array(
            'title' => esc_html__('Count Title', 'spark-construction-lite'),
            'type' => 'text'
        )
    ),
) ) );



