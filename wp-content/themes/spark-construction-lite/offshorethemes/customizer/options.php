<?php
/**
 * Customizer Options Links
 *
 * @package sparkconstructionlite
 */

$wp_customize->add_panel( 'sparkconstructionlite_theme_options', array(
	'title'			=> esc_html__( 'Theme Options', 'spark-construction-lite' ),
	'description'	=> esc_html__( 'Spark Construction Customization Options', 'spark-construction-lite' ),
	'priority'		=> 10	
) );

$wp_customize->add_section( 'sparkconstructionlite_web_layout', array(
	'title'           => esc_html__('Web Page Layouts', 'spark-construction-lite'),
	'priority'        => 10,
) );

$wp_customize->add_setting( 'sparkconstructionlite_web_layout_choices', array(
	'default' => 'full_width',
	'sanitize_callback' => 'sparkconstructionlite_sanitize_select',
) );

$wp_customize->add_control( 'sparkconstructionlite_web_layout_choices', array(
	'type' => 'radio',
	'label' => esc_html__('Choose Web Layout', 'spark-construction-lite'),
	'section' => 'sparkconstructionlite_web_layout',
	'settings' => 'sparkconstructionlite_web_layout_choices',
	'choices' => array(
		'boxed_layout'     => esc_html__( 'Boxed Layout', 'spark-construction-lite' ),
		'full_width' => esc_html__( 'Full Width Layout', 'spark-construction-lite' )
	)
) );

$wp_customize->add_panel( 'sparkconstructionlite_homepage_options', array(
	'title'			=> esc_html__( 'HomePage Options', 'spark-construction-lite' ),
	'description'	=> esc_html__( 'Spark Construction Home Page Customization Options', 'spark-construction-lite' ),
	'priority'		=> 10	
) );


// Header
require get_theme_file_path('offshorethemes/customizer/options/option-theme/option-header.php');
// Homepage
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-home.php');
// Slider Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-banner.php');
// About Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-abtsec.php');
// Offer Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-offsec.php');
// Counter Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-cntsec.php');
// Team Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-teamsec.php');
// Blog Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-blgsec.php');
// Testimonial Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-testsec.php');
// CTA Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-ctasec.php');
// Partner Section
require get_theme_file_path('offshorethemes/customizer/options/option-frontpage/option-partsec.php');
// Archive Page
require get_theme_file_path('offshorethemes/customizer/options/option-theme/option-archive.php');
// Post Meta
require get_theme_file_path('offshorethemes/customizer/options/option-theme/option-meta.php');
// Footer
require get_theme_file_path('offshorethemes/customizer/options/option-theme/option-footer.php');  