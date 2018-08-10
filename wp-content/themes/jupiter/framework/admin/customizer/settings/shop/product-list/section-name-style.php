<?php
/**
 * Add Name section of Product List > Styles.
 * Prefix: s -> shop, pl -> product-list, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pl_s_name', array(
		'title' => __( 'Name', 'mk_framework' ),
		'priority' => 20,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pl_dialog',
		),
	)
);

// Typography.
$wp_customize->add_setting( 'cs_pl_s_name_style_typography', array(
	'default' => array(
		'family' => 'inherit',
		'size' => 14,
		'weight' => 700,
		'style' => 'normal',
		'color' => '#000',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Typography_Control(
		$wp_customize,
		'cs_pl_s_name_style_typography',
		array(
			'section' => 'mk_s_pl_s_name',
			'column'  => 'mk-col-12',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pl_s_name_style_box_model', array(
	'default' => array(
		'margin_top' => 0,
		'margin_right' => 0,
		'margin_bottom' => 0,
		'margin_left' => 0,
		'padding_top' => 7,
		'padding_right' => 0,
		'padding_bottom' => 15,
		'padding_left' => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_name_style_box_model',
		array(
			'section' => 'mk_s_pl_s_name',
			'column'  => 'mk-col-12',
		)
	)
);

