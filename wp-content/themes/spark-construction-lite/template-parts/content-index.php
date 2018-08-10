<?php
/**
 * Template part for displaying results in index page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sparkconstructionlite
 */

?>

<div id="post-<?php the_ID(); ?>" class="search_result_items">
	<div class="row">
		<?php
			if( has_post_thumbnail() ) :
				?>
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="post_fimage">
						<?php
							the_post_thumbnail( 'sparkconstructionlite-thumbnail-1', array( 'alt' => the_title_attribute( array( 'echo' => false ) ), 'class' => 'img-responsive' ) );
						?>
					</div><!-- .post_fimage -->
				</div>
				<?php
			endif;
		?>

		<div class="col-md-7 col-sm-7 col-xs-12">
			<div class="post_desc">
				<div class="post_title">
					<h3>
						<a href="<?php the_permalink(); ?>">
							<?php
								the_title();
							?>
						</a>
					</h3>
				</div><!-- .post_title -->
				<div class="post_content">
					<?php
						the_excerpt();
					?>
				</div><!-- .post_content -->
				<div class="the_permalink">
					<a class="search_permalink" href="<?php the_permalink(); ?>">
						<?php
							esc_html_e( 'Read More', 'spark-construction-lite' );
						?>
					</a><!-- .search_permalink -->
				</div><!-- .the_permalink -->
			</div><!-- .post_desc -->
		</div>
	</div><!-- .row -->
</div><!-- #post-<?php the_ID(); ?>.search_result_items -->
