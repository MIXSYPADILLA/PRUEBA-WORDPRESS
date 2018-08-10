<?php
/**
 * Register Widgets
 *
 * @package sparkconstructionlite
 */

// Load Widget Class
require get_template_directory() . '/offshorethemes/widgets/widgets.php';

if ( ! function_exists( 'sparkconstructionlite_widget_register' ) ) :

	function sparkconstructionlite_widget_register() {

		// Company Info Wiget
		register_widget( 'sparkconstructionlite_Company_Info_Widget' );

	}
endif;

add_action( 'widgets_init', 'sparkconstructionlite_widget_register' );