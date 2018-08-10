<?php
/**
 * Sparkle Construction Theme Customizer
 *
 * @package Sparkle_Construction_Lite
 */

if( !function_exists( 'sparkconstructionlite_get_pages' ) ) :
	/*
	 * Function to get pages
	 */
	function sparkconstructionlite_get_pages() {

		$pages  =  get_pages();
		$page_list = array();
		$page_list[0] = esc_html__( 'Select Page', 'spark-construction-lite' );

		foreach( $pages as $page ){
			$page_list[ $page->ID ] = $page->post_title;
		}

		return $page_list;

	}
endif;