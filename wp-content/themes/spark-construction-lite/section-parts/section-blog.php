<?php
/**
 * The template for displaying blog section
 *
 * @package sparkconstructionlite
 */


$enable_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_blog_sec' );
$section_title = sparkconstructionlite_get_option( 'sparkconstructionlite_blog_sec_title' );
$section_sub_title = sparkconstructionlite_get_option( 'sparkconstructionlite_blog_sec_subtitle' );
$all_title = sparkconstructionlite_get_option( 'sparkconstructionlite_blog_sec_all_title' );
$all_link = sparkconstructionlite_get_option( 'sparkconstructionlite_blog_sec_all_link' );
$content_length = sparkconstructionlite_get_option( 'sparkconstructionlite_blog_sec_content' );
$no_of_items = sparkconstructionlite_get_option( 'sparkconstructionlite_blog_sec_post_no' );

$post_args = array(
	'post_type' => 'post',
);

if( absint( $no_of_items ) > 0 ) {
	$post_args['posts_per_page'] = absint( $no_of_items );
}

$post_query = new WP_Query( $post_args );

if( $enable_section == 1 && $post_query->have_posts() ) {
	?>
	<section class="spc_general_section spc_our_blog_release_layout_two">
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
	                    	while( $post_query->have_posts() ) :
	                    		$post_query->the_post();
			                    ?>
			                    <div class="col-md-4 col-sm-6 col-xs-12">
			                        <div class="blog_layout_two_item">
			                           	<?php
			                            	if( has_post_thumbnail() ) :
				                            	?>
					                            <div class="post_fimage">
					                                <?php
					                                	the_post_thumbnail( 'sparkconstructionlite-thumbnail-1', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' ) );
					                                ?>
					                                <div class="posted_date">
					                                    <span>
					                                        <a href="<?php the_permalink(); ?>">
				                                        		<?php
				                                        			the_time( 'M d' );
				                                        		?>
					                                        </a>
					                                    </span>
					                                </div><!-- .posted_date -->
					                            </div><!-- .post_fimage -->
				                            	<?php
			                            	endif;
			                            ?>
			                            <div class="post_info_holder">
			                                <div class="post_meta">
			                                    <ul class="meta_list clearfix">
			                                        <li class="author_name">
			                                           	<?php
			                                            	sparkconstructionlite_get_author();
			                                            ?>
			                                        </li><!-- .author_name -->
			                                        <li class="posted_category">
			                                           	<?php
			                                            	sparkconstructionlite_get_categories();
			                                            ?>
			                                        </li><!-- .author_name -->
			                                    </ul><!-- .meta_list.clearfix -->
			                                </div><!-- .post_meta -->
			                                <div class="the_title">
			                                    <h3>
			                                       	<a href="<?php the_permalink(); ?>">
			                                        	<?php
			                                        		the_title();
			                                        	?>
			                                       	</a>
			                                    </h3>
			                                </div><!-- .the_title -->
			                                <div class="the_content">
			                                   	<?php
				                                   	if( !empty( $content_length ) ) {
		                                                echo wp_kses_post( wp_trim_words( get_the_content(), absint( $content_length ) ) );
				                                   	}
	                                            ?>
			                                </div><!-- .the_content -->
			                            </div><!-- .post_info_holder -->
			                        </div><!-- .blog_layout_two_item -->
			                    </div>
			                    <?php
			                endwhile;
			                wp_reset_postdata();
	                    ?>
	                </div><!-- .row -->
	            </div><!-- .section_content -->
	            <?php
		            if( !empty( $all_title ) && !empty( $all_link ) ) :
		            	?>
		            	<a class="general_btn_layout_one" href="<?php echo esc_attr( $all_link ); ?>">
		            		<?php
		            			echo esc_attr( $all_title );
		            		?>
		            	</a><!-- .general_btn_layout_one -->
		                <?php
		            endif;
		        ?>
	        </div><!-- .spc_container -->
	    </div><!-- .section_inner -->
	</section><!-- .spc_general_section.spc_our_blog_release_layout_two -->
	<?php
}
