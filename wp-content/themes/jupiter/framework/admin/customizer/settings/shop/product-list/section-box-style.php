<?php
/**
 * Add Box section of Product List > Styles.
 * Prefix: s -> shop, pl -> product-list, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pl_s_box', array(
		'title' => __( 'Box', 'mk_framework' ),
		'priority' => 10,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pl_dialog',
		),
	)
);

// Background color.
$wp_customize->add_setting( 'cs_pl_s_box_style_background_color', array(
	'default'   => '#FFFFFF',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pl_s_box_style_background_color',
		array(
			'section'  => 'mk_s_pl_s_box',
			'column'   => 'mk-col-2-alt',
			'icon'     => 'mk-background-color',
		)
	)
);

// Border radius.
$wp_customize->add_setting( 'cs_pl_s_box_style_border_radius', array(
	'default'   => 0,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pl_s_box_style_border_radius',
		array(
			'section'  => 'mk_s_pl_s_box',
			'column'   => 'mk-col-3-alt',
			'icon'     => 'mk-corner-radius',
			'unit' => __( 'px', 'mk_framework' ),
			'input_type' => 'number',
			'input_attrs' => array(
				'min' => 0,
			),
		)
	)
);

// Border width.
$wp_customize->add_setting( 'cs_pl_s_box_style_border_width', array(
	'default'   => 0,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pl_s_box_style_border_width',
		array(
			'section'  => 'mk_s_pl_s_box',
			'column'   => 'mk-col-3-alt',
			'icon'     => 'mk-border',
			'unit' => __( 'px', 'mk_framework' ),
			'input_type' => 'number',
			'input_attrs' => array(
				'min' => 0,
			),
		)
	)
);

// Border color.
$wp_customize->add_setting( 'cs_pl_s_box_style_border_color', array(
	'default'   => '#FFFFFF',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pl_s_box_style_border_color',
		array(
			'section'  => 'mk_s_pl_s_box',
			'column'   => 'mk-col-2-alt mk-col-last',
			'icon'     => 'mk-border-color',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pl_s_box_style_box_model', array(
	'default' => array(
		'margin_top'     => 0,
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
		'cs_pl_s_box_style_box_model',
		array(
			'section' => 'mk_s_pl_s_box',
			'column'  => 'mk-col-12',
		)
	)
);
