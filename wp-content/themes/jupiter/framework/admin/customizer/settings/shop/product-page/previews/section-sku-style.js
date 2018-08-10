(function( $ ) {

	var productSkuWrapper = '.woocommerce-page.single-product div.product .product_meta>span.sku_wrapper';

	// Method for Control's event handlers: cs_pp_s_sku_style_typography.
	wp.customize('cs_pp_s_sku_style_typography', function (value) {
		$(productSkuWrapper).css(
			mkPreviewTypography(value(), true, ['weight'])
		);
		$(productSkuWrapper).find('.sku').css(
			mkPreviewTypography(value(), false)
		);
		value.bind(function (to) {
			$(productSkuWrapper).css(
				mkPreviewTypography(to, false, ['weight'])
			);
			$(productSkuWrapper).find('.sku').css(
				mkPreviewTypography(to, false)
			);
		});
	});

	// Method for Control's event handlers: cs_pp_s_sku_style_box_model.
	wp.customize('cs_pp_s_sku_style_box_model', function (value) {
		$(productSkuWrapper).css(
			mkPreviewBoxModel(value())
		);
		value.bind(function (to) {
			$(productSkuWrapper).css(
				mkPreviewBoxModel(to)
			);
		});
	});

} )( jQuery );