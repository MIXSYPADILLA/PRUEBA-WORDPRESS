<?php
/**
 * The template for displaying cta section
 *
 * @package sparkconstructionlite
 */

$enable_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_cta_sec' );

$button_title = sparkconstructionlite_get_option( 'sparkconstructionlite_cta_sec_btn_title' );
$button_link = sparkconstructionlite_get_option( 'sparkconstructionlite_cta_sec_btn_link' );

$cta_page = sparkconstructionlite_get_option( 'sparkconstructionlite_cta_page' );

$page_args = array(
	'post_type' => 'page',
	'posts_per_page' => 1,
);

if( absint( $cta_page ) > 0 ) {
	$page_args['page_id'] = absint( $cta_page );
}

$page_query = new WP_Query( $page_args );


if( $enable_section == 1 && $page_query->have_posts() ) {
	?>
	<section class="spc_general_section spc_cta">
		<?php
			while( $page_query->have_posts() ) :
				$page_query->the_post();

				if( has_post_thumbnail() ) :
					$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
					?>
        			<div class="section_inner" style="background-image:url(<?php echo esc_url( $thumbnail_url ); ?>);">
        			<?php
        		else :
        			?>
        			<div class="section_inner">
        			<?php
        		endif;
        		?>
		            <div class="spc_container">
		                <div class="section_title">
		                    <h2>
		                    	<?php
		                    		the_title();
		                    	?>
		                    </h2>
		                </div><!-- .section_title -->
		                <div class="section_content">
		                    <div class="cta_contents">
		                        <?php
		                        	the_content();

		                        	if( !empty( $button_title ) && !empty( $button_link ) ) {
		                        	?>
		                        		<a class="general_btn_layout_one" href="<?php echo esc_url( $button_link ); ?>">
		                        			<?php
		                        				echo esc_attr( $button_title );
		                        			?>
		                        		</a><!-- .general_btn_layout_one -->
		                        	<?php
		                        	}
		                        ?>
		                    </div><!-- .cta_contents -->
		                </div><!-- .section_content -->
		            </div><!-- .spc_container -->
		            <div class="thin_mask"></div><!-- .thin_mask -->
	        	</div><!-- .section_inner -->
	       		<?php
	    	endwhile;
	    	wp_reset_postdata();
		?>
    </section><!-- .spc_general_section.spc_cta -->
	<?php
}
?>