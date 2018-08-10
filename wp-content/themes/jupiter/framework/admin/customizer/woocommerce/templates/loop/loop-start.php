<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

?>
<ul class="products per-row-<?php echo esc_attr( apply_filters( 'loop_shop_columns', 4 ) ); ?> thumbnail-hover-style-<?php echo esc_attr( get_theme_mod( 'cs_pl_settings_hover_style', 'none' ) ); ?>" data-columns="<?php echo esc_attr( apply_filters( 'loop_shop_columns', 4 ) ); ?>" data-margin="<?php echo esc_attr( get_theme_mod( 'cs_pl_settings_horizontal_space', '30' ) ); ?>">
