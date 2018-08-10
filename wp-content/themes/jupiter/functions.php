<?php
$theme = new Theme( true );
$theme->init(
	array(
	'theme_name' => 'Jupiter',
	'theme_slug' => 'JP',
	)
);

if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

class Theme {

	public function __construct( $check = false ) {
		if ( $check ) {
			$this->theme_requirement_check();
		}
	}

	public function init( $options ) {
		$this->constants( $options );
		$this->backward_compatibility();
		$this->post_types();
		$this->helpers();
		$this->functions();
		$this->menu_walkers();
		$this->admin();
		$this->theme_activated();

		add_action(
			'admin_menu', array(
			&$this,
			'admin_menus',
			)
		);

		add_action(
			'init', array(
			&$this,
			'language',
			)
		);

		add_action(
			'init', array(
			&$this,
			'add_metaboxes',
			)
		);

		add_action(
			'after_setup_theme', array(
			&$this,
			'supports',
			)
		);

		add_action(
			'after_setup_theme', array(
			&$this,
			'mk_theme_setup',
			)
		);

		add_action(
			'widgets_init', array(
			&$this,
			'widgets',
			)
		);

		add_filter(
			'http_request_timeout', function ( $timeout ) {
				$timeout = 30;
				return $timeout;
			}
		);

		$this->theme_options();
	}
	public function constants( $options ) {

		define( 'NEW_UI_LIBRARY', false );
		define( 'NEW_CUSTOM_ICON', true );
		define( 'V2ARTBEESAPI', 'http://artbees.net/api/v2/' );
		define( 'THEME_DIR', get_template_directory() );
		define( 'THEME_DIR_URI', get_template_directory_uri() );
		define( 'THEME_NAME', $options['theme_name'] );
		define( 'THEME_OPTIONS', $options['theme_name'] . '_options' . $this->lang() );
		define( 'THEME_OPTIONS_BUILD', $options['theme_name'] . '_options_build' . $this->lang() );
		define( 'IMAGE_SIZE_OPTION', THEME_NAME . '_image_sizes' );
		define( 'THEME_SLUG', $options['theme_slug'] );
		define( 'THEME_STYLES_SUFFIX', '/assets/stylesheet' );
		define( 'THEME_STYLES', THEME_DIR_URI . THEME_STYLES_SUFFIX );
		define( 'THEME_JS', THEME_DIR_URI . '/assets/js' );
		define( 'THEME_IMAGES', THEME_DIR_URI . '/assets/images' );
		define( 'FONTFACE_DIR', THEME_DIR . '/fontface' );
		define( 'FONTFACE_URI', THEME_DIR_URI . '/fontface' );
		define( 'THEME_FRAMEWORK', THEME_DIR . '/framework' );
		define( 'THEME_COMPONENTS', THEME_DIR_URI . '/components' );
		define( 'THEME_ACTIONS', THEME_FRAMEWORK . '/actions' );
		define( 'THEME_INCLUDES', THEME_FRAMEWORK . '/includes' );
		define( 'THEME_INCLUDES_URI', THEME_DIR_URI . '/framework/includes' );
		define( 'THEME_WIDGETS', THEME_FRAMEWORK . '/widgets' );
		define( 'THEME_HELPERS', THEME_FRAMEWORK . '/helpers' );
		define( 'THEME_FUNCTIONS', THEME_FRAMEWORK . '/functions' );
		define( 'THEME_PLUGIN_INTEGRATIONS', THEME_FRAMEWORK . '/plugin-integrations' );
		define( 'THEME_METABOXES', THEME_FRAMEWORK . '/metaboxes' );
		define( 'THEME_POST_TYPES', THEME_FRAMEWORK . '/custom-post-types' );

		define( 'THEME_ADMIN', THEME_FRAMEWORK . '/admin' );
		define( 'THEME_FIELDS', THEME_ADMIN . '/theme-options/builder/fields' );
		define( 'THEME_CONTROL_PANEL', THEME_ADMIN . '/control-panel' );
		define( 'THEME_CONTROL_PANEL_ASSETS', THEME_DIR_URI . '/framework/admin/control-panel/assets' );
		define( 'THEME_CONTROL_PANEL_ASSETS_DIR', THEME_DIR . '/framework/admin/control-panel/assets' );
		define( 'THEME_GENERATORS', THEME_ADMIN . '/generators' );
		define( 'THEME_ADMIN_URI', THEME_DIR_URI . '/framework/admin' );
		define( 'THEME_ADMIN_ASSETS_URI', THEME_DIR_URI . '/framework/admin/assets' );
		define( 'THEME_CUSTOMIZER_DIR', THEME_DIR . '/framework/admin/customizer' );
		define( 'THEME_CUSTOMIZER_URI', THEME_DIR_URI . '/framework/admin/customizer' );

		// Just delete this constant before releasing Jupiter. This can be defined anywhere.
		define( 'ARTBEES_HEADER_BUILDER', true );
	}
	public function backward_compatibility() {
		include_once THEME_HELPERS . '/php-backward-compatibility.php';
	}
	public function widgets() {
		include_once THEME_FUNCTIONS . '/widgets-filter.php';
		include_once locate_template( 'views/widgets/widgets-contact-form.php' );
		include_once locate_template( 'views/widgets/widgets-contact-info.php' );
		include_once locate_template( 'views/widgets/widgets-gmap.php' );
		include_once locate_template( 'views/widgets/widgets-popular-posts.php' );
		include_once locate_template( 'views/widgets/widgets-related-posts.php' );
		include_once locate_template( 'views/widgets/widgets-recent-posts.php' );
		include_once locate_template( 'views/widgets/widgets-social-networks.php' );
		include_once locate_template( 'views/widgets/widgets-subnav.php' );
		include_once locate_template( 'views/widgets/widgets-testimonials.php' );
		include_once locate_template( 'views/widgets/widgets-twitter-feeds.php' );
		include_once locate_template( 'views/widgets/widgets-video.php' );
		include_once locate_template( 'views/widgets/widgets-flickr-feeds.php' );
		include_once locate_template( 'views/widgets/widgets-instagram-feeds.php' );
		include_once locate_template( 'views/widgets/widgets-news-slider.php' );
		include_once locate_template( 'views/widgets/widgets-recent-portfolio.php' );
		include_once locate_template( 'views/widgets/widgets-slideshow.php' );
	}

	public function supports() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'editor-style' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'yoast-seo-breadcrumbs' );

		register_nav_menus(
			array(
			'primary-menu'        => __( 'Primary Navigation', 'mk_framework' ),
			'second-menu'         => __( 'Second Navigation', 'mk_framework' ),
			'third-menu'          => __( 'Third Navigation', 'mk_framework' ),
			'fourth-menu'         => __( 'Fourth Navigation', 'mk_framework' ),
			'fifth-menu'          => __( 'Fifth Navigation', 'mk_framework' ),
			'sixth-menu'          => __( 'Sixth Navigation', 'mk_framework' ),
			'seventh-menu'        => __( 'Seventh Navigation', 'mk_framework' ),
			'eighth-menu'         => __( 'Eighth Navigation', 'mk_framework' ),
			'ninth-menu'          => __( 'Ninth Navigation', 'mk_framework' ),
			'tenth-menu'          => __( 'Tenth Navigation', 'mk_framework' ),
			'footer-menu'         => __( 'Footer Navigation', 'mk_framework' ),
			'toolbar-menu'        => __( 'Header Toolbar Navigation', 'mk_framework' ),
			'side-dashboard-menu' => __( 'Side Dashboard Navigation', 'mk_framework' ),
			'fullscreen-menu'     => __( 'Full Screen Navigation', 'mk_framework' ),
			)
		);

	}
	public function post_types() {
		include_once THEME_POST_TYPES . '/custom_post_types.helpers.class.php';
		include_once THEME_POST_TYPES . '/register_post_type.class.php';
		include_once THEME_POST_TYPES . '/register_taxonomy.class.php';
		include_once THEME_POST_TYPES . '/config.php';
	}
	public function functions() {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';

		include_once THEME_INCLUDES . '/sftp/sftp-init.php';

		include_once THEME_ADMIN . '/general/general-functions.php';

		if ( ! class_exists( 'phpQuery' ) ) {
			include_once THEME_INCLUDES . '/phpquery/phpQuery.php';
		}

		include_once THEME_INCLUDES . '/otf-regen-thumbs/otf-regen-thumbs.php';

		include_once THEME_FUNCTIONS . '/general-functions.php';
		include_once THEME_FUNCTIONS . '/ajax-search.php';
		include_once THEME_FUNCTIONS . '/post-pagination.php';

		include_once THEME_FUNCTIONS . '/enqueue-front-scripts.php';
		include_once THEME_GENERATORS . '/sidebar-generator.php';
		include_once THEME_FUNCTIONS . '/dynamic-styles.php';

		include_once THEME_PLUGIN_INTEGRATIONS . '/woocommerce/init.php';
		include_once THEME_PLUGIN_INTEGRATIONS . '/visual-composer/init.php';

		include_once locate_template( 'framework/helpers/love-post.php' );
		include_once locate_template( 'framework/helpers/load-more.php' );
		include_once locate_template( 'framework/helpers/subscribe-mailchimp.php' );
		include_once locate_template( 'components/shortcodes/mk_portfolio/ajax.php' );
		include_once locate_template( 'components/shortcodes/mk_products/quick-view-ajax.php' );
	}
	public function helpers() {
		include_once THEME_HELPERS . '/global.php';
		include_once THEME_HELPERS . '/class-mk-fs.php';
		include_once THEME_HELPERS . '/class-logger.php';
		include_once THEME_HELPERS . '/survey-management.php';
		include_once THEME_HELPERS . '/db-management.php';
		include_once THEME_HELPERS . '/logic-helpers.php';
		include_once THEME_HELPERS . '/svg-icons.php';
		include_once THEME_HELPERS . '/image-resize.php';
		include_once THEME_HELPERS . '/template-part-helpers.php';
		include_once THEME_HELPERS . '/wp_head.php';
		include_once THEME_HELPERS . '/wp_footer.php';
		include_once THEME_HELPERS . '/schema-markup.php';
		include_once THEME_HELPERS . '/wp_query.php';
		include_once THEME_HELPERS . '/send-email.php';
		include_once THEME_HELPERS . '/captcha.php';
		include_once THEME_HELPERS . '/woocommerce.php';
	}

	/**
	 * Include all menu walkers libraries.
	 */
	public function menu_walkers() {
		include_once locate_template( 'framework/custom-nav-walker/fallback-navigation.php' );
		include_once locate_template( 'framework/custom-nav-walker/main-navigation.php' );
		include_once locate_template( 'framework/custom-nav-walker/hb-navigation.php' );
		include_once locate_template( 'framework/custom-nav-walker/menu-with-icon.php' );
		include_once locate_template( 'framework/custom-nav-walker/responsive-navigation.php' );
	}

	public function add_metaboxes() {
		include_once THEME_GENERATORS . '/metabox-generator.php';
	}

	public function theme_activated() {
		if ( 'themes.php' == basename( $_SERVER['PHP_SELF'] ) && isset( $_GET['activated'] ) && $_GET['activated'] == 'true' ) {
			flush_rewrite_rules();
			update_option( THEME_OPTIONS_BUILD, uniqid() );
			wp_redirect( admin_url( 'admin.php?page=' . THEME_NAME ) );

		}
	}

	/**
	 * Load all required files for admin area.
	 *
	 * @since  5.9.5 Add class-mk-theme-options-misc.php on the list.
	 */
	public function admin() {
		global $abb_phpunit;
		if ( is_admin() || false == ( empty( $abb_phpunit ) && true == $abb_phpunit ) ) {
			include_once THEME_DIR . '/vendor/autoload.php';
			include_once THEME_CONTROL_PANEL . '/logic/validator-class.php';
			include_once THEME_CONTROL_PANEL . '/logic/system-messages/js-messages-lib.php';
			include_once THEME_CONTROL_PANEL . '/logic/system-messages/logic-messages-lib.php';
			include_once THEME_CONTROL_PANEL . '/logic/compatibility.php';
			include_once THEME_CONTROL_PANEL . '/logic/functions.php';
			include_once THEME_CONTROL_PANEL . '/logic/addon-management.php';
			include_once THEME_CONTROL_PANEL . '/logic/plugin-management.php';
			include_once THEME_CONTROL_PANEL . '/logic/template-management.php';
			include_once THEME_CONTROL_PANEL . '/logic/updates-class.php';
			include_once THEME_CONTROL_PANEL . '/logic/icon-selector.php';
			include_once THEME_ADMIN . '/menus-custom-fields/menu-item-custom-fields.php';
			include_once THEME_ADMIN . '/theme-options/options-check.php';
			include_once THEME_ADMIN . '/general/mega-menu.php';
			include_once THEME_ADMIN . '/general/enqueue-assets.php';
			include_once THEME_ADMIN . '/general/class-mk-live-support.php';
			include_once THEME_ADMIN . '/theme-options/options-save.php';
			include_once THEME_ADMIN . '/theme-options/class-mk-theme-options-misc.php';
			include_once THEME_INCLUDES . '/tgm-plugin-activation/request-plugins.php';

		}
		include_once THEME_CONTROL_PANEL . '/logic/tracking.php';
		include_once THEME_CONTROL_PANEL . '/logic/tracking-control-panel.php';
	}
	public function language() {

		load_theme_textdomain( 'mk_framework', get_stylesheet_directory() . '/languages' );
	}

	public function admin_menus() {

		add_menu_page(
			THEME_NAME, THEME_NAME, 'edit_theme_options', THEME_NAME, array(
			&$this,
			'control_panel',
			), 'dashicons-star-filled', 3
		);

		add_submenu_page(
			THEME_NAME, __( 'Control Panel', 'mk_framework' ), __( 'Control Panel', 'mk_framework' ), 'edit_theme_options', THEME_NAME, array(
			&$this,
			'control_panel',
			)
		);

		if ( NEW_UI_LIBRARY ) {
			add_submenu_page(
				THEME_NAME, __( 'New UI', 'mk_framework' ), __( 'New UI', 'mk_framework' ), 'edit_posts', 'ui-library', array(
				&$this,
				'ui_library',
				)
			);
			add_submenu_page(
				THEME_NAME, __( 'UI Page Options', 'mk_framework' ), __( 'UI Page Options', 'mk_framework' ), 'edit_posts', 'ui-page-options', array(
				&$this,
				'ui_page_options',
				)
			);
		}
	}


	public function ui_page_options() {
		include_once THEME_CONTROL_PANEL . '/logic/ui-page-options.php';
	}
	public function ui_library() {
		include_once THEME_CONTROL_PANEL . '/logic/ui-library.php';
	}


	public function control_panel() {
		include_once THEME_CONTROL_PANEL . '/v2/layout/master.php';
	}


	/**
	 * Stop creating new table and delete the table for sites using older version of
	 * Jupiter. The function will be removed from 5.9.4
	 *
	 * @author    Ugur Mirza ZEYREK & Bob Ulusoy & Reza Ardestani
	 * @copyright Artbees LTD (c)
	 * @link      http://artbees.net
	 * @since     Version 5.0.0
	 * @since     Version 5.9.3
	 */
	public function mk_theme_setup() {
		$wp_get_theme          = wp_get_theme();
		$current_theme_version = $wp_get_theme->get( 'Version' );

		if ( $current_theme_version < '5.9.3' ) {
			global $wpdb;
			global $jupiter_table_name;

						$jupiter_table_name = $wpdb->prefix . 'mk_components';

						$wpdb->query( "DROP TABLE IF EXISTS $jupiter_table_name" );
		}
	}

	/**
	 * Compatibility check for hosting php version.
	 * Returns error if php version is below v5.4
	 *
	 * @author      Bob ULUSOY & Ugur Mirza ZEYREK
	 * @copyright   Artbees LTD (c)
	 * @link        http://artbees.net
	 * @since       Version 5.0.5
	 * @last_update Version 5.0.7
	 */
	public function theme_requirement_check() {
		if ( ! in_array( $GLOBALS['pagenow'], array( 'admin-ajax.php' ) ) ) {
			if ( version_compare( phpversion(), '5.4', '<' ) ) {
				echo '<h2>As stated in <a href="http://demos.artbees.net/jupiter5/jupiter-v5-migration/">Jupiter V5.0 Migration Note</a> your PHP version must be above V5.4. We no longer support php legacy versions (v5.2.X, v5.3.X).</h2>';
				echo 'Read more about <a href="https://wordpress.org/about/requirements/">WordPress environment requirements</a>. <br><br> Please contact with your hosting provider or server administrator for php version update. <br><br> Your current PHP version is <b>' . phpversion() . '</b>';
				wp_die();
			}
		}
	}

	public function theme_options() {
		include_once THEME_ADMIN . '/theme-options/class-theme-options.php';
	}

	public function lang() {
		global $mk_lang;

		$unify_theme_option = get_option( 'mk_unify_theme_options' );
		$mk_lang = '';

		if ( defined( 'ICL_LANGUAGE_CODE' ) && ! $unify_theme_option ) {
			$mk_lang = '_' . ICL_LANGUAGE_CODE;
		}

			/*
			* Use this constant in child theme functions.php to unify theme options across all languages in WPML
			*  add define('WPML_UNIFY_THEME_OPTIONS', true);
			*/
		if ( defined( 'WPML_UNIFY_THEME_OPTIONS' ) ) {
			$mk_lang = '';
		}

		return $mk_lang;
	}

}
