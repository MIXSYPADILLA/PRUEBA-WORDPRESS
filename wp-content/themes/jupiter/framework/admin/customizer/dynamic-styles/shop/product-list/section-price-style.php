<?php
/**
 * Dynamic styles for Regular Price Style section in Product List > Styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$css = '.woocommerce-page ul.products li.product .price > .amount,';
$css .= '.woocommerce-page ul.products li.product .price del .amount,';
$css .= '.woocommerce-page ul.products li.product .price > .mk-price-variation-seprator,';
$css .= '.woocommerce-page ul.products li.product .price del .mk-price-variation-seprator {';
$css .= mk_cs_box_model( 'cs_pl_s_price_style_box_model' );
$css .= mk_cs_typography( 'cs_pl_s_price_style_typography' );
$css .= '}';

return $css;
