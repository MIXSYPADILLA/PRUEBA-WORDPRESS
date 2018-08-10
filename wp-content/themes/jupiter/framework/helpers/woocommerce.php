<?php
/**
 * Woocommerce Helper Functions.
 *
 * @package Jupiter
 * @since 5.9.4
 */

/**
 * Check WooCommerce version.
 *
 * @since 5.9.4
 * @param string $version The version you want to check for.
 */
function mk_is_woocommerce_version( $version = '3.0' ) {
	if ( class_exists( 'WooCommerce' ) ) {
		global $woocommerce;
		if ( version_compare( $woocommerce->version, $version, '>=' ) ) {
			return true;
		}
	}
	return false;
}
