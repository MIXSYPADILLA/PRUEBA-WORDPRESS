<?php
$phpinfo =  pathinfo( __FILE__ );
$path = $phpinfo['dirname'];
include( $path . '/config.php' );


$id = Mk_Static_Files::shortcode_id();

$cat = !empty($categories) ? $categories : $cat;
$query = mk_wp_query(array(
            'post_type' => 'portfolio',
            'count' => $count,
            'offset' => $offset,
            'categories' => $cat,
            'author' => $author,
            'posts' => $posts,
            'orderby' => $orderby,
            'order' => $order,
        ));

$loop = $query['wp_query'];


?>

<div id="portfolio-carousel-wrapper-<?php echo $id; ?>" class="portfolio-carousel style-<?php echo $style; ?> <?php echo $el_class . ' ' . $visibility; ?>">

    <?php if(!empty($view_all) && $view_all != '*') { ?>
        
        <h3 class="mk-fancy-title pattern-style"><span><?php echo $title; ?></span>
        <a href="<?php echo esc_url( get_permalink( $view_all ) ); ?>" class="view-all page-bg-color"><?php echo $view_all_text; ?></a></h3>
        <div class="clearfix"></div>
        <?php 
        $direction_vav = 'true';
    }
    ?>

    <div id="portfolio-carousel-<?php echo $id; ?>" class="mk-flexslider" data-id="<?php echo $id; ?>" data-style="<?php echo $style; ?>" data-direction-nav="<?php echo $direction_vav; ?>" data-show-items="<?php echo $show_items; ?>">
        <ul class="mk-flex-slides">

        <?php

        while ( $loop->have_posts() ) :
                $loop->the_post();

                $post_type = get_post_meta(get_the_ID(), '_single_post_type', true );
                $post_type = !empty( $post_type ) ? $post_type : 'image';

                $atts = array(
                    'image_size' => $image_size,
                    'id' => $id,
                    'hover_scenarios' => $hover_scenarios,
                    'meta_type' => $meta_type,
                    'post_type' => $post_type

                    );

                echo mk_get_shortcode_view('mk_portfolio_carousel', 'loop-styles/' . $style, true, $atts);

        endwhile; 
            wp_reset_query();
        ?>

        </ul>
    </div>
<div class="clearboth"></div>
</div>

<?php
if(empty($title)) {
    Mk_Static_Files::addCSS('
        @media handheld, only screen and (max-width: 767px) {
            #portfolio-carousel-wrapper-'.$id.' .mk-fancy-title.pattern-style span {
                padding: 0!important;
            }
        }
    ', $id);
}
?>