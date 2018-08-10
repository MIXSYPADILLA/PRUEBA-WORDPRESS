<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sparkconstructionlite
 */
	
	/**
	 * Hook - sparkconstructionlite_doctype.
	 *
	 * @hooked sparkconstructionlite_doctype_action - 10
	 */
	do_action( 'sparkconstructionlite_doctype' );
	  
	/**
	 * Hook - sparkconstructionlite_head.
	 *
	 * @hooked sparkconstructionlite_head_action - 10
	 */
	do_action( 'sparkconstructionlite_head' );

	/**
	 * Hook - sparkconstructionlite_body_before.
	 *
	 * @hooked sparkconstructionlite_body_before_action - 10
	 */
	do_action( 'sparkconstructionlite_body_before' );

	/**
	 * Hook - sparkconstructionlite_header_layout.
	 *
	 * @hooked sparkconstructionlite_header_layout_action - 10
	*/
	 do_action( 'sparkconstructionlite_header_layout' );
?>

