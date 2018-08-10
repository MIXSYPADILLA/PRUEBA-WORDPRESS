<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Massage Spa
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$show_slider 	  		= get_theme_mod('show_slider', false);
$show_fashioner_page 	= get_theme_mod('show_fashioner_page', false);
$show_servicesbox 	  	= get_theme_mod('show_servicesbox', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_slider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>



  <div class="site-header <?php echo $inner_cls; ?>">  
      <div class="container">    
          <div class="logo">
				<?php massage_spa_the_custom_logo(); ?>
                <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <span><?php bloginfo('description'); ?></span>
          </div><!-- logo -->
          <div class="head-rightpart">
               <div class="toggle">
                 <a class="toggleMenu" href="#"><?php _e('Menu','massage-spa'); ?></a>
               </div><!-- toggle --> 
               <div class="header-menu">                   
                <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
               </div><!--.header-menu --> 
         </div><!-- .head-rightpart --> 
     	<div class="clear"></div>
     </div><!-- container -->      
</div><!--.site-header -->                  
  


<?php 
if ( is_front_page() && !is_home() ) {
if($show_slider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('sliderpage'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('sliderpage'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
    <div id="slider" class="nivoSlider">
      
        <?php 
        $i=1;
        $slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
        while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
        <?php if(!empty($image)){ ?>
        <img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" />
        <?php }else{ ?>
        <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" />
        <?php } ?>
        <?php $i++; endwhile; ?>
    </div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">
        <div class="slide_info">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p>   
            <?php
		 $slider_morebtn = get_theme_mod('slider_morebtn');
		 if( !empty($slider_morebtn) ){ ?>
          <a class="learnmore" href="<?php the_permalink(); ?>"><?php echo esc_html($slider_morebtn); ?></a>
	  	 <?php } ?>                          
        </div>
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_servicesbox != ''){ ?>  
    <section id="sectiopn-first">
            	<div class="container">
                    <div class="page-wrapper">                        
                        <?php for($n=1; $n<=4; $n++) { ?>    
                        <?php if( get_theme_mod('services-pagebox'.$n,false)) { ?>          
                            <?php $queryvar = new WP_Query('page_id='.absint(get_theme_mod('services-pagebox'.$n,true)) ); ?>				
                                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                                    <div class="column-four column<?php echo $n; ?>  ">                                    
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="column-four-imgbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="column-four-content">
                                     <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>                                     
                                     <p><?php echo esc_html( wp_trim_words( get_the_content(), 10, '...' ) );  ?></p>                                   
                                     </div>                                   
                                    </div>
                                    <?php endwhile;
                                   		 wp_reset_postdata(); ?>                                    
                       				<?php } } ?>                                 
                    <div class="clear"></div>  
               </div><!-- .page-wrapper--> 
               
            </div><!-- .container -->                     
       </section><!-- .sectiopn-first-->                      	      
<?php } ?>

<?php if( $show_fashioner_page != ''){ ?>  
    <section id="welcome-section">
            	<div class="container">
                    <div class="wearesuprime">                            
                        <?php if( get_theme_mod('fashioner_page',false)) { ?>          
                            <?php $queryvar = new WP_Query('page_id='.absint(get_theme_mod('fashioner_page',true)) ); ?>				
                                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                                     
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="about-humb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="abouttitledes">
                                       <div class="abouttitle"><h4><?php the_title(); ?></h4></div>
                                       <div class="aboutdesc"><p><?php echo esc_html( wp_trim_words( get_the_content(), 125, '...' ) );  ?></p></div>   
                                       <a class="learnmore" href="<?php the_permalink(); ?>">                                      
                                         <?php _e('Read More','massage-spa'); ?>
                                      </a>                                                                     
                                    </div>                                      
                                    <?php endwhile;
                                   		 wp_reset_postdata(); ?>                                    
                       				<?php } ?>                                 
                    <div class="clear"></div>  
                </div><!-- wearesuprime-->            
            </div><!-- container -->
       </section><!-- #welcome-section -->
<?php } ?>
<?php } ?>