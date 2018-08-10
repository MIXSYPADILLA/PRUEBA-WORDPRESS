<?php
/**
 * Customizer Dynamic Styles: Section Rating Style.
 *
 * Prefix: pl -> product list, s -> styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

$star_rating = '.woocommerce-page ul.products li.product .star-rating';

$css = $star_rating . '{';

$font_size = get_theme_mod( 'cs_pl_s_rating_style_font_size' );
if ( $font_size ) {
	$css .= "font-size: {$font_size}px;";
}

$star_color = get_theme_mod( 'cs_pl_s_rating_style_active_star_color' );
if ( $star_color ) {
	$css .= "color: {$star_color};";
}

$css .= mk_cs_box_model( 'cs_pl_s_rating_style_box_model' );

$css .= '}';

$css .= $star_rating . '::before {';

$star_active_color = get_theme_mod( 'cs_pl_s_rating_style_star_color' );
if ( $star_active_color ) {
	$css .= "color: {$star_active_color};";
}

$css .= '}';

return $css;
