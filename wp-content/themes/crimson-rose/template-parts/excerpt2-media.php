<?php
/**
 * Template part for displaying posts
 *
 * @package WordPress
 * @subpackage Crimson_rose
 * @since 1.01
 * @author Chris Baldelomar <chris@webplantmedia.com>
 * @copyright Copyright (c) 2018, Chris Baldelomar
 * @link https://webplantmedia.com/product/crimson-rose-wordpress-theme/
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'excerpt2 excerpt2-media' ); ?>>
	<div class="entry-image">
		<?php the_content(); ?>
	</div><!-- .entry-image -->

	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-cat-meta">
				<?php crimson_rose_entry_header( '<span class="cat-bull-delim">&bull;</span> ' ); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php crimson_rose_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif;
		?>
	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->
