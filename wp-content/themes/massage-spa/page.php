<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Massage Spa
 */

get_header(); ?>

	<div class="container">
      <div class="pagelayout_area">
    		 <section class="site-maincontentarea">               
            		<?php while( have_posts() ) : the_post(); ?>                               
						<?php get_template_part( 'content', 'page' ); ?>
                        <?php
                            //If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                            ?>                               
                    <?php endwhile; ?>                     
            </section><!-- section-->   
     <?php get_sidebar();?>      
    <div class="clear"></div>
    </div><!-- .pagelayout_area --> 
 </div><!-- .container --> 
<?php get_footer(); ?>