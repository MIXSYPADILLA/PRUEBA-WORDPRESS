<?php
// Footer copyright section 
function transportex_footer_copyright( $wp_customize ) {
	$wp_customize->add_panel('transportex_copyright', array(
		'priority' => 500,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Settings', 'transportex'),
	) );
	
	$wp_customize->add_section('copyright_section_one', array(
        'title' => __('Copyright Setting','transportex'),
        'description' => __('This is a Footer section.','transportex'),
        'priority' => 35,
		'panel' => 'transportex_copyright',
    ) );

   $wp_customize->add_setting('transportex_footer_copyright_setting', array(
		'sanitize_callback' => 'transportex_footer_copyright_sanitize_text',
		'default' => __('Copyright 2017 Powered by WordPress','transportex'),
    ) );
    $wp_customize->add_control('transportex_footer_copyright_setting', array(
        'label' => __('Copyright text','transportex'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ) );
    
	//Footer social link 
	$wp_customize->add_section('copyright_social_icon', array(
        'title' => __('Social Link','transportex'),
        'priority' => 45,
		'panel' => 'transportex_copyright',
    ) );

	// Facebook link
	$wp_customize->add_setting('social_link_facebook', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_facebook', array(
        'label' => __('Facebook URL','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_facebook_tab',array(
        'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	));
	$wp_customize->add_control('Social_link_facebook_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','transportex'),
        'section' => 'copyright_social_icon',
    ) );

	//Twitter link
	$wp_customize->add_setting( 'social_link_twitter', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_twitter', array(
        'label' => __('Twitter URL','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 'Social_link_twitter_tab',array(
	   'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_twitter_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','transportex'),
        'section' => 'copyright_social_icon',
    ) );

	//Linkdin link
	$wp_customize->add_setting( 'social_link_linkedin', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_linkedin', array(
        'label' => __('Linkedin URL','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 
        'Social_link_linkedin_tab',array(
        'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_linkedin_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','transportex'),
        'section' => 'copyright_social_icon',
    ) );

	//Google-plus link
	$wp_customize->add_setting('social_link_google', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_google', array(
        'label' => __('Google-plus URL','transportex'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_google_tab',array(
        'sanitize_callback' => 'transportex_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control('Social_link_google_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','transportex'),
        'section' => 'copyright_social_icon',
    ) );

		
	function transportex_footer_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	

	function transportex_copyright_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
}
add_action( 'customize_register', 'transportex_footer_copyright' );
?>