<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sparkconstructionlite
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="single_content_area_outer">
			<div class="single_title">
				<h2>
					<?php
						the_title();
					?>
				</h2>
			</div><!-- .single_title -->
			<?php
				if( has_post_thumbnail() ) :
					?>
					<div class="single_fimage">
						<?php
							the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' )  );
						?>
					</div><!-- .single_fimage -->
					<?php
				endif;

				/**
				 * Post Meta 
				*/
				sparkconstructionlite_postmeta( true, true, true );
			?>
			<div class="single_content">
				<?php

					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spark-construction-lite' ),
						'after'  => '</div>',
					) );

					if( get_edit_post_link() ) :
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'spark-construction-lite' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					endif;
				?>
			</div><!-- .single_content -->

			<div class="post-tag">        
	            <?php the_tags( '<ul><li><i class="fa fa-tag"></i></li><li>', '</li><li>', '</li></ul>' ); ?>
	        </div>

		</div><!-- .single_content_area_outer -->
	</article><!-- #post-<?php the_ID(); ?> -->