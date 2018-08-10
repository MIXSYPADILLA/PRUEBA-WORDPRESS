<?php
/**
 * Add Image section of Product Page > Styles.
 * Prefix: s -> shop, pp -> product-page, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_s_image', array(
		'title' => __( 'Image', 'mk_framework' ),
		'priority' => 10,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pp_dialog',
		),
	)
);

// Image Ratio Label.
$wp_customize->add_setting( 'cs_pp_s_image_style_image_ratio_label' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pp_s_image_style_image_ratio_label',
		array(
			'section' => 'mk_s_pp_s_image',
			'label' => __( 'Image Ratio', 'mk_framework' ),
		)
	)
);

// Image Ratio.
$wp_customize->add_setting( 'cs_pp_s_image_style_image_ratio', array(
	'default'   => '1_by_1',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Radio_Control(
		$wp_customize,
		'cs_pp_s_image_style_image_ratio',
		array(
			'section' => 'mk_s_pp_s_image',
			'column' => 'mk-col-6',
			'input_type' => 'button',
			'choices' => array(
				'3_by_2' => __( '3:2', 'mk_framework' ),
				'1_by_1' => __( '1:1', 'mk_framework' ),
				'2_by_3' => __( '2:3', 'mk_framework' ),
				'9_by_16' => __( '9:16', 'mk_framework' ),
			),
		)
	)
);

// Border width.
$wp_customize->add_setting( 'cs_pp_s_image_style_border_width', array(
	'default'   => 0,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pp_s_image_style_border_width',
		array(
			'section' => 'mk_s_pp_s_image',
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

// Border Color.
$wp_customize->add_setting( 'cs_pp_s_image_style_border_color', array(
	'default'   => '#fff',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Color_Control(
		$wp_customize,
		'cs_pp_s_image_style_border_color',
		array(
			'section'  => 'mk_s_pp_s_image',
			'column'   => 'mk-col-2-alt',
			'icon'     => 'mk-border-color',
		)
	)
);

// Gallery Thumbnail Orientation.
$wp_customize->add_setting( 'cs_pp_s_image_style_orientation', array(
	'default'   => 'horizontal',
	'transport' => 'refresh',
) );

$wp_customize->add_control(
	new MK_Radio_Control(
		$wp_customize,
		'cs_pp_s_image_style_orientation',
		array(
			'section' => 'mk_s_pp_s_image',
			'column'  => 'mk-col-6',
			'label' => __( 'Gallery Thumbnail Orientation', 'mk_framework' ),
			'input_type'  => 'icon',
			'choices' => array(
				'vertical' => 'mk-thumbnails-vertical',
				'horizontal' => 'mk-thumbnails-horizontal',
				'none' => 'mk-thumbnails-none',
			),
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pp_s_image_style_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pp_s_image_style_divider',
		array(
			'section' => 'mk_s_pp_s_image',
		)
	)
);

