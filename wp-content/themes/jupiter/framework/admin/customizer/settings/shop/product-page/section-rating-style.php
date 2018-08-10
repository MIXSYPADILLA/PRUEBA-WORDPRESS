<?php
/**
 * Add Rating section of Product Page > Styles.
 * Prefix: s -> shop, pp -> product-page, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_s_rating', array(
		'title' => __( 'Rating', 'mk_framework' ),
		'priority' => 160,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pp_dialog',
		),
	)
);

// Label.
$wp_customize->add_setting( 'cs_pp_s_rating_style_label' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pp_s_rating_style_label',
		array(
			'section' => 'mk_s_pp_s_rating',
			'label'	=> 'Star',
		)
	)
);

// Font size.
$wp_customize->add_setting( 'cs_pp_s_rating_style_font_size', array(
	'default'   => 12,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pp_s_rating_style_font_size',
		array(
			'section' => 'mk_s_pp_s_rating',
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
$wp_customize->add_setting( 'cs_pp_s_rating_style_star_color', array(
	'default'   => '#ffc400',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_rating_style_star_color',
		array(
			'section'  => 'mk_s_pp_s_rating',
			'column'   => 'mk-col-3-alt',
			'text' => __( 'Star color', 'mk_framework' ),
		)
	)
);

// Active Star color.
$wp_customize->add_setting( 'cs_pp_s_rating_style_active_star_color', array(
	'default'   => '#ffc400',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_rating_style_active_star_color',
		array(
			'section'  => 'mk_s_pp_s_rating',
			'column'   => 'mk-col-5',
			'text' => __( 'Active Star color', 'mk_framework' ),
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pp_s_rating_style_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pp_s_rating_style_divider',
		array(
			'section' => 'mk_s_pp_s_rating',
		)
	)
);

// Label.
$wp_customize->add_setting( 'cs_pp_s_rating_style_label' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pp_s_rating_style_label',
		array(
			'section' => 'mk_s_pp_s_rating',
			'label'	=> 'Text',
		)
	)
);

// Typography.
$wp_customize->add_setting( 'cs_pp_s_rating_style_typography', array(
	'default' => array(
		'family' => 'inherit',
		'size'   => 14,
		'weight' => 400,
		'style'  => 'normal',
		'color'  => '#2e2e2e',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Typography_Control(
		$wp_customize,
		'cs_pp_s_rating_style_typography',
		array(
			'section' => 'mk_s_pp_s_rating',
			'column'  => 'mk-col-12',
		)
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_pp_s_rating_style_box_model', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 25,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pp_s_rating_style_box_model',
		array(
			'section' => 'mk_s_pp_s_rating',
			'column'  => 'mk-col-12',
		)
	)
);
