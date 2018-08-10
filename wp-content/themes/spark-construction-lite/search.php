<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sparkconstructionlite
 */
    get_header();
    
    $sidebar_position = sparkconstructionlite_get_option( 'sparkconstructionlite_archive_sidebar' );
?>

	<div class="spc_general_single_page_main_wrapper spc_search_page_layout_main_wrapper">
        <div class="single_inner">
            <div class="spc_container">
                <?php
                	do_action( 'sparkconstructionlite_breadcrumb' );
                ?>
                <div class="left_and_right_section_holder">
                    <div class="row">
                        <?php
                            $class = null;

                            if( $sidebar_position == 'left' || $sidebar_position == 'right' ) {
                                $class = 'col-md-8 col-sm-12 col-xs-12';
                            } else {
                                $class = 'col-md-12 col-sm-12 col-xs-12';
                            }

                            if( $sidebar_position == 'left' && is_active_sidebar( 'sidebar' ) ) {
                                get_sidebar();
                            }
                        ?>
                        <div class="<?php echo esc_attr( $class ); ?>">
                            <div class="single_content_area_outer">
                                <div class="single_title">
                                    <h2>
                                    	<?php
											/* translators: %s: search query. */
											printf( esc_html__( 'Search Results for: %s', 'spark-construction-lite' ), '<span>' . get_search_query() . '</span>' );
										?>
                                    </h2>
                                </div><!-- .single_title -->
                                <div class="section_content">
                                	<?php
                                		if( have_posts() ) :
                                			/* Start the Loop */
											while ( have_posts() ) : the_post();

												/**
												 * Run the loop for the search to output the results.
												 * If you want to overload this in a child theme then include a file
												 * called content-search.php and that will be used instead.
												 */
												get_template_part( 'template-parts/content', 'search' );

											endwhile;

											do_action( 'sparkconstructionlite_pagination' );

										else :

											get_template_part( 'template-parts/content', 'none' );

										endif;
                                	?>
                                </div><!-- .section_content -->
                            </div><!-- .single_content_area_outer -->
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
    </div><!-- .spc_general_single_page_main_wrapper.spc_search_page_layout_main_wrapper -->
<?php
get_footer();
