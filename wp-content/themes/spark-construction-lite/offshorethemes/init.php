<?php
/**
 * Main Custom admin functions area
 *
 * @since OffshoreThemes
 *
 * @param Spark Construction Lite
 *
 */


/**
 * Implement the Custom Header feature.
*/
require get_theme_file_path('offshorethemes/core/custom-header.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require get_theme_file_path('offshorethemes/core/template-functions.php');


/**
 * Custom template tags for this theme.
 */
require get_theme_file_path('offshorethemes/core/template-tags.php');


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {

	require get_theme_file_path('offshorethemes/core/jetpack.php');
    
}

/**
 * Load Breadcrumbs file
 */
require get_theme_file_path('offshorethemes/third-party/breadcrumbs.php');


/**
 * Load Helpers file
 */
require get_theme_file_path('offshorethemes/helpers.php');

/**
 * Load Hooks file
 */
require get_theme_file_path('offshorethemes/hooks.php');

/**
 * Load Filters file
 */
require get_theme_file_path('offshorethemes/filters.php');

/**
 * Load Customizer additions File.
 */
require get_theme_file_path('offshorethemes/customizer/customizer.php');

/**
 * Load Customizer Defaults file
 */
require get_theme_file_path('offshorethemes/customizer/defaults.php');

/**
 * Load Customizer Functions File.
 */
require get_theme_file_path('offshorethemes/customizer/customizer-functions.php');


/**
 * Load Widgets Init file
 */
require get_theme_file_path('offshorethemes/widgets/widgets-init.php');


/**
 * Meta Box
 */
require get_theme_file_path('offshorethemes/meta-box/meta-box.php');


/**
 * Load Admin info.
 */
if ( is_admin() ) {

	require get_theme_file_path('offshorethemes/admin/about-theme/class.info.php');
	require get_theme_file_path('offshorethemes/admin/about-theme/info.php');
	
}

/**
 * Load TMG libraries.
 */
require get_theme_file_path('offshorethemes/tgm/tgm.php');
require get_theme_file_path('offshorethemes/tgm/class-tgm-plugin-activation.php');

/**
 * Load OCDI libraries.
 */
require get_theme_file_path('offshorethemes/ocdi/ocdi.php');

/**
 * Load in customizer upgrade to pro
*/
require get_theme_file_path('offshorethemes/customizer/customizer-pro/class-customize.php');
