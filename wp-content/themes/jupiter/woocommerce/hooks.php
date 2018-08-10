<?php

//Add native lightbox if Woocommerce versions below V3.0
if(version_compare(WC_VERSION, '3.0', '<')) {
	update_option( 'woocommerce_enable_lightbox', "yes" );
}



remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating',5);
add_action('mk_woocommerce_shop_loop_rating', 'woocommerce_template_loop_rating', 10);

/* Added Polyfil for increment and decrement of product quality for woocommerce using a plugin */
require_once (THEME_INCLUDES . "/woocommerce-quantity-increment/woocommerce-quantity-increment.php");





/*
 * Overrides woocommerce styles and scripts modified and created by theme
*/
if(!function_exists('mk_override_woocommerce_styles')) {

	function mk_override_woocommerce_styles() {
	    global $mk_options;

	    $theme_data = wp_get_theme("Jupiter");

	    $is_css_min = ( !(defined('MK_DEV') ? constant("MK_DEV") : true) || $mk_options['minify-css'] == 'true' );

	    wp_enqueue_style('woocommerce-override', THEME_STYLES . '/plugins'. ($is_css_min ? '/min' : '') .'/' . apply_filters( 'mk_woocommerce_styles', 'woocommerce.css' ), false, $theme_data['Version'], 'all');
		
		return;
	}
	add_filter('woocommerce_enqueue_styles', 'mk_override_woocommerce_styles');
}




/*
 * Overrides woocommerce styles and scripts modified and created by theme
*/
if(!function_exists('mk_woocommerce_image_dimensions')) {

	function mk_woocommerce_image_dimensions() {
		$check = get_option('jupiter_woocommerce_image_size');
		
		if($check == 'true') return false;
		
		update_option('jupiter_woocommerce_image_size', 'true');

		$catalog = array(
			'width' 	=> '500',
			'height'	=> '500',
			'crop'		=> 1,
		);

		$single = array(
			'width' 	=> '1000',
			'height'	=> '1000',
			'crop'		=> 0,
		);

		$thumbnail = array(
			'width' 	=> '120',
			'height'	=> '120',
			'crop'		=> 1,
		);

		update_option( 'shop_catalog_image_size', $catalog );
		update_option( 'shop_single_image_size', $single );
		update_option( 'shop_thumbnail_image_size', $thumbnail );
	}
}


mk_woocommerce_image_dimensions();


/**
* overrides the archive loop product description
*/
if(!function_exists('mk_woocommerce_product_archive_description')) {
	
	function mk_woocommerce_product_archive_description() {
	    
	    if (is_post_type_archive('product')) {
	        $shop_page = get_post(wc_get_page_id('shop'));
	        if ($shop_page) {
	            $description = apply_filters('the_content', $shop_page->post_content);
	            if ($description) {
	                echo $description;
	            }
	        }
	    }

	}

	add_action('woocommerce_archive_description', 'mk_woocommerce_product_archive_description', 10);
}

/**
* Overrides the html template for cart fragments - desktop
*/
if (!function_exists('mk_woocommerce_header_add_to_cart_fragment')) {
    
    function mk_woocommerce_header_add_to_cart_fragment($fragments) {
        
        ob_start();
        ?>
        <a class="mk-shoping-cart-link" href="<?php echo WC()->cart->get_cart_url(); ?>">
            <?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-moon-cart-2', 16); ?>
            <span class="mk-header-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
        </a>
        <?php
        $fragments['a.mk-shoping-cart-link'] = ob_get_clean();
            
        return $fragments;
    }
    add_filter('woocommerce_add_to_cart_fragments', 'mk_woocommerce_header_add_to_cart_fragment');

}





/*
* Add woommerce share buttons
*/

add_action( 'woocommerce_share', 'mk_woocommerce_share' );

function mk_woocommerce_share() {
	global $mk_options;
	?>
	<div class="social-share">
		<?php
			if(isset($mk_options['woocommerce_single_social_network']) && $mk_options['woocommerce_single_social_network'] == 'true') :
			$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true ); ?>
			<ul>
				<li>
					<a class="facebook-share" data-title="<?php the_title_attribute();?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#">
						<?php Mk_SVG_Icons::get_svg_icon_by_class_name(true,'mk-jupiter-icon-simple-facebook'); ?>	
					</a>
				</li>
				<li>
					<a class="twitter-share" data-title="<?php the_title_attribute();?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#">
						<?php Mk_SVG_Icons::get_svg_icon_by_class_name(true,'mk-moon-twitter'); ?>
					</a>
				</li>

				<li>
					<a class="googleplus-share" data-title="<?php the_title_attribute();?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#">
						<?php Mk_SVG_Icons::get_svg_icon_by_class_name(true,'mk-jupiter-icon-simple-googleplus'); ?>
					</a>
				</li>

				<li>
				<a class="pinterest-share" data-image="<?php echo $image_src_array[0]; ?>" data-title="<?php the_title_attribute();?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#">
					<?php Mk_SVG_Icons::get_svg_icon_by_class_name(true,'mk-jupiter-icon-simple-pinterest'); ?>
					</a>
				</li>
				
			</ul>
		<?php endif; ?>
	</div>
	<?php
}

/**
* Output Add to cart button for responsive
*/
if (!function_exists('mk_add_to_cart_responsive')) {
    
    function mk_add_to_cart_responsive() {
    	global $mk_options;

    	$show_cart = isset($mk_options['add_cart_responsive']) ? $mk_options['add_cart_responsive'] : 'true';
    	
    	if($show_cart == 'false') return false;

        ?>
        <div class="add-cart-responsive-state">
	        <a class="mk-shoping-cart-link" href="<?php echo WC()->cart->get_cart_url();?>">
				<?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-moon-cart-2', 16); ?>
				<span class="mk-header-cart-count"><?php echo WC()->cart->cart_contents_count;?></span>
			</a>
		</div>
        <?php
    }

	add_action( 'add_to_cart_responsive', 'mk_add_to_cart_responsive', 20 );

}

add_action( 'woocommerce_before_main_content', function() {
	global $mk_options;
	if ( 'true' == $mk_options['woocommerce_catalog'] ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}
}, 999 );

/**
 * Move Cross-Sells Under Cart Table & Change Number of its Columns
 *
 * @author Michael Taheri
 */
function mk_change_cross_sells_columns() {
	return 4;
}
add_filter( 'woocommerce_cross_sells_columns', 'mk_change_cross_sells_columns' );

// Remove Cross Sells From Default Position.
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

// Add them back UNDER the Cart Table.
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

/**
 * Show cart widget (mini cart) in Cart and Checkout pages
 *
 * @author Reza Ardestani
 * @since  5.4
 */
function mk_filter_woocommerce_widget_cart_is_hidden( $is_cart ) {
	$is_cart = false;
	return $is_cart;
};

add_filter( 'woocommerce_widget_cart_is_hidden', 'mk_filter_woocommerce_widget_cart_is_hidden', 10, 1 ); 
