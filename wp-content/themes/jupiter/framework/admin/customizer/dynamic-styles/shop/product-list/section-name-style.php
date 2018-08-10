<?php
/**
 * Customizer Dynamic Styles: Section Product Name Style.
 *
 * Prefix: pl -> product list, s -> styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$css = '';

// Dynamic styles for cs_pl_s_name_style_typography.
$css .= '.woocommerce-page ul.products li.product .woocommerce-loop-product__title {' . mk_cs_typography( 'cs_pl_s_name_style_typography' ) . '}';

// Dynamic styles for cs_pl_s_name_style_box_model.
$css .= '.woocommerce-page ul.products li.product .woocommerce-loop-product__title {' . mk_cs_box_model( 'cs_pl_s_name_style_box_model' ) . '}';

return $css;
