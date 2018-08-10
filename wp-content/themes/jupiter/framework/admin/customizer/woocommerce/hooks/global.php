<?php
/**
 * WooCommerce hooks actions and filters global scope.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

// Enqueue woocommerce styles.
add_action( 'wp_enqueue_scripts', function() {
	if ( is_woocommerce() || is_cart() || is_checkout() ) {

		$theme_version = get_option( 'mk_jupiter_theme_current_version' );

		wp_enqueue_style(
			'mk-woocommerce',
			THEME_CUSTOMIZER_URI . '/woocommerce/assets/css/woocommerce.css',
			'',
			$theme_version
		);

		wp_enqueue_script(
			'mk-woocommerce',
			THEME_CUSTOMIZER_URI . '/woocommerce/assets/js/woocommerce.js',
			array( 'jquery' ),
			$theme_version,
			true
		);

	}
} );

// Change default template folder.
add_filter( 'woocommerce_template_path', function( $path ) {

	// Modification: Get the template from this customizer, if it exists.
	if ( is_dir( THEME_CUSTOMIZER_DIR . '/woocommerce/templates' ) ) {
		$path = 'framework/admin/customizer/woocommerce/templates/';
	}

	// Return what we found.
	return $path;
} );
