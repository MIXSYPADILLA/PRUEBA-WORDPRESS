<?php
/**
 * Customizer Dynamic Styles: Section Settings.
 *
 * Prefix: pp -> product page
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$css = '';

$layout = get_theme_mod( 'cs_pp_settings_layout', '1' );

$layout_dynamic_style = THEME_CUSTOMIZER_DIR . '/dynamic-styles/customise-shop/product-page/layouts/layout-' . $layout . '.php';

if ( file_exists( $layout_dynamic_style ) ) {
	$css = include( $layout_dynamic_style );
}

$selectors = array(
	'.summary .price ins',
	'.summary .price del',
	'.summary .woocommerce-product-rating',
	'.summary .product_meta .posted_in',
	'.summary .product_meta .tagged_as',
	'.summary .product_meta .sku_wrapper',
	'.summary .woocommerce-product-details__short-description',
	'.summary .variations',
	'.summary .cart .quantity',
	'.summary .social-share',
	'.woocommerce-tabs #tab-title-description|.woocommerce-tabs #tab-description',
	'.woocommerce-tabs #tab-title-reviews|.woocommerce-tabs #tab-reviews',
	'.woocommerce-tabs #tab-title-additional_information|.woocommerce-tabs #tab-additional_information',
);

$selected = get_theme_mod( 'cs_pp_settings_product_info', array(
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
) );

if ( ! empty( $selected ) ) {
	if ( is_string( $selected ) ) {
		$selected = explode( ',', $selected );
	}
}

if ( ! is_array( $selected ) ) {
	$selected = array();
}

$class_prefix = '.woocommerce-page.single-product .product ';

$class = array();
$hide_tabs = true;
foreach ( $selectors as $selector ) {
	if ( ! in_array( $selector, $selected, true ) ) {
		$parts = explode( '|', $selector );
		foreach ( $parts as $part ) {
			$class[] = $class_prefix . $part;
			if ( '.summary .price del' === $part ) {
				$class[] = $class_prefix . '.summary .price > .amount';
			}
		}
	} else {
		if ( false !== strpos( $selector, '.woocommerce-tabs' ) ) {
			$hide_tabs = false;
		}
	}
}

if ( $hide_tabs ) {
	$class[] = $class_prefix . '.woocommerce-tabs';
}

if ( $class ) {
	$css .= implode( ', ', $class ) . '{display:none;}';
}

return $css;
