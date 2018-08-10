<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sparkconstructionlite
 */

if( !function_exists( 'sparkconstructionlite_get_categories' ) ) :
	/**
	 * Function To Get Categories
	 */
	function sparkconstructionlite_get_categories() {

		if( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'spark-construction-lite' ) );			
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'spark-construction-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
		
	}
endif;

if( !function_exists( 'sparkconstructionlite_get_author' ) ) :
	/**
	 * Function To Get Author
	 */
	function sparkconstructionlite_get_author() {

		printf( '<span class="post-author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" >' . esc_html( get_the_author() ) . '</a></span>' );
	}
endif;


if( !function_exists( 'sparkconstructionlite_get_post_date' ) ) :
	/**
	 * Function To Get Post Date
	 */
	function sparkconstructionlite_get_post_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	}
endif;
