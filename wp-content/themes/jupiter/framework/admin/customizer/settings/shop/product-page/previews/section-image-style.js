jQuery( document ).ready( function( $ ) {

	var flexViewport = '.woocommerce-page.single-product .images .flex-viewport';

	// Height.
	wp.customize( 'cs_pp_s_image_style_image_ratio' , function( value ) {

		value.bind( function( to ) {
			mkPreviewSaveReload();
		} );

	} );

	// Border width.
	wp.customize( 'cs_pp_s_image_style_border_width' , function( value ) {

		var el = 'cs_pp_s_image_style_border_width';
		var styles = {};

		styles[ flexViewport ] = 'border-width: ' + value() + 'px';
		mkPreviewInternalStyle( styles, el );

		setTimeout( function() {
			$( '.flex-active-slide' ).resize();
		}, 1000);

		value.bind( function( to ) {
			$( flexViewport ).css( 'border-width', to + 'px' );

			setTimeout( function() {
				$( '.flex-active-slide' ).resize();
			}, 1000);
		} );

	} );

	// Border color.
	wp.customize( 'cs_pp_s_image_style_border_color' , function( value ) {

		var el = 'cs_pp_s_image_style_border_color';
		var styles = {};

		styles[ flexViewport ] = 'border-color: ' + value();
		mkPreviewInternalStyle( styles, el );

		value.bind( function( to ) {
			$( flexViewport ).css( 'border-color', to );
		} );

	} );

} );

