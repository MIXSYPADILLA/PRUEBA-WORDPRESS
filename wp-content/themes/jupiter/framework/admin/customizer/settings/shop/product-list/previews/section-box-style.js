/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {

	var box_style_container = '.woocommerce-page ul.products li.product  .mk-product-warp';

	wp.customize( 'cs_pl_s_box_style_background_color', function( value ) {

		$( box_style_container ).css( 'background-color', value() );
		
		value.bind( function( to ) {
			$( box_style_container ).css( 'background-color', to );
		} );

	});

	wp.customize( 'cs_pl_s_box_style_border_radius', function( value ) {

		$( box_style_container ).css( 'border-radius', value() + 'px' );

		value.bind( function( to ) {
			$( box_style_container ).css( 'border-radius', to + 'px' );
		} );

	});

	wp.customize( 'cs_pl_s_box_style_border_width', function( value ) {

		$( box_style_container ).css( 'border-width', value() + 'px' );

		value.bind( function( to ) {
			$( box_style_container ).css( 'border-width', to + 'px' );
		} );

	});

	wp.customize( 'cs_pl_s_box_style_border_color', function( value ) {

		$( box_style_container ).css( 'border-color', value() );

		value.bind( function( to ) {
			$( box_style_container ).css( 'border-color', to );
		} );

	});

	wp.customize( 'cs_pl_s_box_style_box_model', function( value ) {

		$( box_style_container ).css(
			mkPreviewBoxModel( value() )
		);

		value.bind(function (to) {
			$( box_style_container ).css(
				mkPreviewBoxModel( to )
			);
		});

	});

} )( jQuery );

