<?php
/**
 * Load hooks.
 *
 * @package sparkconstructionlite
 */

/*======================================================
			Doctype hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_doctype_action' ) ) :
	/**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
	function sparkconstructionlite_doctype_action() {
	?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
	<?php		
	}
endif;
add_action( 'sparkconstructionlite_doctype', 'sparkconstructionlite_doctype_action', 10 );


/*======================================================
			Head hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_head_action' ) ) :
    /**
     * Head declaration of the theme.
     *
     * @since 1.0.0
     */
 	function sparkconstructionlite_head_action() {
 	?>
 	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
 	<?php	
 	}
endif;
add_action( 'sparkconstructionlite_head', 'sparkconstructionlite_head_action', 10 );

/*======================================================
			Body Before hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_body_before_action' ) ) :
    /**
     * Body Before declaration of the theme.
     *
     * @since 1.0.0
     */
 	function sparkconstructionlite_body_before_action() {
 	?>
 		<body <?php body_class(); ?> >
            
 	<?php	

 	}
endif;
add_action( 'sparkconstructionlite_body_before', 'sparkconstructionlite_body_before_action', 10 );

/*======================================================
            Header hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_header_layout_action' ) ) :
    /**
     * Header Layout declaration of the theme.
     *
     * @since 1.0.0
     */
    function sparkconstructionlite_header_layout_action() {
        get_template_part( 'template-parts/header-section/header', 'one' );
    }
endif;
add_action( 'sparkconstructionlite_header_layout', 'sparkconstructionlite_header_layout_action', 10 );


/*======================================================
            Header hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_enable_frontpage_action' ) ) :
    /**
     * Enable Front Page Action
     *
     * @since 1.0.0
     */
    function sparkconstructionlite_enable_frontpage_action() {

        $enable_front_page = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_home_page' );

        if( 1 != $enable_front_page ){

            if ( 'posts' == get_option( 'show_on_front' ) ) {
                    include( get_home_template() );
            }
               else {
                    include( get_page_template() );
            }
        }
    }
endif;
add_action( 'sparkconstructionlite_enable_frontpage', 'sparkconstructionlite_enable_frontpage_action', 10 );


/*======================================================
            Breadcrumb Hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_breadcrumb_action' ) ) :
    /**
     * Breadcrumb declaration of the theme.
     *
     * @since 1.0.0
     */
    function sparkconstructionlite_breadcrumb_action() {
    ?>
        <div class="breadcrumb">
            <?php
                $breadcrumb_args = array(
                    'show_browse' => false,
                );
                sparkconstructionlite_Breadcrumb_Trail( $breadcrumb_args );
            ?>
        </div><!-- .breadcrumb -->
    <?php
    }
endif;
add_action( 'sparkconstructionlite_breadcrumb', 'sparkconstructionlite_breadcrumb_action', 10 );


/*======================================================
            Pagination Hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_pagination_action' ) ) :
    /**
     * Pagination declaration of the theme.
     *
     * @since 1.0.0
     */
    function sparkconstructionlite_pagination_action() {
    ?>
        <div class="row clearfix">
            <div class="col-sm-12">
                <?php
                    the_posts_pagination( 
                        array(
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( '&laquo;', 'spark-construction-lite' ),
                            'next_text' => esc_html__( '&raquo;', 'spark-construction-lite' ),
                        ) 
                    );
                ?>
            </div>
        </div><!-- .row.clearfix -->
    <?php
    }
endif;
add_action( 'sparkconstructionlite_pagination', 'sparkconstructionlite_pagination_action', 10 );




/*======================================================
            Copyright Hook of the theme
======================================================*/
if( ! function_exists( 'sparkconstructionlite_copyright_action' ) ) :
    /**
     * Copyright declaration of the theme.
     *
     * @since 1.0.0
     */
    function sparkconstructionlite_copyright_action() {

        $copyright_text = sparkconstructionlite_get_option( 'sparkconstructionlite_copyright_text' );
    
        if( !empty( $copyright_text ) ) { 

            echo esc_html( apply_filters( 'sparkconstructionlite_copyright_text', $copyright_text . ' ' ) ); 

        } else { 

            echo esc_html( apply_filters( 'sparkconstructionlite_copyright_text', $content = esc_html__('Copyright  &copy; ','spark-construction-lite') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
        
        }

        printf( 'WordPress Theme : By %1$s', '<a href=" ' . esc_url('https://offshorethemes.com/') . ' " rel="designer" target="_blank">'.esc_html__('Offshorethemes', 'spark-construction-lite').'</a>' );

    }
endif;
add_action( 'sparkconstructionlite_copyright', 'sparkconstructionlite_copyright_action', 5 );