<?php  
/**
 *Massage Spa functions and definitions
 *
 * @package Massage Spa 
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'massage_spa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function massage_spa_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 680; /* pixels */
    }	

	load_theme_textdomain( 'massage-spa', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'massage-spa' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // massage_spa_setup
add_action( 'after_setup_theme', 'massage_spa_setup' );
function massage_spa_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'massage-spa' ),
		'description'   => __( 'Appears on blog page sidebar', 'massage-spa' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'massage-spa' ),
		'description'   => __( 'Appears on the site header', 'massage-spa' ),
		'id'            => 'header-widget',
		'before_widget' => '<aside id="%1$s" class="headerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'massage_spa_widgets_init' );


function massage_spa_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Montserrat, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','Roboto:on or off','massage-spa');			
		
		if('off' !== $roboto ){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function massage_spa_scripts() {
	wp_enqueue_style('massage-spa-font', massage_spa_font_url(), array());
	wp_enqueue_style( 'massage-spa-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );	
	wp_enqueue_style( 'massage-spa-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'massage-spa-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'massage_spa_scripts' );

function massage_spa_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('massage-spa-ie', get_template_directory_uri().'/css/ie.css', array( 'massage-spa-style' ), '20160928' );
	wp_style_add_data('massage-spa-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'massage-spa-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'massage-spa-style' ), '20160928' );
	wp_style_add_data( 'massage-spa-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'massage-spa-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'massage-spa-style' ), '20160928' );
	wp_style_add_data( 'massage-spa-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','massage_spa_ie_stylesheet');

define('MASSAGE_SPA_THEME_DOC','https://gracethemes.com/documentation/massage-spa/','massage-spa');
define('MASSAGE_SPA_PROTHEME_URL','https://gracethemes.com/themes/beauty-salon-wordpress-theme/','massage-spa');
define('MASSAGE_SPA_LIVE_DEMO','https://www.gracethemes.com/demo/massage-spa/','massage-spa');

if ( ! function_exists( 'massage_spa_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function massage_spa_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';