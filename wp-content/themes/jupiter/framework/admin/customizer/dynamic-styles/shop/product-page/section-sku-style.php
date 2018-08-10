<?php
/**
 * Customizer Dynamic Styles: Section SKU Style.
 *
 * Prefix: pp -> product page, s -> styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$css = '';

$css .= '.woocommerce-page.single-product div.product .product_meta>span.sku_wrapper {';
$css .= mk_cs_typography( 'cs_pp_s_sku_style_typography', array( 'weight' ) );
$css .= mk_cs_box_model( 'cs_pp_s_sku_style_box_model' );
$css .= '}';

$css .= '.woocommerce-page.single-product div.product .product_meta>span.sku_wrapper .sku {';
$css .= mk_cs_typography( 'cs_pp_s_sku_style_typography' );
$css .= '}';

return $css;
