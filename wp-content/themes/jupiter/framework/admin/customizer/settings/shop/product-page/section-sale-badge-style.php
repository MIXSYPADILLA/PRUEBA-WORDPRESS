<?php
/**
 * Add Sale Badge section of Product Page > Styles.
 * Prefix: s -> shop, pp -> product-page, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_s_sale_badge', array(
		'title' => __( 'Sale Badge', 'mk_framework' ),
		'priority' => 140,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pp_dialog',
		),
	)
);
// Text.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_text', array(
	'default'   => 'sale',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_text',
		array(
			'section' => 'mk_s_pp_s_sale_badge',
			'column'  => 'mk-col-12',
			'text' => __( 'Text', 'mk_framework' ),
		)
	)
);

// Typography.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_typography', array(
	'default' => array(
		'family' => 'inherit',
		'size'   => 13,
		'weight' => 700,
		'style'  => 'normal',
		'color'  => '#debc51',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Typography_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_typography',
		array(
			'section' => 'mk_s_pp_s_sale_badge',
			'column'  => 'mk-col-12',
		)
	)
);

// Background color.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_background_color', array(
	'default'   => 'rgba(0, 0, 0, 0)',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_background_color',
		array(
			'section'  => 'mk_s_pp_s_sale_badge',
			'column'   => 'mk-col-2-alt',
			'icon'     => 'mk-background-color',
		)
	)
);

// Border radius.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_border_radius', array(
	'default'   => 0,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_border_radius',
		array(
			'section' => 'mk_s_pp_s_sale_badge',
			'column'  => 'mk-col-3-alt',
			'icon' => 'mk-corner-radius',
			'unit' => __( 'px', 'mk_framework' ),
			'input_type' => 'number',
			'input_attrs' => array(
				'min' => 0,
			),
		)
	)
);

// Border width.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_border_width', array(
	'default'   => 2,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_border_width',
		array(
			'section' => 'mk_s_pp_s_sale_badge',
			'column'  => 'mk-col-3-alt',
			'icon' => 'mk-border',
			'unit' => __( 'px', 'mk_framework' ),
			'input_type' => 'number',
			'input_attrs' => array(
				'min' => 0,
			),
		)
	)
);

// Border color.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_border_color', array(
	'default'   => '#debc51',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_border_color',
		array(
			'section'  => 'mk_s_pp_s_sale_badge',
			'column'   => 'mk-col-2-alt mk-col-last',
			'icon'     => 'mk-border-color',
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_divider',
		array(
			'section' => 'mk_s_pp_s_sale_badge',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pp_s_sale_badge_style_box_model', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 12,
		'padding_right'  => 20,
		'padding_bottom' => 12,
		'padding_left'   => 20,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pp_s_sale_badge_style_box_model',
		array(
			'section' => 'mk_s_pp_s_sale_badge',
			'column'  => 'mk-col-12',
		)
	)
);
