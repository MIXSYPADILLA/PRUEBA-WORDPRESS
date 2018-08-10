<?php $transportex_news_enable = get_theme_mod('transportex_news_enable','true');
	if($transportex_news_enable !='false')
	{ $transportex_total_posts = get_option('posts_per_page'); /* number of latest posts to show */
	
	if( !empty($transportex_total_posts) && ($transportex_total_posts > 0) ):

    $transportex_news_background = get_theme_mod('transportex_news_background');
    $transportex_news_overlay_color = get_theme_mod('transportex_news_overlay_color');
    $transportex_news_text_color = get_theme_mod('transportex_news_text_color'); 
   $transportex_new_slider_category = get_theme_mod('slider_category'); 
   $disable_news_meta = get_theme_mod('disable_news_meta', false);
   ?>
<style>
.ta-blog-section .ta-heading h3.ta-heading-inner {
color: <?php echo $transportex_news_text_color ?>;
}
.ta-blog-section .ta-heading .ta-heading-inner::before {
border-color: <?php echo $transportex_news_text_color ?>;
}
</style>
<!--==================== BLOG SECTION ====================-->
<?php if($transportex_news_background != '') { ?>

<section id="blog" class="ta-blog-section" style="background-image:url('<?php echo $transportex_news_background;?>');">
<?php } else { ?>
<section id="blog" class="ta-blog-section">
  <?php } ?>
  <div class="overlay" style="background-color: <?php echo esc_attr($transportex_news_overlay_color);?>;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 wow fadeInDown animated padding-bottom-50 text-center">
          <div class="ta-heading">
            <?php $transportex_news_title = get_theme_mod('transportex_news_title',__('Latest <span>News</span>','transportex'));
          
            if( !empty($transportex_news_title) ):
              echo '<h3 class="ta-heading-inner">'.$transportex_news_title.'</h3>';
            endif; ?>
          </div>
          <?php  $transportex_news_subtitle = get_theme_mod('transportex_news_subtitle',__('laoreet ipsum eu laoreet. ugiignissimat Vivamus dignissim feugiat erat sit amet convallis.','transportex'));

            if( !empty($transportex_news_subtitle) ): ?>
          <p style="color: <?php echo $transportex_news_text_color ?>;"><?php echo $transportex_news_subtitle ?> </p>
          <?php endif; ?>
        </div>
      </div>
      <div class="clear"></div>
      <div class="row">
        <?php $news_select = get_theme_mod('news_select',3);
			   $news_setting = get_theme_mod('slider_post_enable',true);
			
			   if( $news_setting == false )
			   {
			     $transportex_latest_loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => $news_select, 'order' => 'DESC',  'ignore_sticky_posts' => true , 'category__not_in'=>$transportex_new_slider_category));
			   }
			   else
			   {
			     $transportex_latest_loop = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => $news_select, 'order' => 'DESC','ignore_sticky_posts' => true, ''));
			   }
			    if ( $transportex_latest_loop->have_posts() ) :
			     while ( $transportex_latest_loop->have_posts() ) : $transportex_latest_loop->the_post();?>
        <div class="col-md-4 wow pulse animated">
          <div class="ta-blog-post-box">
            <div class="ta-blog-thumb"> 
              <div class="ta-blog-category"> 
                    <?php   $cat_list = get_the_category_list();
                    if(!empty($cat_list)) { ?>
                    <?php the_category(','); ?>
                   <?php } ?>
                  
                </div>
              <?php if(has_post_thumbnail()): ?>
                <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" >
                  <?php $defalt_arg =array('class' => "img-responsive"); ?>
                  <?php the_post_thumbnail('', $defalt_arg); ?>
                </a>
                  <?php endif; ?>
            </div>

           
			<article class="small">
               <?php if($disable_news_meta !=true) { ?>
			  <span class="ta-blog-date"> 
                <?php echo esc_attr(get_the_date('j')); ?>
                <?php echo esc_attr(get_the_date('M')); ?>
              </span> 
              <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php _e('by','transportex'); ?>
              <?php the_author(); ?>
              </a>
			 <?php } ?>			  
              <h1 class="title"><a title<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h1>
            </article>
			
          </div>
        </div>
        <?php endwhile; endif;	wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- /.container --> 
  </div>
</section>
<?php endif; ?>
<?php } ?>