<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sparkconstructionlite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sparkconstructionlite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$page_layout = get_theme_mod( 'sparkconstructionlite_web_layout_choices', 'full_width' );

	if( $page_layout == 'full_width' ) {
		$classes[] = 'full_width';
	} 

	if( $page_layout == 'boxed_layout' ) {
		$classes[] = 'boxed_layout';
	}

	return $classes;
}
add_filter( 'body_class', 'sparkconstructionlite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sparkconstructionlite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'sparkconstructionlite_pingback_header' );
