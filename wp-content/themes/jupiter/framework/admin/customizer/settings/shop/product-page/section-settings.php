<?php
/**
 * Add Settings section of Product Page.
 * Prefix: s -> shop, pp -> product-page
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pp_settings', array(
		'title' => __( 'Settings', 'mk_framework' ),
		'priority' => 10,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
		),
	)
);

// product Page Layout.
$wp_customize->add_setting( 'cs_pp_settings_layout', array(
	'default'   => '1',
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Radio_Control(
		$wp_customize,
		'cs_pp_settings_layout',
		array(
			'label' => __( 'Layout', 'mk_framework' ),
			'section' => 'mk_s_pp_settings',
			'column'  => 'mk-col-12',
			'input_type'  => 'image',
			'choices' => array(
				1 => THEME_CUSTOMIZER_URI . '/assets/icons/mk-layout-1.svg',
				3 => THEME_CUSTOMIZER_URI . '/assets/icons/mk-layout-3.svg',
			),
		)
	)
);

// Display Product Info.
$wp_customize->add_setting( 'cs_pp_settings_product_info', array(
	'default'   => array(
		'.summary .price ins',
		'.summary .price del',
		'.summary .woocommerce-product-rating',
		'.summary .product_meta .posted_in',
		'.summary .product_meta .tagged_as',
		'.summary .product_meta .sku_wrapper',
		'.summary .woocommerce-product-details__short-description',
		'.summary .cart .quantity',
		'.summary .variations',
		'.summary .social-share',
		'.woocommerce-tabs #tab-title-description|.woocommerce-tabs #tab-description',
		'.woocommerce-tabs #tab-title-reviews|.woocommerce-tabs #tab-reviews',
		'.woocommerce-tabs #tab-title-additional_information|.woocommerce-tabs #tab-additional_information',
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Checkbox_Control(
		$wp_customize,
		'cs_pp_settings_product_info',
		array(
			'label' => __( 'Display Product Info', 'mk_framework' ),
			'section' => 'mk_s_pp_settings',
			'choices' => array(
				'.summary .price del' => __( 'Regular Price', 'mk_framework' ),
				'.summary .price ins' => __( 'Sale Price', 'mk_framework' ),
				'.summary .woocommerce-product-rating' => __( 'Rating', 'mk_framework' ),
				'.summary .product_meta .posted_in' => __( 'Category', 'mk_framework' ),
				'.summary .product_meta .tagged_as' => __( 'Tags', 'mk_framework' ),
				'.summary .product_meta .sku_wrapper' => __( 'SKU', 'mk_framework' ),
				'.summary .woocommerce-product-details__short-description' => __( 'Product Description', 'mk_framework' ),
				'.summary .variations' => __( 'Product Options', 'mk_framework' ),
				'.summary .cart .quantity' => __( 'Quantity', 'mk_framework' ),
				'.summary .social-share' => __( 'Social Share', 'mk_framework' ),
				'.woocommerce-tabs #tab-title-description|.woocommerce-tabs #tab-description' => __( 'Description', 'mk_framework' ),
				'.woocommerce-tabs #tab-title-reviews|.woocommerce-tabs #tab-reviews' => __( 'Review', 'mk_framework' ),
				'.woocommerce-tabs #tab-title-additional_information|.woocommerce-tabs #tab-additional_information' => __( 'Additional Info', 'mk_framework' ),
			),
			'column'  => 'mk-col-12',
		)
	)
);

// Product Lightbox.
$wp_customize->add_setting( 'cs_pp_settings_photoswipe_enabled', array(
	'default' => 'true',
	'transport' => 'refresh',
) );

$wp_customize->add_control(
	new MK_Toggle_Control(
		$wp_customize,
		'cs_pp_settings_photoswipe_enabled',
		array(
			'section' => 'mk_s_pp_settings',
			'column'  => 'mk-col-6',
			'label' => __( 'Product Lightbox', 'mk_framework' ),
		)
	)
);

// Product Magnifier.
$wp_customize->add_setting( 'cs_pp_settings_zoom_enabled', array(
	'default' => 'true',
	'transport' => 'refresh',
) );

$wp_customize->add_control(
	new MK_Toggle_Control(
		$wp_customize,
		'cs_pp_settings_zoom_enabled',
		array(
			'section' => 'mk_s_pp_settings',
			'column'  => 'mk-col-6',
			'label' => __( 'Product Zoom', 'mk_framework' ),
		)
	)
);
