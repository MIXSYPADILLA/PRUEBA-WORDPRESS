<?php
/**
 * Add Steps section of Checkout & Cart > Styles.
 * Prefix: s -> shop, cc -> checkout-cart, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_cc_s_steps', array(
		'title' => __( 'Steps', 'mk_framework' ),
		'priority' => 10,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_cc_dialog',
		),
	)
);

// Box Model.
$wp_customize->add_setting( 'cs_cc_s_steps_style_box_model', array(
	'default' => array(
		'margin_top' => 0,
		'margin_right' => 0,
		'margin_bottom' => 0,
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
		'cs_cc_s_steps_style_box_model',
		array(
			'section' => 'mk_s_cc_s_steps',
			'column'  => 'mk-col-12',
		)
	)
);
