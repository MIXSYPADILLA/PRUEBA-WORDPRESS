<?php
/**
 * OCDI support.
 *
 * @package Spark Construction Lite
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */
function spark_construction_lite_ocdi_files() {

	return array(
		array(
			'import_file_name'             => esc_html__( 'Theme Demo Content', 'spark-construction-lite' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'offshorethemes/ocdi/sparkconstructionlite.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'offshorethemes/ocdi/sparkconstructionlite.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'offshorethemes/ocdi/sparkconstructionlite.dat',
			),
		);
}

add_filter( 'pt-ocdi/import_files', 'spark_construction_lite_ocdi_files', 99 );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function spark_construction_lite_ocdi_after_import() {

	// Assign front page and posts page (blog page).
	$front_page_id = null;
	$blog_page_id  = null;


	// Assign navigation menu locations.
	$menu_location_details = array(
		'menu-1'    => 'Main Menu',
		'menu-2'    => 'Social',
	);

	if ( ! empty( $menu_location_details ) ) {
		$navigation_settings = array();
		$current_navigation_menus = wp_get_nav_menus();
		if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
			foreach ( $current_navigation_menus as $menu ) {
				foreach ( $menu_location_details as $location => $menu_slug ) {
					if ( $menu->slug === $menu_slug ) {
						$navigation_settings[ $location ] = $menu->term_id;
					}
				}
			}
		}

		set_theme_mod( 'nav_menu_locations', $navigation_settings );
	}
}

add_action( 'pt-ocdi/after_import', 'spark_construction_lite_ocdi_after_import' );
