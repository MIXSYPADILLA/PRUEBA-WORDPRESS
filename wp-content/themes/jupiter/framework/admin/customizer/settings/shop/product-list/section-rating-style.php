<?php
/**
 * Add Rating section of Product List > Styles.
 * Prefix: s -> shop, pl -> product-list, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pl_s_rating', array(
		'title' => __( 'Rating', 'mk_framework' ),
		'priority' => 90,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pl_dialog',
		),
	)
);

// Font size.
$wp_customize->add_setting( 'cs_pl_s_rating_style_font_size', array(
	'default'   => 15,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pl_s_rating_style_font_size',
		array(
			'section' => 'mk_s_pl_s_rating',
			'column'  => 'mk-col-3-alt',
			'text' => __( 'Size', 'mk_framework' ),
			'unit' => __( 'px', 'mk_framework' ),
			'input_type' => 'number',
			'input_attrs' => array(
				'min' => 0,
			),
		)
	)
);

// Star color.
$wp_customize->add_setting( 'cs_pl_s_rating_style_star_color', array(
	'default'   => '#ffc400',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pl_s_rating_style_star_color',
		array(
			'section'  => 'mk_s_pl_s_rating',
			'column'   => 'mk-col-3-alt',
			'text' => __( 'Star color', 'mk_framework' ),
		)
	)
);

// Active Star color.
$wp_customize->add_setting( 'cs_pl_s_rating_style_active_star_color', array(
	'default'   => '#ffc400',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pl_s_rating_style_active_star_color',
		array(
			'section'  => 'mk_s_pl_s_rating',
			'column'   => 'mk-col-5',
			'text' => __( 'Active Star color', 'mk_framework' ),
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pl_s_rating_style_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pl_s_rating_style_divider',
		array(
			'section' => 'mk_s_pl_s_rating',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pl_s_rating_style_box_model', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 6,
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
		'cs_pl_s_rating_style_box_model',
		array(
			'section' => 'mk_s_pl_s_rating',
			'column'  => 'mk-col-12',
		)
	)
);
