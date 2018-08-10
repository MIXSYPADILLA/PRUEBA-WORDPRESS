<?php


add_action('wp_enqueue_scripts', 'mk_enqueue_api_modules', 10);
add_action('wp_enqueue_scripts', 'mk_enqueue_scripts', 10);
add_action('wp_enqueue_scripts', 'mk_enqueue_styles', 10);

if (!function_exists('mk_enqueue_scripts')) {
	function mk_enqueue_scripts() {

		global $mk_options;
		$theme_data = wp_get_theme();
		$is_admin = !(!is_admin() && !( in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') )));

	    if($is_admin) return;

		$is_js_min = ( !(defined('MK_DEV') ? constant("MK_DEV") : true) || $mk_options['minify-js'] == 'true' );
		$is_smoothscroll = ( $mk_options['smoothscroll'] == 'true' );

        // Register / Enqueue Plugins
        wp_register_script('jquery-raphael', THEME_JS . '/plugins/wp-enqueue'. ($is_js_min ? '/min' : '') .'/jquery.raphael.js', array('jquery') , $theme_data['Version'], false);
        wp_register_script('instafeed', THEME_JS . '/plugins/wp-enqueue'. ($is_js_min ? '/min' : '') .'/instafeed.js', array('jquery') , false, true);

		wp_enqueue_script(
			'mk-webfontloader',
			THEME_JS . '/plugins/wp-enqueue'. ( $is_js_min ? '/min' : '' ) .'/webfontloader.js',
			array(),
			false,
			false
		);

		wp_enqueue_script(
			'mk-webfontloader-init',
			THEME_JS . '/plugins/wp-enqueue'. ( $is_js_min ? '/min' : '' ) .'/webfontloader-init.js',
			array( 'mk-webfontloader' ),
			false,
			false
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script('comment-reply');
		}

		// Theme scripts
        if ( $is_js_min ) {
			wp_enqueue_script(
				'theme-scripts',
				THEME_JS . '/min/full-scripts.js',
				array('jquery') ,
				$theme_data['Version'],
				true
			);

			do_action( 'mk_enqueue_scripts_minified' );

			return;
		}

		wp_enqueue_script(
			'core-scripts',
			THEME_JS . '/core-scripts.js',
			array('jquery'),
			$theme_data['Version'],
			true
		);

		wp_enqueue_script(
			'components-full',
			THEME_JS  . '/components-full.js',
			array('jquery'),
			$theme_data['Version'],
			true
		);

		if ( $is_smoothscroll ) {
			wp_enqueue_script(
				'smoothscroll',
				THEME_JS . '/plugins/wp-enqueue' . '/smoothscroll.js',
				array(),
				$theme_data['Version'],
				true
			);
		}

		do_action( 'mk_enqueue_scripts' );
	}
}



if (!function_exists('mk_enqueue_styles')) {
	function mk_enqueue_styles() {

		global $mk_options;
		$theme_data = wp_get_theme();
		$is_admin = !(!is_admin() && !( in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') )));

	    if($is_admin) return;

		$is_css_min = ( !(defined('MK_DEV') ? constant("MK_DEV") : true) || $mk_options['minify-css'] == 'true' );

        remove_action('bbp_enqueue_scripts', 'enqueue_styles');

        // Register Plugins
        // wp_enqueue_style('js-media-query', THEME_STYLES . ($is_css_min ? '/min' : '') .'/media.css', false, $theme_data['Version'], 'all');

		if ( $is_css_min ) {
			wp_enqueue_style(
				'theme-styles',
				THEME_STYLES .'/min/full-styles.css',
				false,
				$theme_data['Version'],
				'all'
			);

			do_action( 'mk_enqueue_styles_minified' );

			return;
		}

		wp_enqueue_style(
			'core-styles',
			THEME_STYLES  . '/core-styles.css',
			false,
			$theme_data['Version'],
			'all'
		);

		wp_enqueue_style(
			'components-full',
			THEME_STYLES . '/components-full.css',
			false,
			$theme_data['Version'],
			'all'
		);

		do_action( 'mk_enqueue_styles' );
	}
}

/**
 * Register our module scripts early and later lazy load them when module is ininitialized
 * by including in its file wp_enqueue_script('module-name');
 */
if (!function_exists('mk_enqueue_api_modules')) {
	function mk_enqueue_api_modules() {
		wp_register_script( 'api-vimeo', 'http' . ((is_ssl())? 's' : '') . '://f.vimeocdn.com/js/froogaloop2.min.js', array(), false, false);
		wp_register_script( 'api-youtube', 'http' . ((is_ssl())? 's' : '') . '://www.youtube.com/player_api', array(), false, false);
	}
}



// TOdo replacement for this function



/**
 * Adding font icons in HTML document to prevent issues when using CDN
 * @deprecated
 */
if (!function_exists('mk_enqueue_font_icons')) {
	function mk_enqueue_font_icons() {

	    $styles_dir = THEME_DIR_URI . '/assets/stylesheet';
	    $output = "
			@font-face {
				font-family: 'Pe-icon-line';
				src:url('{$styles_dir}/icons/pe-line-icons/Pe-icon-line.eot?lqevop');
				src:url('{$styles_dir}/icons/pe-line-icons/Pe-icon-line.eot?#iefixlqevop') format('embedded-opentype'),
					url('{$styles_dir}/icons/pe-line-icons/Pe-icon-line.woff?lqevop') format('woff'),
					url('{$styles_dir}/icons/pe-line-icons/Pe-icon-line.ttf?lqevop') format('truetype'),
					url('{$styles_dir}/icons/pe-line-icons/Pe-icon-line.svg?lqevop#Pe-icon-line') format('svg');
				font-weight: normal;
				font-style: normal;
			}
			@font-face {
			  font-family: 'FontAwesome';
			  src:url('{$styles_dir}/icons/awesome-icons/fontawesome-webfont.eot?v=4.2');
			  src:url('{$styles_dir}/icons/awesome-icons/fontawesome-webfont.eot?#iefix&v=4.2') format('embedded-opentype'),
			  url('{$styles_dir}/icons/awesome-icons/fontawesome-webfont.woff?v=4.2') format('woff'),
			  url('{$styles_dir}/icons/awesome-icons/fontawesome-webfont.ttf?v=4.2') format('truetype');
			  font-weight: normal;
			  font-style: normal;
			}
			@font-face {
				font-family: 'Icomoon';
				src: url('{$styles_dir}/icons/icomoon/fonts-icomoon.eot');
				src: url('{$styles_dir}/icons/icomoon/fonts-icomoon.eot?#iefix') format('embedded-opentype'),
				url('{$styles_dir}/icons/icomoon/fonts-icomoon.woff') format('woff'),
				url('{$styles_dir}/icons/icomoon/fonts-icomoon.ttf') format('truetype'),
				url('{$styles_dir}/icons/icomoon/fonts-icomoon.svg#Icomoon') format('svg');
				font-weight: normal;
				font-style: normal;
			}
			@font-face {
			  font-family: 'themeIcons';
			  src: url('{$styles_dir}/icons/theme-icons/theme-icons.eot?wsvj4f');
			  src: url('{$styles_dir}/icons/theme-icons/theme-icons.eot?#iefixwsvj4f') format('embedded-opentype'),
			  url('{$styles_dir}/icons/theme-icons/theme-icons.woff?wsvj4f') format('woff'),
			  url('{$styles_dir}/icons/theme-icons/theme-icons.ttf?wsvj4f') format('truetype'),
			  url('{$styles_dir}/icons/theme-icons/theme-icons.svg?wsvj4f#icomoon') format('svg');
			  font-weight: normal;
			  font-style: normal;
			}";


        return $output;
	}
}



if (!function_exists('mk_enqueue_woocommerce_font_icons')) {
    function mk_enqueue_woocommerce_font_icons() {

        $styles_dir = THEME_DIR_URI . '/assets/stylesheet';
        $output = "
            @font-face {
                font-family: 'star';
                src: url('{$styles_dir}/fonts/star/font.eot');
                src: url('{$styles_dir}/fonts/star/font.eot?#iefix') format('embedded-opentype'),
                url('{$styles_dir}/fonts/star/font.woff') format('woff'),
                url('{$styles_dir}/fonts/star/font.ttf') format('truetype'),
                url('{$styles_dir}/fonts/star/font.svg#star') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            @font-face {
                font-family: 'WooCommerce';
                src: url('{$styles_dir}/fonts/woocommerce/font.eot');
                src: url('{$styles_dir}/fonts/woocommerce/font.eot?#iefix') format('embedded-opentype'),
                url('{$styles_dir}/fonts/woocommerce/font.woff') format('woff'),
                url('{$styles_dir}/fonts/woocommerce/font.ttf') format('truetype'),
                url('{$styles_dir}/fonts/woocommerce/font.svg#WooCommerce') format('svg');
                font-weight: normal;
                font-style: normal;
            }";

        return $output;
    }
}
