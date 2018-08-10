<?php
/**
 * transportex functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package transportex
 */

	$transportex_theme_path = get_template_directory() . '/inc/icy/';

	/*Widget */
	require( $transportex_theme_path . '/widget/transportex-slider.php');
	require( $transportex_theme_path . '/widget/transportex-service.php');
	require( $transportex_theme_path . '/widget/transportex-recent-news.php');
	require( $transportex_theme_path . '/widget/transportex-callout.php');
	require( $transportex_theme_path . '/widget/transportex-calltoaction.php');
	
	/* Customzier */
	require( $transportex_theme_path . '/transportex-custom-navwalker.php' );
	require( $transportex_theme_path . '/font/font.php');
	require( $transportex_theme_path . '/customize/transportex_customize_header.php');
	require( $transportex_theme_path . '/customize/transportex_customize_copyright.php');
	require( $transportex_theme_path . '/customize/ta_customize_homepage.php');
	require( $transportex_theme_path . '/customize/customize_control/class-transportex-customize-alpha-color-control.php');
	
	require( $transportex_theme_path . '/breadcrumb.php');
	
	/*
	 * Load customize pro
	*/
	require_once( trailingslashit( get_template_directory() ) . 'inc/icy/customize-pro/class-customize.php' );

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $transportex_theme_path .'/enqueue.php');
	
	
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function transportex_setup() {
	
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on transportex, use a find and replace
	 * to change 'transportex' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'transportex', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	//Custom logo
	add_theme_support( 'custom-logo');
	

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'transportex' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'transportex_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

}
add_action( 'after_setup_theme', 'transportex_setup' );


function transportex_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

	}

	add_filter('get_custom_logo','transportex_logo_class');


function transportex_logo_class($html){
	
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}
	
/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/icy/themeinfo/themeinfo-detail.php';
}	

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function transportex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'transportex_content_width', 640 );
}
add_action( 'after_setup_theme', 'transportex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function transportex_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'transportex' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="transportex-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'transportex' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 transportex-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Slider Section Widgets Area', 'transportex' ),
		'id'            => 'sidebar-slider',
		'description'   => '',
		'before_widget' => '<div class="item">',
		'after_widget'  => '</div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Service Section Widget Area', 'transportex' ),
		'id'            => 'servicehome_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ta-widget %2$s">',
		'after_widget'  => '</div>'
	) );
}
add_action( 'widgets_init', 'transportex_widgets_init' );

function transportex_register_widgets() {    

    register_widget('transportex_slider_widget');
    register_widget('transportex_service_widget');
    register_widget('transportex_callout_widget');
	register_widget('transportex_callaction_widget');
}
add_action('widgets_init', 'transportex_register_widgets');

//Read more Button on slider & Post
function transportex_read_more() {
	
	global $post;
	
	$readbtnurl = '<div class="content-more"><a class="btn btn-tislider-two" href="' . esc_url(get_permalink()) . '">'.__('Read More','transportex').'</a></div>';
	
    return $readbtnurl;
}
add_filter( 'the_content_more_link', 'transportex_read_more' );

add_action( 'init', 'transportex_add_excerpts_to_pages' );
function transportex_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}