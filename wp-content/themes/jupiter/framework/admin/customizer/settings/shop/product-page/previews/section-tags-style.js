(function( $ ) {

	var productTaggedAs = '.woocommerce-page.single-product div.product .product_meta>span.tagged_as';

	// Method for Control's event handlers: cs_pp_s_tags_style_typography.
	wp.customize('cs_pp_s_tags_style_typography', function (value) {
		$(productTaggedAs).css(
			mkPreviewTypography(value(), true, ['weight'])
		);
		$(productTaggedAs).find('a').css(
			mkPreviewTypography(value(), false)
		);
		value.bind(function (to) {
			$(productTaggedAs).css(
				mkPreviewTypography(to, false, ['weight'])
			);
			$(productTaggedAs).find('a').css(
				mkPreviewTypography(to, false)
			);
		});
	});

	// Method for Control's event handlers: cs_pp_s_tags_style_box_model.
	wp.customize('cs_pp_s_tags_style_box_model', function (value) {
		$(productTaggedAs).css(
			mkPreviewBoxModel(value())
		);
		value.bind(function (to) {
			$(productTaggedAs).css(
				mkPreviewBoxModel(to)
			);
		});
	});

} )( jQuery );