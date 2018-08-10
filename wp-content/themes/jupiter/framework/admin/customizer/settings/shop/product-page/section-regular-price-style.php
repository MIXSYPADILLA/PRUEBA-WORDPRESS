<?php
/**
 * Add Regular Price section of Product Page > Styles.
 * Prefix: s -> shop, pp -> product-page, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_s_regular_price', array(
		'title' => __( 'Regular Price', 'mk_framework' ),
		'priority' => 30,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pp_dialog',
		),
	)
);

// Typography.
$wp_customize->add_setting( 'cs_pp_s_price_style_typography', array(
	'default' => array(
		'family' => 'inherit',
		'size'   => 30,
		'weight' => 400,
		'style'  => 'normal',
		'color'  => '#f97352',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Typography_Control(
		$wp_customize,
		'cs_pp_s_price_style_typography',
		array(
			'section' => 'mk_s_pp_s_regular_price',
			'column'  => 'mk-col-12',
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pp_s_price_style_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pp_s_price_style_divider',
		array(
			'section' => 'mk_s_pp_s_regular_price',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pp_s_price_style_box_model', array(
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
		'cs_pp_s_price_style_box_model',
		array(
			'section' => 'mk_s_pp_s_regular_price',
			'column'  => 'mk-col-12',
		)
	)
);
