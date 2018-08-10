<?php
/**
 * Customizer Dynamic Styles: Section Category Style.
 *
 * Prefix: pl -> product list, s -> styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$css = '';

$css .= '.woocommerce-page.single-product div.product .product_meta>span.posted_in {';
$css .= mk_cs_typography( 'cs_pp_s_category_style_typography', array( 'weight' ) );
$css .= mk_cs_box_model( 'cs_pp_s_category_style_box_model' );
$css .= '}';

$css .= '.woocommerce-page.single-product div.product .product_meta>span.posted_in a {';
$css .= mk_cs_typography( 'cs_pp_s_category_style_typography' );
$css .= '}';

return $css;
