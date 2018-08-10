<?php
/**
 * Dynamic styles for Setting section in Product List Page.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$full_width = get_theme_mod( 'cs_pl_settings_full_width', 'false' );
$horizontal_space = get_theme_mod( 'cs_pl_settings_horizontal_space', 30 );
$vertical_space = get_theme_mod( 'cs_pl_settings_vertical_space', 30 );
$product_info_align = get_theme_mod( 'cs_pp_settings_product_info_align' );

$info_selected = get_theme_mod( 'cs_pl_settings_product_info', array(
	'.woocommerce-loop-product__title',
	'.price ins',
	'.price del',
	'.button',
	'.star-rating',
) );

if ( $info_selected && is_string( $info_selected ) ) {
	$info_selected = explode( ',', $info_selected );
}

if ( ! is_array( $info_selected ) ) {
	$info_selected = array();
}

$wrap_margin = (($horizontal_space / 2) - $horizontal_space);

$item_margin = $horizontal_space / 2;

$info_selectors = array(
	'.woocommerce-loop-product__title',
	'.price ins',
	'.price del',
	'.button',
	'.star-rating',
);

$css = '';

if ( 'true' === $full_width ) {
	$css .= '.woocommerce-page.archive .theme-page-wrapper.full-layout.mk-grid {';
	$css .= 'width:100%;';
	$css .= 'max-width:100%;';
	$css .= '}';
}

$css .= '.woocommerce-page ul.products {';
$css .= 'margin-left:' . $wrap_margin . 'px;';
$css .= 'margin-right:' . $wrap_margin . 'px;';
$css .= '}';

$css .= '.woocommerce-page ul.products li.product {';
$css .= 'margin-left:' . $item_margin . 'px;';
$css .= 'margin-right:' . $item_margin . 'px;';
$css .= 'margin-bottom:' . $vertical_space . 'px;';
$css .= '}';

if ( $product_info_align ) {
	$css .= '.woocommerce-page ul.products li.product .mk-product-warp {';
	$css .= 'text-align:' . $product_info_align . ';';
	$css .= '}';
}

$class = array();

foreach ( $info_selectors as $info_selector ) {
	if ( ! in_array( $info_selector, $info_selected, true ) ) {
		$class[] = '.woocommerce-page ul.products li.product ' . $info_selector;
		if ( '.price del' === $info_selector ) {
			$class[] = '.woocommerce-page ul.products li.product .price > .amount';
		}
	}
}

if ( $class ) {
	$css .= implode( ', ', $class ) . '{display:none;}';
}

for ( $i = 1; $i <= 4 ; $i++ ) {
	$css .= '.woocommerce-page ul.products.per-row-' . $i . ' li.product {';
	$css .= 'width: calc(' . (100 / $i) . '% - ' . $horizontal_space . 'px);';
	$css .= '}';
}

return $css;
