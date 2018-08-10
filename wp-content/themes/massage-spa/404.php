<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Massage Spa
 */

get_header(); ?>

<div class="container">
    <div class="pagelayout_area">
        <section class="site-maincontentarea">
            <header class="page-header">
                <h1 class="entry-title"><?php _e( '404 Not Found', 'massage-spa' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php _e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'massage-spa' ); ?></p>               
            </div><!-- .page-content -->
        </section>
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>