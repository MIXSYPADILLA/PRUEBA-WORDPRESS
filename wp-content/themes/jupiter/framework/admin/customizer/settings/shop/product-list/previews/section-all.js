/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {
	
	wp.customize( 'cs_pl_all_select', function( value ) {
		value.bind( function( to ) {
			console.log( to );
		} );
	});
	
	wp.customize( 'cs_pl_all_text', function( value ) {
		value.bind( function( to ) {
			console.log( to );
		} );
	});
	
	wp.customize( 'cs_pl_all_color', function( value ) {
		value.bind( function( to ) {
			console.log( to );
		} );
	});
		
	wp.customize( 'cs_pl_box_model', function( value ) {
		value.bind( function( to ) {
			console.log( to );
		} );
	});

	wp.customize( 'cs_pl_all_typography', function( value ) {
		value.bind( function( to ) {
			var typography = $.parseJSON( to );
			$( '.page-title' ).css( 'font-family', typography['family'] );
		} );
	}); 

} )( jQuery );