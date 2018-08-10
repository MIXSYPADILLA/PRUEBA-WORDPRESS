<?php
/**
 * Dynamic styles for Out Of Stock Badge Style section in Product Page > Styles.
 *
 * Prefix: pp -> product page, s -> styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$css .= '.woocommerce-page.single-product .images .flex-viewport {';

$border_width = get_theme_mod( 'cs_pp_s_image_style_border_width' );
if ( $border_width ) {
	$css .= "border-width: {$border_width}px;";
}

$border_color = get_theme_mod( 'cs_pp_s_image_style_border_color' );
if ( $border_color ) {
	$css .= "border-color: {$border_color};";
}

$css .= '}';

return $css;
