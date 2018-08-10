<?php
/**
 * The template for displaying testimonial section
 *
 * @package sparkconstructionlite
 */

$enable_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_testi_sec' );
$section_title = sparkconstructionlite_get_option( 'sparkconstructionlite_testi_sec_title' );
$section_sub_title = sparkconstructionlite_get_option( 'sparkconstructionlite_testi_sec_subtitle' );

$testimonial_contents = sparkconstructionlite_get_option( 'sparkconstructionlite_testi_page_selection' );

if( $enable_section == 1 && !empty( $testimonial_contents ) ) {
	?>
	<section class="spc_general_section spc_testinomial section_bg">
        <div class="section_inner">
            <div class="spc_container">
                <?php
                    if( !empty( $section_title ) ) :
                	?>
                        <div class="section_title">
                            <h2>
                                <?php
                                    echo wp_kses_post( $section_title );
                                ?>
                            </h2>
                        </div><!-- .section_title -->
                	<?php
                    endif;

                    if( !empty( $section_sub_title ) ) :
                	?>
                        <div class="section_desc">
                            <p>
                                <?php
                                    echo wp_kses_post( $section_sub_title );
                                ?>
                            </p>
                        </div><!-- .section_desc -->
                	<?php
                    endif;
                ?>
                <div class="section_content">
                    <div class="row">
                        <div class="owl-carousel owl-theme testinomial_carousel">
                        	<?php
                        		foreach( $testimonial_contents as $content ) {
                                    
                                    $testimonial_args = array(
                                        'post_type' => 'page',
                                        'posts_per_page' => 1,
                                    );

                                    if( absint( $content['sparkconstructionlite_testi_page'] ) > 0 ) {
                            			$testimonial_args['page_id'] = absint( $content['sparkconstructionlite_testi_page'] );
                                    }

                        			$testimonial_query = new WP_Query( $testimonial_args );

                        			while( $testimonial_query->have_posts() ) :
                        				$testimonial_query->the_post();
                        				?>
                        				<div class="item testinomial_item">
			                                <div class="testinomial_content_outer">
			                                    <div class="testi_content_inner">
			                                        <div class="testi_desc">
			                                            <?php
			                                            	the_excerpt();
			                                            ?>
			                                        </div><!-- .testi_desc -->
			                                    </div><!-- .testi_content_inner -->
			                                    <div class="author_meta_holder clearfix">
			                                        <div class="testi_author_desc">
			                                        	<?php
			                                        		if( has_post_thumbnail() ) :
			                                        	?>
					                                            <div class="author_fimage">
					                                                <?php
					                                                	the_post_thumbnail( 'sparkconstructionlite-thumbnail-3', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' ) );
					                                                ?>
					                                            </div><!-- .author_fimage -->
			                                            <?php
			                                            	endif;
			                                            ?>
			                                            <div class="author_misc">
			                                                <span class="author_name">
			                                                	<?php
			                                                		the_title();
			                                                	?>
			                                                </span><!-- .author_name -->
			                                            </div><!-- .author_misc -->
			                                        </div><!-- .testi_author_desc -->
			                                    </div><!-- .author_meta_holder.clearfix -->
			                                    <div class="clearfix"></div><!-- .clearfix -->
			                                </div><!-- .testinomial_content_outer -->
			                            </div><!-- .item.testimonial_item -->
                        				<?php
                        			endwhile;
                        			wp_reset_postdata();
                        		}
                        	?>
                        </div><!-- .owl-carousel.testinomial_carousel -->
                    </div><!-- .row -->
                </div><!-- .section_content -->
            </div><!-- .spc_container -->
        </div><!-- .section_inner -->
    </section><!-- .spc_general_section.spc_testinomial section_bg -->
	<?php
}