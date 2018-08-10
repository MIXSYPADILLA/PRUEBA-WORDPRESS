<?php
/**
 * Add Settings section of Product List.
 * Prefix: s -> shop, pl -> product-list
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pl_settings', array(
		'title' => __( 'Settings', 'mk_framework' ),
		'priority' => 10,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
		),
	)
);

// Stretch to Full Width.
$wp_customize->add_setting( 'cs_pl_settings_full_width', array(
	'default' => 'false',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Toggle_Control(
		$wp_customize,
		'cs_pl_settings_full_width',
		array(
			'label' => __( 'Stretch to Full Width', 'mk_framework' ),
			'section' => 'mk_s_pl_settings',
			'column'  => 'mk-col-12',
		)
	)
);

// Item Hover Style.
$wp_customize->add_setting( 'cs_pl_settings_hover_style', array(
	'default'   => 'none',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Select_Control(
		$wp_customize,
		'cs_pl_settings_hover_style',
		array(
			'label' => __( 'Item Hover Style', 'mk_framework' ),
			'section' => 'mk_s_pl_settings',
			'choices' => array(
				'none' => __( 'None', 'mk_framework' ),
				'alternate' => __( 'Alternate', 'mk_framework' ),
				'zoom' => __( 'Zoom', 'mk_framework' ),
			),
			'column'  => 'mk-col-6',
		)
	)
);

// Display Product Info Label.
$wp_customize->add_setting( 'cs_pl_settings_product_info', array(
	'default'   => array(
		'.woocommerce-loop-product__title',
		'.price ins',
		'.price del',
		'.button',
		'.star-rating',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Checkbox_Control(
		$wp_customize,
		'cs_pl_settings_product_info',
		array(
			'label' => __( 'Display Product Info', 'mk_framework' ),
			'section' => 'mk_s_pl_settings',
			'choices' => array(
				'.woocommerce-loop-product__title' => __( 'Product Name', 'mk_framework' ),
				'.price del' => __( 'Regular Price', 'mk_framework' ),
				'.price ins' => __( 'Sale Price', 'mk_framework' ),
				'.button' => __( 'Add to Cart Button', 'mk_framework' ),
				'.star-rating' => __( 'Rating', 'mk_framework' ),
			),
			'column'  => 'mk-col-12',
		)
	)
);

// Align Product Info.
$wp_customize->add_setting( 'cs_pp_settings_product_info_align', array(
	'default'   => '',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Radio_Control(
		$wp_customize,
		'cs_pp_settings_product_info_align',
		array(
			'section' => 'mk_s_pl_settings',
			'column'  => 'mk-col-5',
			'label'  => __( 'Align Product Info', 'mk_framework' ),
			'input_type'  => 'icon',
			'choices' => array(
				'left' => 'mk-left',
				'center' => 'mk-center',
				'right' => 'mk-right',
				'' => 'mk-close',
			),
		)
	)
);

// Image Ratio.
$wp_customize->add_setting( 'cs_pl_settings_image_ratio', array(
	'default'   => '1_by_1',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Radio_Control(
		$wp_customize,
		'cs_pl_settings_image_ratio',
		array(
			'section' => 'mk_s_pl_settings',
			'column'  => 'mk-col-8',
			'input_type'  => 'button',
			'label'  => __( 'Image Ratio', 'mk_framework' ),
			'choices' => array(
				'16_by_9' => __( '16:9', 'mk_framework' ),
				'3_by_2' => __( '3:2', 'mk_framework' ),
				'4_by_3' => __( '4:3', 'mk_framework' ),
				'1_by_1' => __( '1:1', 'mk_framework' ),
				'3_by_4' => __( '3:4', 'mk_framework' ),
				'2_by_3' => __( '2:3', 'mk_framework' ),
				'9_by_16' => __( '9:16', 'mk_framework' ),
			),
		)
	)
);

// Divider.
$wp_customize->add_setting( 'cs_pl_settings_divider' );

$wp_customize->add_control(
	new MK_Divider_Control(
		$wp_customize,
		'cs_pl_settings_divider',
		array(
			'section' => 'mk_s_pl_settings',
		)
	)
);

// Grid Settings Label.
$wp_customize->add_setting( 'cs_pl_settings_grid_label' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_settings_grid_label',
		array(
			'section' => 'mk_s_pl_settings',
			'column'  => 'mk-col-12',
			'label'  => 'Grid Settings',
		)
	)
);

// Columns.
$wp_customize->add_setting( 'cs_pl_settings_columns', array(
	'default'   => apply_filters( 'loop_shop_columns', 4 ),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Select_Control(
		$wp_customize,
		'cs_pl_settings_columns',
		array(
			'section' => 'mk_s_pl_settings',
			'column'  => 'mk-col-6',
			'icon'    => 'mk-columns',
			'choices' => array(
				'1' => __( '1 Column', 'mk_framework' ),
				'2' => __( '2 Columns', 'mk_framework' ),
				'3' => __( '3 Columns', 'mk_framework' ),
				'4' => __( '4 Columns', 'mk_framework' ),
			),
		)
	)
);

// Row.
$wp_customize->add_setting( 'cs_pl_settings_rows', array(
	'default'   => 3,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Select_Control(
		$wp_customize,
		'cs_pl_settings_rows',
		array(
			'section' => 'mk_s_pl_settings',
			'column'  => 'mk-col-6',
			'icon'    => 'mk-rows',
			'choices' => array(
				1 => __( '1 Row', 'mk_framework' ),
				2 => __( '2 Rows', 'mk_framework' ),
				3 => __( '3 Rows', 'mk_framework' ),
				4 => __( '4 Rows', 'mk_framework' ),
			),
		)
	)
);

// Selective refresh for Row and Column.
$wp_customize->selective_refresh->add_partial( 'cs_pl_settings_grid', array(
	'selector'            => '#theme-page',
	'settings' => array( 'cs_pl_settings_hover_style', 'cs_pl_settings_image_ratio', 'cs_pl_settings_columns', 'cs_pl_settings_rows' ),
	'render_callback'     => function( $partial, $container_context ) {
		include THEME_CUSTOMIZER_DIR . '/partials/cs-pl-settings-grid.php';
	},
	'container_inclusive' => false,
	'fallback_refresh'    => false,
) );

// Horizontal space.
$wp_customize->add_setting( 'cs_pl_settings_horizontal_space', array(
	'default'   => 30,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pl_settings_horizontal_space',
		array(
			'section'  		=> 'mk_s_pl_settings',
			'column'   		=> 'mk-col-3',
			'icon'     		=> 'mk-horizontal-space',
			'unit'     		=> 'px',
			'input_type'    => 'number',
			'input_attrs' 	=> array(
				'min' => '0',
			),
		)
	)
);

// Vertical space.
$wp_customize->add_setting( 'cs_pl_settings_vertical_space', array(
	'default'   => 30,
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Input_Control(
		$wp_customize,
		'cs_pl_settings_vertical_space',
		array(
			'section'  		=> 'mk_s_pl_settings',
			'column'  		=> 'mk-col-3',
			'icon'     		=> 'mk-vertical-space',
			'unit'     		=> 'px',
			'input_type'    => 'number',
			'input_attrs' 	=> array(
				'min' => '0',
			),
		)
	)
);
