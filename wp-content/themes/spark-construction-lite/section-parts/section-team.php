<?php
/**
 * The template for displaying team section
 *
 * @package sparkconstructionlite
 */

$enable_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_team_sec' );
$section_layout = sparkconstructionlite_get_option( 'sparkconstructionlite_team_sec_layout' );
$section_title = sparkconstructionlite_get_option( 'sparkconstructionlite_team_sec_title' );
$section_sub_title = sparkconstructionlite_get_option( 'sparkconstructionlite_team_sec_subtitle' );

$team_contents = sparkconstructionlite_get_option( 'sparkconstructionlite_team_page_selection' );

if( $enable_section == 1 && !empty( $team_contents ) ) {
	?>
	<section class="spc_general_section spc_our_team section_bg">
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
                    <div class="owl-carousel owl-theme team_carousel">
                    	<?php
                    		foreach( $team_contents as $content ) {

                                $team_page_args = array(
                                    'post_type' => 'page',
                                    'posts_per_page' => 1,
                                );

                                if( absint( $content['sparkconstructionlite_team_page'] ) > 0 ) {
                        			$team_page_args['page_id'] = absint( $content['sparkconstructionlite_team_page'] );
                                }

                    			$team_page_query = new WP_Query( $team_page_args );

                    			while( $team_page_query->have_posts() ) {
                    				$team_page_query->the_post();
                    				?>
	                    			<div class="item">
				                        <div class="item_container">
				                            <?php
				                            	if( has_post_thumbnail() ) :
				                            		the_post_thumbnail( 'sparkconstructionlite-thumbnail-2', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' ) );
				                            	endif;
				                            ?>
				                            <div class="thin_mask"></div><!-- .thin_mask -->
				                            <div class="team_details content_holder">
				                                <div class="service_title">
				                                    <h3>
				                                        <?php
				                                        	the_title();
				                                        ?>
				                                    </h3>
                                                    <?php
                                                        the_content();
                                                    ?>
				                                </div><!-- .service_title -->
				                            </div><!-- .team_details.content_holder -->
				                        </div><!-- .item_container -->
				                    </div><!-- .item -->
                    				<?php
                    			}
                    			wp_reset_postdata();
                    		}
                    	?>
                    </div><!-- .owl-carousel.owl-theme.team_carousel -->
                </div><!-- section_container -->
        </div><!-- .spc_container -->
    </section><!-- .spc_general_section.spc_our_team.section_bg -->
	<?php
} 
?>