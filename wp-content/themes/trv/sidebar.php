<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package transportex
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>
<aside id="secondary" class="widget-area" role="complementary">
	<div id="sidebar-right" class="transportex-sidebar">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
</aside><!-- #secondary -->
