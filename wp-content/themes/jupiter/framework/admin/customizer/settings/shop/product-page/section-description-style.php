<?php
/**
 * Add Description section of Product Page > Styles.
 * Prefix: s -> shop, pp -> product-page, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_s_descripiton', array(
		'title' => __( 'Description', 'mk_framework' ),
		'priority' => 80,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pp_dialog',
		),
	)
);

// Add settings to the section.
// Typography.
$wp_customize->add_setting( 'cs_pp_s_description_style_typography', array(
	'default' => array(
		'family' => 'inherit',
		'size'   => 14,
		'weight' => 400,
		'style'  => 'normal',
		'color'  => '#888888',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Typography_Control(
		$wp_customize,
		'cs_pp_s_description_style_typography',
		array(
			'section' => 'mk_s_pp_s_descripiton',
			'column'  => 'mk-col-12',
		)
	)
);

// Background color.
$wp_customize->add_setting( 'cs_pp_s_description_style_background_color', array(
	'default'   => 'rgba(255, 255, 255, 0)',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_description_style_background_color',
		array(
			'section'  => 'mk_s_pp_s_descripiton',
			'column'   => 'mk-col-2-alt',
			'icon'     => 'mk-background-color',
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pp_s_description_style_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pp_s_price_style_divider',
		array(
			'section' => 'mk_s_pp_s_descripiton',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pp_s_description_style_box_model', array(
	'default' => array(
		'margin_top'     => 20,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pp_s_description_style_box_model',
		array(
			'section' => 'mk_s_pp_s_descripiton',
			'column'  => 'mk-col-12',
		)
	)
);
