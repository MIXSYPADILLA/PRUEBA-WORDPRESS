(function($) {
	
	var class_prefix = '.woocommerce-page.single-product .product ';
	
	wp.customize( 'cs_pp_settings_layout', function( value ) {

		value.bind(function( to ) {
			mkPreviewSaveReload();
		} );

	} );
	
	wp.customize('cs_pp_settings_product_info', function(value) {
		
		var selectors = [
			'.summary .price ins',
			'.summary .price del',
			'.summary .woocommerce-product-rating',
			'.summary .product_meta .posted_in',
			'.summary .product_meta .tagged_as',
			'.summary .product_meta .sku_wrapper',
			'.summary .woocommerce-product-details__short-description',
			'.summary .variations',
			'.summary .cart .quantity',
			'.summary .social-share',
			'.woocommerce-tabs #tab-title-description|.woocommerce-tabs #tab-description',
			'.woocommerce-tabs #tab-title-reviews|.woocommerce-tabs #tab-reviews',
			'.woocommerce-tabs #tab-title-additional_information|.woocommerce-tabs #tab-additional_information',
		];
		
		var infos = typeof value.get() === 'object' ? value.get() : value.get().split(',');
		
		$(class_prefix + '.woocommerce-tabs').hide();
		
		for (var i = 0; i < selectors.length; i++) {
			var parts = selectors[i].split('|');
			for (var j = 0; j < parts.length; j++) {
				if (infos.indexOf(selectors[i]) === -1) {
					$(class_prefix + parts[j]).hide();
					if (parts[j] === '.summary .price del') {
						$(class_prefix + '.summary .price > .amount').hide();
					}
				} else {
					$(class_prefix + parts[j]).show();
					if (parts[j].indexOf('.product_meta') !== -1) {
						$(class_prefix + parts[j]).css({
							'display': 'block'
						});
					}
					if (parts[j].indexOf('#tab-title') !== -1) {
						$(class_prefix + parts[j]).css({
							'display': 'inline-block'
						});
						$(class_prefix + parts[j]).find('a').click();
					}
					if (parts[j].indexOf('.woocommerce-tabs') !== -1) {
						$(class_prefix + '.woocommerce-tabs').show();
					}
					if (parts[j] === '.summary .price del') {
						$(class_prefix + '.summary .price > .amount').show();
					}
				}
			}
		}
		
		value.bind(function(to) {
			
			infos = typeof to === 'object' ? to : to.split(',');
			
			$(class_prefix + '.woocommerce-tabs').hide();
			
			for (var i = 0; i < selectors.length; i++) {
				var parts = selectors[i].split('|');
				for (var j = 0; j < parts.length; j++) {
					if (infos.indexOf(selectors[i]) === -1) {
						$(class_prefix + parts[j]).hide();
						if (parts[j] === '.summary .price del') {
							$(class_prefix + '.summary .price > .amount').hide();
						}
					} else {
						$(class_prefix + parts[j]).show();
						if (parts[j].indexOf('.product_meta') !== -1) {
							$(class_prefix + parts[j]).css({
								'display': 'block'
							});
						}
						if (parts[j].indexOf('#tab-title') !== -1) {
							$(class_prefix + parts[j]).css({
								'display': 'inline-block'
							});
							$(class_prefix + parts[j]).find('a').click();
						}
						if (parts[j].indexOf('.woocommerce-tabs') !== -1) {
							$(class_prefix + '.woocommerce-tabs').show();
						}
						if (parts[j] === '.summary .price del') {
							$(class_prefix + '.summary .price > .amount').show();
						}
					}
				}
			}
			
		});
	});
	
})(jQuery);