<?php
/**
 * Filter Functions.
 *
 * @package sparkconstructionlite
 */

if( !function_exists( 'sparkconstructionlite_search_form' ) ) :
	/**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
	function sparkconstructionlite_search_form() {
		$form = '<form role="search" method="get" id="search-form" class="search-form" action="' . esc_url( home_url( '/' ) ) . '" >
					<div class="input-group stylish-input-group">
						<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="' . esc_attr__( 'Search', 'spark-construction-lite' ) . '" />
						<span class="input-group-addon">
							<button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'spark-construction-lite' ).'">
			    				<i class="fa fa-search"></i>
			    			</button>
                        </span>
                    </div>
			    </form>';

		return $form;
	}
endif;
add_filter( 'get_search_form', 'sparkconstructionlite_search_form', 20 );

/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'sparkconstructionlite_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function sparkconstructionlite_excerpt_more( $more ) {

		if( is_admin( $more ) ) {
			return $more;
		}

		return '';
	}
endif;
add_filter( 'excerpt_more', 'sparkconstructionlite_excerpt_more' );


if( !function_exists( 'sparkconstructionlite_excerpt_length' ) ) :
	/*
	 * Excerpt More
	 */
	function sparkconstructionlite_excerpt_length( $length ) {

		if( is_admin() ) {
			return $length;
		}

		$excerpt_length = sparkconstructionlite_get_option( 'sparkconstructionlite_excerpt_length' );

		if( absint( $excerpt_length ) > 0 ) :
			$length = absint( $excerpt_length );
		endif;

		return apply_filters( 'sparkconstructionlite_filter_excerpt_length', $length );
	}
endif;
add_filter( 'excerpt_length', 'sparkconstructionlite_excerpt_length' );
