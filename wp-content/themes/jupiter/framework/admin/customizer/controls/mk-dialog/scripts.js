jQuery( document ).ready( function( $ ) {

	var api = wp.customize;

	/**
	 * Build the tabs inside the parent dialog and append settings.
	 * @param  string content   Main content of the dialog.
	 * @param  string sectionId The parent dialog section id.
	 * @return mixed           Necessary markup.
	 */
	function mkBuildTabs( content, sectionId ) {
		if ( content.find( 'ul' ).length ) {
			return;
		}

		// Build the tabs.
		var tabs = [
			{ id: sectionId + '-settings-panel', text: 'Settings' },
			{ id: sectionId + '-styles-panel', text: 'Styles', styles: [] },
		];

		// Build the content of Styles tab based on sectionId.
		api.section.each( function( section ) {

			if ( section.params.type[1] !== sectionId ) {
				return;
			}

			tabs[1]['styles'].push( { 
				id: section.id,
				text: section.params.title,
			} );

		});

		var tabsId = sectionId + '-tabs';

		content.append( '<div id="' + tabsId + '">\
			<ul></ul>\
		</div>' );

		$.each( tabs, function( index, tab ) {
			$( '#' + tabsId + ' > ul' ).append( '<li>\
				<a href="#' + tab.id + '">' + tab.text + '</a>\
			</li>' );

			$( '#' + tabsId ).append( '<div id="' + tab.id + '"></div>' );
		} );

		$( '#' + tabs[1]['id'] ).append( '<ul class="mk-row"></ul>' );

		$.each( tabs[1]['styles'], function( index, value ) {
		
			$( '#' + tabs[1]['id'] + ' > ul' ).append( '<li class="mk-col-5 textright"><span class="mk-style-title">' + value.text + '</span></li>\
				<li class="mk-col-7">\
					<button type="button" class="button mk-child-dialog-button" data-dialog="' + value.id + '" data-title="' + value.text + '">\
						<span class="dashicons dashicons-admin-generic"></span> Customize\
					</button>\
					<div id="' + value.id + '-dialog"></div>\
				</li>' );

		} );

		$( "#" + tabsId ).tabs();

		sectionId = sectionId.replace( '_dialog', '_settings' );

		// Append this section settings in Settings tab.
		content.find( '#' + tabs[0]['id'] ).append( mkLoadSettings( sectionId ) );
	}

	/**
	 * Load a section of settings from Customizer.
	 * @param  string sectionId ID of the section.
	 * @return object           An object contains of necessary markup.
	 */
	function mkLoadSettings( sectionId ) {
		var settings = '';

		if ( typeof api.section( sectionId ) === 'undefined' ) {
			return 'Invalid section ID.';
		}

		settings = api.section( sectionId ).contentContainer;

		// Remove meta section which is useless.
		settings.children().remove( '.section-meta' );

		// Replace all the class then add necessary class. 
		settings.removeClass().addClass( 'mk-row' );

		return settings[0];
	}

	/**
	 * Open the parent dialog and show the settings tab.
	 */
	$( document ).on( 'click', '.mk-dialog-button', function() {

		if ( $( this ).prop( 'disabled' ) ) {
			return;
		}

		$( this ).addClass( 'active' );

		var id = $( this ).data( 'dialog' );
		var title = $( this ).text() + ' Settings';

		$( '#' + id ).dialog( {
			title: title,
			closeText: 'Close',
			dialogClass: 'mk-dialog-parent ' + id + '-dialog',
			width: 460,
			height: 590,
			resizable: false,
			position: {
				my: 'left+20 top+20',
				at: 'left top',
			},
			open: function() {
				// Disable the buttons to prevent multiple dialogs.
				$( '.mk-dialog-button:not(".active")' ).prop( 'disabled', true );

				// Build the tabs and their contents.
				mkBuildTabs( $( this ), id );
			},
			beforeClose: function() {
				// Enable the buttons to allow a dialog.
				$( '.mk-dialog-button' ).removeClass( 'active' ).prop( 'disabled', false );
			}
		} );

	} );

	/**
	 * Open child dialog inside its parent dialog.
	 */
	$( document ).on( 'click', '.mk-child-dialog-button', function() {

		var id = $( this ).data( 'dialog' );
		var title = $( this ).data( 'title' );

		$( '#' + id + '-dialog' ).dialog({
			title: title,
			closeText: 'Close',
			dialogClass: 'mk-dialog-child',
			width: 409,
			height: 525,
			resizable: false,
			position: { 
				my: 'left+25 top+35', 
				at: 'left top', 
				of: '.mk-dialog-parent:visible' 
			},
			open: function() {
				var content = $( this );

				$( '.mk-dialog-parent:visible' ).addClass( 'mk-dialog-child-open' );

				if ( $( 'ul', content ).length ) {
					return;
				}

				content.append( mkLoadSettings( id ) );
			},
			close: function() {
				$( '.mk-dialog-parent:visible' ).removeClass( 'mk-dialog-child-open' );
			},
			drag: function() {
				// Move the parent dialog according to child dialog.
				$( '.mk-dialog-parent:visible' ).position({
					my: 'center center-30', 
					of: $( this ),
					collision: 'fit',
					// collision: 'none'
				});

				// Close open color picker.
				$( '.mk-color-picker-holder input' ).spectrum( 'hide' );
			}
		});

	} );

} ); // End of ready function.
