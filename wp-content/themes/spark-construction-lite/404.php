<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sparkconstructionlite
 */

get_header();
?>
	<div class="spc_general_single_page_main_wrapper">
        <div class="single_inner">
            <div class="spc_container">
                <?php
                	do_action( 'sparkconstructionlite_breadcrumb' );
                ?>
                <div class="left_and_right_section_holder">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="single_content_area_outer">
                                <div class="error_page_message_holder">
                                    <div class="error_header">
                                        <h2>
                                        	<?php
                                        		esc_html_e( '404', 'spark-construction-lite' );
                                        	?>
                                        </h2>
                                    </div><!-- .error_header -->
                                    <div class="error_desc">
                                        <h4>
                                        	<?php
                                        		esc_html_e( 'OOOPS! page not found', 'spark-construction-lite' ); 
                                        	?>
                                        </h4>
                                        <p>
                                        	<?php 
                                        		esc_html_e( 'The page you requested either has moved or doesn\'t exists in this server!', 'spark-construction-lite' ); 
                                        	?>
                                        </p>
                                    </div><!-- .error_desc -->
                                    <div class="go_home">
                                        <a class="general_btn_layout_one" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        	<?php
                                        		esc_html_e( 'Go Homepage', 'spark-construction-lite' );
                                        	?>
                                        </a><!-- .general_btn_layout_one -->
                                    </div><!-- .go_home -->
                                </div><!-- .error_page_message_holder -->
                            </div><!-- .single_content_area_outer -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .left_and_right_section_holder -->
            </div><!-- .spc_container -->
        </div><!-- .single_inner -->
    </div><!-- .spc_general_single_page_main_wrapper -->

<?php
get_footer();
