<?php
/**
 * Template Name: Home Page
 */
		 get_header(); 
		
		//=========== Get Home Slider ===========//
		get_template_part('sections/home','slider');
		
		//=========== Get Call to action ===========//
		get_template_part('sections/home','calltoaction');

		//=========== Get Index service ===========//		
		get_template_part('sections/home', 'services');	
		
		//=========== Get Index News ===========//
		get_template_part('sections/home', 'callout');

		//=========== Get Index News ===========//
		get_template_part('sections/home', 'blog');		
					

get_footer(); 
?>