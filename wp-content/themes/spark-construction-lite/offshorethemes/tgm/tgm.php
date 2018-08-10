<?php
/**
 * Recommended plugins
 *
 * @package Spark Construction Lite
 */

if ( ! function_exists( 'spark_construction_lite_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function spark_construction_lite_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Contact Form 7', 'spark-construction-lite' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'spark-construction-lite' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}

endif;

add_action( 'tgmpa_register', 'spark_construction_lite_recommended_plugins' );
