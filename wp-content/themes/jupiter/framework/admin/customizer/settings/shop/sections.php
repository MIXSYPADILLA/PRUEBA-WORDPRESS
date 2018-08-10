<?php
/**
 * Add Shop section.
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_shop' , array(
	'title'      => __( 'Shop','mk-framework' ),
	'priority'   => 500,
) );

$wp_customize->add_setting( 'mk-shop' );

$wp_customize->add_control(
	new MK_dialog_Control(
		$wp_customize,
		'mk-shop',
		array(
			'section' => 'mk_shop',
			'pages' => array(
				'mk_s_pl_dialog' => __( 'Product List', 'mk_framework' ),
				'mk_s_pp_dialog' => __( 'Product Page', 'mk_framework' ),
				'mk_s_cc_dialog' => __( 'Checkout & Cart', 'mk_framework' ),
			),
			'column'  => '',
		)
	)
);

// Load all sections.
$sections = glob( dirname( __FILE__ ) . '/*/section-*.php' );

foreach ( $sections as $section ) {
	require_once( $section );
}
