<?php
/**
 * The main template file
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
?>

	<div class="spc_general_single_page_main_wrapper spc_search_page_layout_main_wrapper">
        <div class="single_inner">
            <div class="spc_container">
                <div class="left_and_right_section_holder">
                    <div class="row">
                    	<?php
                    		$class = null;
                    		$break = null;
                    		$sidebar_position = sparkconstructionlite_get_option( 'sparkconstructionlite_archive_sidebar' );
                            
                    		if( $sidebar_position == 'left' || $sidebar_position == 'right' ) {
                    			$class = 'col-md-8 col-sm-12 col-xs-12';
                    			$break = 2;
                    		} else {
                    			$class = 'col-md-12 col-sm-12 col-xs-12';
                    			$break = 3;
                    		}

                            if( $sidebar_position == 'left' && is_active_sidebar( 'sidebar' ) ) {
                                get_sidebar();
                            }

                    	?>
                        <div class="<?php echo esc_attr( $class ); ?>">
                        	<?php
                        		if( have_posts() ) :
                        	?>
		                            <div class="single_content_area_outer">
		                                <div class="section_content">
		                                    <div class="row">
		                                    	<?php
		                                    		/* Start the Loop */
													while ( have_posts() ) : the_post();

														/*
														 * Include the Post-Format-specific template for the content.
														 * If you want to override this in a child theme, then include a file
														 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
														 */
														get_template_part( 'template-parts/content', 'index' );

													endwhile;

													do_action( 'sparkconstructionlite_pagination' );
		                                    	?>
		                                        <div class="clearfix hidden-sm"></div>
		                                        <!-- // col -->
		                                    </div>
		                                    <!-- // row -->
		                                </div>
		                                <!-- // section_content -->
		                            </div><!-- .single_content_area_outer -->
                            <?php
                            	else :

                            		get_template_part( 'template-parts/content', 'none' );

                            	endif;
                            ?>
                        </div>
                        <?php
                        	if( $sidebar_position == 'right' && is_active_sidebar( 'sidebar' ) ) {
                        		get_sidebar();
                        	}
                        ?>
                    </div><!-- .row -->
                </div><!-- .left_and_right_section_holder -->
            </div><!-- .spc_container -->
        </div><!-- .single_inner -->
    </div><!-- spc_general_single_page_main_wrapper.spc_archive_layout_one_main_wrapper -->

<?php
get_footer();
