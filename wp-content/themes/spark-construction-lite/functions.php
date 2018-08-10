<?php
/**
 * Spark Construction Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sparkconstructionlite
 */

if ( ! function_exists( 'sparkconstructionlite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sparkconstructionlite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Spark Construction Lite, use a find and replace
		 * to change 'spark-construction-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'spark-construction-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'sparkconstructionlite-thumbnail-1', 640, 426, true ); // Services, Projects, Blog, Search
		add_image_size( 'sparkconstructionlite-thumbnail-2', 300, 400, true ); // Team - Layout One
		add_image_size( 'sparkconstructionlite-thumbnail-3', 267, 295, true ); // Testimonials
		add_image_size( 'sparkconstructionlite-thumbnail-4', 183, 132, true ); // Partner
		add_image_size( 'sparkconstructionlite-thumbnail-5', 100, 100, true ); // Team - Layout Two
		add_image_size( 'sparkconstructionlite-thumbnail-6', 1200, 650, true ); // Team - Layout Two


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'spark-construction-lite' ),
			'menu-2' => esc_html__( 'Social', 'spark-construction-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'sparkconstructionlite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sparkconstructionlite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sparkconstructionlite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sparkconstructionlite_content_width', 640 );
}
add_action( 'after_setup_theme', 'sparkconstructionlite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sparkconstructionlite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'spark-construction-lite' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'spark-construction-lite' ),
		'before_widget' => '<div id="%1$s" class="widget widget_wrapper %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget_title"><h3>',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'spark-construction-lite' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'spark-construction-lite' ),
		'before_widget' => '<div class="col-md-4"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'sparkconstructionlite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sparkconstructionlite_scripts() {

	wp_enqueue_style( 'sparkconstructionlite-font', sparkconstructionlite_fonts_url() );

	wp_enqueue_style( 'sparkconstructionlite-skin', get_template_directory_uri() . '/offshorethemes/assets/dist/css/skin.min.css' );

	wp_enqueue_style( 'sparkconstructionlite-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/offshorethemes/assets/dist/css/font-awesome.min.css');

	wp_enqueue_script( 'sparkconstructionlite-navigation', get_template_directory_uri() . '/offshorethemes/assets/dist/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sparkconstructionlite-skip-link-focus-fix', get_template_directory_uri() . '/offshorethemes/assets/dist/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('sparkconstructionlite--bundle', get_template_directory_uri() . '/offshorethemes/assets/dist/js/bundle.min.js', array('jquery'), '20151215', true);

	wp_enqueue_script('sparkconstructionlite--script', get_template_directory_uri() . '/offshorethemes/assets/dist/js/script.js', array('jquery'), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sparkconstructionlite_scripts' );


/**
 * Require init.
*/
require  trailingslashit( get_template_directory() ).'offshorethemes/init.php';