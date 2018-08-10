<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sparkconstructionlite
 */

	get_header(); 

    $post_id = get_the_ID();

    $sidebar_position = get_post_meta( absint( $post_id ), 'sparkconstructionlite_sidebar', true );

    if( empty( $sidebar_position ) ) {
        $sidebar_position = 'right';
    }

?>
    <div class="spc_general_single_page_main_wrapper spc_blog_single_page_layout_one_main_wrapper">
        <div class="single_inner">
            <div class="spc_container">
                <?php
                    do_action( 'sparkconstructionlite_breadcrumb' );
                ?>
                <!-- // breadcrumb -->
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
                            <?php
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'single' );

                                    the_post_navigation();

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    
                                    if ( ( comments_open() || get_comments_number() ) ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
                            ?>
                        </div>
                        <?php
                            if( $sidebar_position == 'right' && is_active_sidebar( 'sidebar' ) ) {
                                get_sidebar();
                            }
                        ?>
                    </div>
                </div><!-- .left_and_right_section_holder -->
            </div><!-- .spc_container -->
        </div><!-- .single_inner -->
    </div><!-- spc_general_single_page_main_wrapper.spc_blog_single_page_layout_one_main_wrapper -->

<?php
get_footer();