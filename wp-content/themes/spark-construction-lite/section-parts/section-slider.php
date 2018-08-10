<?php
/**
 * The template for displaying slider section
 *
 * @package sparkconstructionlite
 */

 $enabler_slider = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_banner' );
 $slider_contents = sparkconstructionlite_get_option( 'sparkconstructionlite_banner_selection' );
 
 if( !empty($slider_contents) && $enabler_slider == 1 ) {
?>
	<div class="spc_banner">
        <div class="spc_banner_inner">
            <div class="owl-carousel home_page_slider">
            	<?php
            		foreach( $slider_contents as $slider_content ) {
            			$slider_args = array(
            				'post_type' => 'page',
            				'posts_per_page' => 1,
            			);

            			if( absint( $slider_content['sparkconstructionlite_banner_page'] ) > 0 ) {
	            			$slider_args['page_id'] = absint( $slider_content['sparkconstructionlite_banner_page'] );
	            		}

	            		$page_content = new WP_Query( $slider_args );

            			if( $page_content->have_posts() ) {

            				while( $page_content->have_posts() ) {
            					
            					$page_content->the_post();

            					if( has_post_thumbnail() ) {
            						?>
					                <div class="item">
					                	<?php
					                		the_post_thumbnail('sparkconstructionlite-thumbnail-6', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' ) );

					                		$enable_caption = sparkconstructionlite_get_option('sparkconstructionlite_enable_banner_cap');
					                		if( $enable_caption == 1 ) {
					                	?>
							                    <div class="spc_container">
							                        <div class="slider_caption">
							                            <h2>
							                            	<?php the_title(); ?>
							                            </h2>

							                            <?php

							                            	the_excerpt();

							                            	$carousel_link_title = $slider_content['sparkconstructionlite_banner_link_title'];

							                            	$carousel_link = $slider_content['sparkconstructionlite_banner_link'];

							                            	if( !empty( $carousel_link ) && !empty( $carousel_link_title ) ) {
							                            ?>
							                            		<a class="general_btn_layout_one" href="<?php echo esc_url( $carousel_link ); ?>">
							                            			<?php
							                            				echo esc_attr( $carousel_link_title );
							                            			?>
							                            		</a>
							                            		
							                            <?php }  ?>

							                        </div><!-- .slider_caption -->
							                    </div><!-- .spc_container -->
							            <?php
							            	}
							            ?>
					                    <div class="thin_mask"></div><!-- .thin_mask -->
					                </div><!-- .item -->
                					<?php
                				}
                			}
                			wp_reset_postdata();
            			}
                	}
                ?>
            </div><!-- .owl-carousel.home_page_slider -->
        </div><!-- .spc_banner_inner -->
    </div><!-- .spc_banner -->
<?php
 }
?>