<?php
/**
 * Add Settings section of Checkout & Cart.
 * Prefix: s -> shop, cc -> checkout-cart
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_cc_settings', array(
		'title' => __( 'Settings', 'mk_framework' ),
		'priority' => 10,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			false,
		),
	)
);
