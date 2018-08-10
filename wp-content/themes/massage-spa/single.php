<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Massage Spa
 */

get_header(); ?>

<div class="container">
     <div class="pagelayout_area">
        <section class="site-maincontentarea">            
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>
                    <?php the_post_navigation(); ?>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>                  
         </section>       
        <?php get_sidebar();?>
       
        <div class="clear"></div>
    </div><!-- pagelayout_area -->
</div><!-- container -->	
<?php get_footer(); ?>