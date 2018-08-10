<?php
/**
 * Add Quanitity section of Product Page > Styles.
 * Prefix: s -> shop, pp -> product-page, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_s_quantity', array(
		'title' => __( 'Quantity', 'mk_framework' ),
		'priority' => 100,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pp_dialog',
		),
	)
);

// Typography.
$wp_customize->add_setting( 'cs_pp_s_quantity_style_typography', array(
	'default' => array(
		'family' => 'inherit',
		'size' => 14,
		'weight' => 400,
		'style' => 'normal',
		'color' => '#222222',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Typography_Control(
		$wp_customize,
		'cs_pp_s_quantity_style_typography',
		array(
			'section' => 'mk_s_pp_s_quantity',
			'column'  => 'mk-col-12',
		)
	)
);

// Background Color.
$wp_customize->add_setting( 'cs_pp_s_quantity_style_bg_color', array(
	'default'   => '#ffffff',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_quantity_style_bg_color',
		array(
			'section'  => 'mk_s_pp_s_quantity',
			'column'   => 'mk-col-2-alt',
			'icon'     => 'mk-background-color',
		)
	)
);

// Border.
$wp_customize->add_setting( 'cs_pp_s_quantity_style_border', array(
	'default'   => 1, // Inherited from assets/stylesheet/plugins/min/woocommerce.css.
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pp_s_quantity_style_border',
		array(
			'section'  => 'mk_s_pp_s_quantity',
			'column'   => 'mk-col-3-alt',
			'icon'     => 'mk-border',
			'unit'     => 'px',
			'input_type' => 'number',
			'input_attrs' 	=> array(
				'min' => '0',
			),
		)
	)
);

// Border Color.
$wp_customize->add_setting( 'cs_pp_s_quantity_style_border_color', array(
	'default'   => '#e3e3e3', // Inherited from assets/stylesheet/plugins/min/woocommerce.css.
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_quantity_style_border_color',
		array(
			'section'  => 'mk_s_pp_s_quantity',
			'column'   => 'mk-col-2-alt',
			'icon'     => 'mk-border-color',
		)
	)
);

// Divider 1.
$wp_customize->add_setting( 'cs_pp_s_quantity_divider_1' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pp_s_quantity_divider_1',
		array(
			'section' => 'mk_s_pp_s_quantity',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pp_s_quantity_style_box_model', array(
	'default' => array(
		'margin_top' => 0,
		'margin_right' => 0,
		'margin_bottom' => 40,
		'margin_left' => 0,
		'padding_top' => 0,
		'padding_right' => 0,
		'padding_bottom' => 0,
		'padding_left' => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pp_s_quantity_style_box_model',
		array(
			'section' => 'mk_s_pp_s_quantity',
			'column'  => 'mk-col-12',
		)
	)
);

