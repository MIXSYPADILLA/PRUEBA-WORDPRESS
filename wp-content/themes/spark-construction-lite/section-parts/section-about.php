<?php
/**
 * The template for displaying about section
 *
 * @package sparkconstructionlite
 */

$enabler_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_abt_sec' );
$section_title = sparkconstructionlite_get_option( 'sparkconstructionlite_abt_sec_title' );
$section_sub_title = sparkconstructionlite_get_option( 'sparkconstructionlite_abt_sec_subtitle' );
$video_url = sparkconstructionlite_get_option( 'sparkconstructionlite_abt_sec_vidlink' );

$accrodian_pages = sparkconstructionlite_get_option( 'sparkconstructionlite_abt_sec_pages' ); 

if( $enabler_section == 1 ) {
	?>
	<section class="spc_who_we_are who_we_are_layout_two section_bg">
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
	                    <?php
	                    	if( !empty( $accrodian_pages ) ) {
	                    		?>
	                    		<div class="<?php if( empty( $video_url ) ) { echo esc_attr__( 'col-md-12', 'spark-construction-lite' ); } else { echo esc_attr__( 'col-md-6', 'spark-construction-lite' ); } ?> col-sm-12 col-xs-12">
			                        <div class="who_we_are_left_block itemgrid_block">
			                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			                                <?php
			                                	$count = 0;
			                                	foreach( $accrodian_pages as $content ) {
			                                		$page_args = array(
			                                			'post_type' => 'page',
			                                			'posts_per_page' => 1,
			                                		);
			                                		if( absint( $content['sparkconstructionlite_abt_sec_page'] ) > 0 ) {
				                                		$page_args['page_id'] = absint( $content['sparkconstructionlite_abt_sec_page'] );
				                                	}

			                                		$page_query = new WP_Query( $page_args );
			                                		while( $page_query->have_posts() ) :
			                                			$page_query->the_post();
			                                			if( $count == 0 ) :
			                                				?>
				                                			<div class="panel panel-default">
							                                    <div class="panel-heading" role="tab" id="heading<?php echo esc_attr( $count ); ?>">
							                                        <h4 class="panel-title">
							                                           	<a class="first" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo esc_attr( $count ); ?>" aria-expanded="true" aria-controls="collapse<?php echo esc_attr( $count ); ?>">
							                                            	<?php
							                                            		the_title();
							                                            	?>
							                                            	<span></span>
							                                            </a><!-- #collapse<?php echo esc_attr( $count ); ?>.collapsed -->
							                                        </h4><!-- .panel-title -->
							                                    </div><!-- #heading<?php echo esc_attr( $count ); ?>.panel-heading -->
							                                    <div id="collapse<?php echo esc_attr( $count ); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo esc_attr( $count ); ?>">
							                                        <div class="panel-body">
							                                            <?php
							                                                the_content();
							                                            ?>
							                                        </div><!-- .panel-body -->
							                                    </div><!-- #collapse<?php echo esc_attr( $count ); ?>.panel-collapse.collapse -->
							                                </div><!-- .panel.panel-default -->
			                                				<?php
			                                				$count = $count + 1;
			                                			else :
			                                				?>
			                                				<div class="panel panel-default">
							                                    <div class="panel-heading" role="tab" id="heading<?php echo esc_attr( $count ); ?>">
							                                        <h4 class="panel-title">
							                                           	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo esc_attr( $count ); ?>" aria-expanded="false" aria-controls="collapse<?php echo esc_attr( $count ); ?>">
							                                            	<?php
							                                            		the_title();
							                                            	?>
							                                            	<span></span>
							                                            </a><!-- #collapse<?php echo esc_attr( $count ); ?>.collapsed -->
							                                        </h4><!-- .panel-title -->
							                                    </div><!-- #heading<?php echo esc_attr( $count ); ?>.panel-heading -->
							                                    <div id="collapse<?php echo esc_attr( $count ); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo esc_attr( $count ); ?>">
							                                        <div class="panel-body">
							                                            <?php
							                                                the_content();
							                                            ?>
							                                        </div><!-- .panel-body -->
							                                    </div><!-- #collapse<?php echo esc_attr( $count ); ?>.panel-collapse.collapse -->
							                                </div><!-- .panel.panel-default -->
			                                				<?php
			                                				$count = $count + 1;
			                                			endif;
			                                		endwhile;
			                                		wp_reset_postdata();
			                                	}
			                                ?>
			                            </div><!-- .panel-group#accordian -->
			                        </div><!-- .who_we_are_left_block.itemgrid_block -->
			                    </div>
	                    		<?php
	                    	}

	                    	if( !empty( $video_url ) ) {
	                    		?>
	                    		<div class="<?php if( empty( $accrodian_pages ) ) { echo esc_attr__( 'col-md-12', 'spark-construction-lite' ); } else { echo esc_attr__( 'col-md-6', 'spark-construction-lite' ); } ?> col-sm-12 col-xs-12">
			                        <div class="who_we_are_right_block itemgrid_block">
			                            <div class="who_we_are_video">			                                	
			                                <a href="<?php echo esc_url( $video_url ); ?>" rel="prettyPhoto">
			                                	<?php
			                                		$video_width = null;
			                                		if( empty( $accrodian_pages ) ) {
			                                			$video_width = 1170;
			                                		} else {
			                                			$video_width = 555;
			                                		}
			                                		$embed_args = array( 'width' => $video_width );
			                                		$embed_video = wp_oembed_get( $video_url, $embed_args );
			                                		echo $embed_video;
			                                	?>
			                                	<div class="thin_mask"></div><!-- .thin_mask -->
			                                </a>
			                            				                                    
			                            </div><!-- .who_we_are_video -->
			                        </div><!-- .who_we_are_right_block.itemgrid_block -->
			                    </div>
	                    		<?php
	                    	}
	                    ?>
	                </div><!-- .row -->
	            </div><!-- .section_content -->
	        </div><!-- .spc_container -->
	    </div><!-- .section_inner -->
	</section><!-- .spc_who_we_are.section_bg -->
	<?php
}
?>