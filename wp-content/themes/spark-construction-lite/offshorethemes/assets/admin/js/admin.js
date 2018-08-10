( function( $ ) {
	jQuery( document ).ready( function() {
		jQuery('body').on( 'click', '.radio-image-container', function() {
	      $(this).find( 'input[type="radio"]' ).prop( 'checked', true );
	    } );
	} );	
} ) ( jQuery );	
	