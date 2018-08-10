<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sparkconstructionlite
 */

	$class = null;
	
	$sidebar_position = sparkconstructionlite_get_option( 'sparkconstructionlite_archive_sidebar' );

	if( $sidebar_position == 'left' || $sidebar_position == 'right' ) {
		$class = 'col-md-6 col-sm-6 col-xs-12';
	} else {
		$class = 'col-md-4 col-sm-6 col-xs-12';
	}

?>
	<div class="<?php echo esc_attr( $class ); ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="ourservice_block itemgrid_block">
				<?php
					if( has_post_thumbnail() ) :
						?>
						<div class="service_fimage featured_image">
							<?php
								the_post_thumbnail( 'sparkconstructionlite-thumbnail-1', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' ) );
							?>
						</div><!-- .service_fimage.featured_image -->
						<?php
					endif;
				?>
				<div class="content_holder">
					<div class="service_title">
						<h3>
							<a href="<?php the_permalink(); ?>">
								<?php
									the_title();
								?>
							</a>
						</h3>
					</div><!-- .service_title -->
					<div class="service_desc">
						<?php
							the_excerpt();
						?>
					</div><!-- .service_desc -->
				</div><!-- .content_holder -->
			</div><!-- .ourservice_block.itemgrid_block -->
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>

