<?php get_header(); 
get_template_part('index','banner'); ?>
<div class="clearfix"></div>
<!-- =========================
     Page Content Section      
============================== -->
 <main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'9' ); ?> col-md-9">
        <div class="row">
		      <?php if(have_posts())
		        {
		      while(have_posts()) { the_post(); ?>
          <div class="col-md-12">
            <div class="transportex-blog-post-box"> 
             <div class="transportex-blog-thumb">  
              <div class="transportex-blog-category"> 
                <?php   $cat_list = get_the_category_list();
                if(!empty($cat_list)) { ?>
                <?php the_category(', '); ?>
                <?php } ?>
              </div> 
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			        <?php if(has_post_thumbnail()): ?>
			         <?php $defalt_arg =array('class' => "img-responsive"); ?>
			         <?php the_post_thumbnail('', $defalt_arg); ?>
			        <?php endif; ?>
			        </a>
              </div>
              <article class="small">
                <span class="transportex-blog-date"><?php echo get_the_date('j'); ?>
                  <?php echo get_the_date('M'); ?>
                </span> 
                <a class="transportex-author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php _e('by','transportex'); ?>
                  <?php the_author(); ?>
                </a> 
                <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <?php the_content(); ?>
              </article>
            </div>
          </div>
		      <?php } ?>
		  <div class="col-md-12 text-center">
          <?php the_posts_navigation(); ?>
          </div>  
          <div class="col-md-12">
            <div class="media transportex-info-author-block"> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>" class="transportex-author-pic"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </a>
              <div class="media-body">
                <h4 class="media-heading"><span><i class="fa fa-user"></i><?php _e('By','transportex'); ?></span><a href "<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author(); ?></a></h4>
                <p><?php the_author_meta( 'description' ); ?></p>
                <div class="row">
                  <div class="col-md-6 col-pad7">
                    <ul class="list-inline info-author-social">
          					<?php 
          					$facebook_profile = get_the_author_meta( 'facebook_profile' );
          					if ( $facebook_profile && $facebook_profile != '' ) {
          					echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook-square"></i></a></li>';
          					} 
					
          					$twitter_profile = get_the_author_meta( 'twitter_profile' );
          					if ( $twitter_profile && $twitter_profile != '' ) 
          					{
          					echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter-square"></i></a></li>';
          					}
					
          					$google_profile = get_the_author_meta( 'google_profile' );
          					if ( $google_profile && $google_profile != '' ) {
          					echo '<li class="googleplus"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus-square"></i></a></li>';
          					}
          					$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
          					if ( $linkedin_profile && $linkedin_profile != '' ) {
          					   echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin-square"></i></a></li>';
          					}
          					?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
		      <?php } ?>
         <?php comments_template('',true); ?>
        </div>
      </div>
      <div class="col-md-3">
      <?php get_sidebar(); ?>
      </div>
    </div>
    <!--/ Row end --> 
  </div>
</main>
<?php get_footer(); ?>