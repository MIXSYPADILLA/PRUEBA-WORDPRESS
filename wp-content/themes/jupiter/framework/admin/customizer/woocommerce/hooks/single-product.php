<?php
/**
 * WooCommerce single product hooks actions and filters.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

// Add badges section before title.
add_action( 'woocommerce_single_product_summary', function() {
	?>
		<div class="mk-single-product-badges">
			<?php do_action( 'mk_single_product_badges' ); ?>
		</div>
	<?php
}, 4 );

// Add Out of Stock badge before title.
add_action( 'mk_single_product_badges', function() {
	global $product;

	if ( ! $product->is_in_stock() || 'variable' === $product->get_type() ) {
		$style = ('variable' === $product->get_type()) ? 'display:none;' : '';
		echo '<span class="mk-out-of-stock" style="' . esc_attr( $style ) . '">' . esc_html( get_theme_mod( 'cs_pp_s_outofstock_badge_style_text', 'Out of Stock' ) ) . '</span>';
	}

} );

// Remove Sale bage then add it before title.
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
add_action( 'mk_single_product_badges', 'woocommerce_show_product_sale_flash' );

// Show rating after price.
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating' );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );

// Show meta after rating.
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 12 );

// Filter the price variation separator.
add_filter( 'woocommerce_get_price_html', function( $price, $product ) {
	if ( 'product' === get_post_type() && is_singular() ) {
		$has_price = $product->get_price();
		$is_variable_product = $product->is_type( 'variable' );
		$is_on_sale = $product->is_on_sale();
		$price_has_range = strpos( $price, '&ndash;' ) !== false;
		if ( $has_price && $is_on_sale && $price_has_range && $is_variable_product ) {
			$price = '<ins>' . $price . '</ins>';
		}
		return str_replace( '&ndash;', '<span class="mk-price-variation-seprator">&ndash;</span>', $price );
	}
	return $price;
}, 100, 2 );

// Filter the sale badge for single page.
add_filter( 'woocommerce_sale_flash', function( $html, $post, $product ) {

	if ( ! $product->is_in_stock() || ! $product->is_on_sale() ) {
		return;
	}

	if ( is_product() ) {
		$style = ('variable' === $product->get_type()) ? 'display:none;' : '';
		return '<span class="onsale" style="' . esc_attr( $style ) . '">' . esc_html( get_theme_mod( 'cs_pp_s_sale_badge_style_text', 'sale' ) ) . '</span>';
	}

	return $html;

}, 10, 3 );

add_action( 'woocommerce_share', function() {
	global $product;

	$networks = array(
		'facebook',
		'twitter',
		'pinterest',
		'linkedin',
		'googleplus',
		'reddit',
		'digg',
		'email',
	);

	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

	echo '<div class="social-share">';
	echo '<ul>';
	foreach ( $networks as $network ) {
		echo '<li class="share-by share-by-' . esc_attr( $network ) . '">';
		switch ( $network ) {
			case 'facebook':
			case 'twitter':
			case 'pinterest':
			case 'linkedin':
			case 'googleplus':
			case 'reddit':
			case 'digg':
				$icon_class = 'mk-jupiter-icon-simple-' . $network;
				$href = '#';
				break;
			case 'email':
				$icon_class = 'mk-moon-envelop-2';
				$href = 'mailto:?Subject=' . urldecode( get_the_title( ) ) . '&Body=' . urldecode( get_the_excerpt() );
				break;
		}

		echo '<a class="' . esc_attr( $network ) . '-share" data-title="' . the_title_attribute( array(
			'echo' => false,
		) ) . '" data-url="' . esc_url( get_permalink() ) . '" data-desc="' . esc_attr( get_the_excerpt() ) . '" data-image="' . esc_url( $image_src_array[0] ) . '" href="' . esc_attr( $href ) . '" rel="nofollow">';

		Mk_SVG_Icons::get_svg_icon_by_class_name( true, $icon_class, 18 );

		echo '</a>';
		echo '</li>';
	}// End foreach().
	echo '</ul>';
	echo '</div>';

} );

// Filter the add to cart button text and add icon.
add_filter( 'woocommerce_product_single_add_to_cart_text', function( $text, $product ) {
	// No icons for external products, for now.
	if ( 'external' !== $product->get_type() ) {
		$typography = mk_maybe_json_decode( get_theme_mod( 'cs_pp_s_add_to_cart_style_typography' ) );

		echo '<span class="mk-button-icon">';
			Mk_SVG_Icons::get_svg_icon_by_class_name(
				true,
				'mk-moon-cart-2',
				( ! empty( $typography->size ) ) ? $typography->size : '12'
			);
		echo '</span>';
		$text = get_theme_mod( 'cs_pp_s_add_to_cart_style_text', $text );
	}

	return $text;
}, 10, 2 );

add_action( 'wp_enqueue_scripts', function() {

	// Filter the Product Lightbox status.
	add_filter( 'woocommerce_single_product_photoswipe_enabled', function( $enabled ) {

		$enabled = ( get_theme_mod( 'cs_pp_settings_photoswipe_enabled', 'true' ) === 'true' );

		return $enabled;

	} );

	// Filter the Product Magnifier status.
	add_filter( 'woocommerce_single_product_zoom_enabled', function( $enabled ) {

		$enabled = ( get_theme_mod( 'cs_pp_settings_zoom_enabled', 'true' ) === 'true' );

		return $enabled;

	} );

}, 0);



// Filter body css class based on selected layout.
add_filter( 'body_class', function( $classes ) {

	if ( is_product() ) {
		return array_merge( $classes, array( 'mk-product-layout-' . get_theme_mod( 'cs_pp_settings_layout', '1' ) ) );
	}

	return $classes;

} );

// Add Gallery orientation class to product post.
add_filter( 'post_class', function( $classes ) {

	if ( is_product() ) {
		return array_merge(
			$classes,
			array( 'mk-product-orientation-' . get_theme_mod( 'cs_pp_s_image_style_orientation', 'horizontal' ) )
		);
	}

	return $classes;

} );

// Turn on directionNav for single product flexslider.
add_filter( 'woocommerce_single_product_carousel_options', function( $options ) {
	$options['directionNav'] = true;

	return $options;
} );

// Modify WooCommerece shop_single image size.
$image_ratio = get_theme_mod( 'cs_pp_s_image_style_image_ratio', '1_by_1' );
$product_layout = get_theme_mod( 'cs_pp_settings_layout', '1' );

if ( $image_ratio ) {

	add_filter( 'woocommerce_get_image_size_shop_single', function( $size ) use ( $image_ratio, $product_layout ) {

		$width = 600;

		// Other layout need to be checked in future.
		if ( '3' === $product_layout ) {
			$width = 1140; // later get grid_width from theme options.
		}

		switch ( $image_ratio ) {
			case '16_by_9':
				$height = round( ($width * 9) / 16 );
				break;
			case '3_by_2':
				$height = round( ($width * 2) / 3 );
				break;
			case '2_by_3':
				$height = round( ($width * 3) / 2 );
				break;
			case '9_by_16':
				$height = round( ($width * 16) / 9 );
				break;
			default:
				$height = $width;
				break;
		}

		$size = array(
			'width'  => $width,
			'height' => $height,
			'crop'   => 1, // We may need to add an extra option for this later.
		);

		return $size;

	} );

} // End if().

