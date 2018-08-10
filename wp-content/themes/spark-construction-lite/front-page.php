<?php
/**
 * The Front Page Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sparkconstructionlite
 */

 get_header();

 do_action( 'sparkconstructionlite_enable_frontpage' ); 

 $enable_front_page = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_home_page' );

 if( $enable_front_page == 1 ) {
 	
 	get_template_part( 'section-parts/section', 'slider' );

	get_template_part( 'section-parts/section', 'about' );

	get_template_part( 'section-parts/section', 'offer' );

	get_template_part( 'section-parts/section', 'counter' );

	get_template_part( 'section-parts/section', 'team' );

	get_template_part( 'section-parts/section', 'blog' );

	get_template_part( 'section-parts/section', 'testimonial' );

	get_template_part( 'section-parts/section', 'cta' );

	get_template_part( 'section-parts/section', 'partner' );
 }

 get_footer();