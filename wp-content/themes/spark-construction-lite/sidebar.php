<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sparkconstructionlite
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<div class="col-md-4 col-sm-12 col-xs-12">
	<aside id="secondary" class="sidebar project_sidebar">
		<?php 
			dynamic_sidebar( 'sidebar' ); 
		?>
	</aside><!-- #secondary.sidebar.widget-area -->
</div>
