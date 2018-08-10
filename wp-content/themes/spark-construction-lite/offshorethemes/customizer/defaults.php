<?php
/**
 * Default Options.
 *
 * @package sparkconstructionlite
 */

if ( ! function_exists( 'sparkconstructionlite_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function sparkconstructionlite_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = sparkconstructionlite_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}

endif;

if ( ! function_exists( 'sparkconstructionlite_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function sparkconstructionlite_get_default_theme_options() {

		$defaults = array();

		// Homepage Option
		$defaults['sparkconstructionlite_enable_home_page']				= 0;

		// Banner 
		$defaults['sparkconstructionlite_enable_banner']				= 1;
		$defaults['sparkconstructionlite_enable_banner_cap']			= 1;

		// About Section
		$defaults['sparkconstructionlite_enable_abt_sec']				= 1;
		$defaults['sparkconstructionlite_abt_sec_title']				= '';
		$defaults['sparkconstructionlite_abt_sec_subtitle']				= '';
		$defaults['sparkconstructionlite_abt_sec_vidlink']				= '';

		// Offer Section
		$defaults['sparkconstructionlite_enable_off_sec']				= 1;
		$defaults['sparkconstructionlite_off_sec_title']	 			= '';
		$defaults['sparkconstructionlite_off_sec_subtitle'] 			= '';
		$defaults['sparkconstructionlite_off_sec_post_no'] 				= '';
		$defaults['sparkconstructionlite_off_sec_content']				= 12;

		// Counter Section
		$defaults['sparkconstructionlite_enable_cnt_sec']				= 1;
		$defaults['sparkconstructionlite_cnt_sec_background']			= '';

		// Team Section
		$defaults['sparkconstructionlite_enable_team_sec']				= 1;
		$defaults['sparkconstructionlite_team_sec_title']	 			= '';
		$defaults['sparkconstructionlite_team_sec_subtitle'] 			= '';

		// Blog Section
		$defaults['sparkconstructionlite_enable_blog_sec']				= 1;
		$defaults['sparkconstructionlite_blog_sec_title']	 			= '';
		$defaults['sparkconstructionlite_blog_sec_subtitle'] 			= '';
		$defaults['sparkconstructionlite_blog_sec_post_no'] 			= 3;
		$defaults['sparkconstructionlite_blog_sec_all_title'] 			= '';
		$defaults['sparkconstructionlite_blog_sec_all_link'] 			= '';
		$defaults['sparkconstructionlite_blog_sec_readmore_title'] 		= esc_html__( 'Read More', 'spark-construction-lite' );
		$defaults['sparkconstructionlite_blog_sec_content'] 			= 40;

		// Testimonial Section
		$defaults['sparkconstructionlite_enable_testi_sec']				= 1;
		$defaults['sparkconstructionlite_testi_sec_title']	 			= '';
		$defaults['sparkconstructionlite_testi_sec_subtitle'] 			= ''; 

		// CTA Section
		$defaults['sparkconstructionlite_enable_cta_sec']				= 1;
		$defaults['sparkconstructionlite_cta_page']	 					= '';
		$defaults['sparkconstructionlite_cta_sec_btn_title'] 			= '';
		$defaults['sparkconstructionlite_cta_sec_btn_link'] 			= '';

		// Partners Section
		$defaults['sparkconstructionlite_enable_part_sec']				= 1;
		$defaults['sparkconstructionlite_part_sec_title']	 			= '';
		$defaults['sparkconstructionlite_part_sec_subtitle'] 			= '';

		// Header
		$defaults['sparkconstructionlite_enable_top_header']			= 1;
		$defaults['sparkconstructionlite_tel_phone_no']				    = '';
		$defaults['sparkconstructionlite_company_email']				= '';
		$defaults['sparkconstructionlite_working_hour']				    = '';	

		// Archive Page
		$defaults['sparkconstructionlite_archive_sidebar']				= 'right';
		$defaults['sparkconstructionlite_excerpt_length']				= 30;

		// Meta Options
		$defaults['sparkconstructionlite_date_meta']					= 1;
		$defaults['sparkconstructionlite_author_meta']					= 1;
		$defaults['sparkconstructionlite_category_meta']				= 1;


		// Footer Bottom
		$defaults['sparkconstructionlite_copyright_text']				= '';

		return $defaults;
	}

endif;



