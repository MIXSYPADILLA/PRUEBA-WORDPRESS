<?php
/**
 * The template for displaying offer section
 *
 * @package sparkconstructionlite
 */

$enabler_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_off_sec' );
$section_title = sparkconstructionlite_get_option( 'sparkconstructionlite_off_sec_title' );
$section_sub_title = sparkconstructionlite_get_option( 'sparkconstructionlite_off_sec_subtitle' );
$all_title = sparkconstructionlite_get_option( 'sparkconstructionlite_off_sec_all_title' );
$all_link = sparkconstructionlite_get_option( 'sparkconstructionlite_off_sec_all_link' );

$offer_contents = sparkconstructionlite_get_option( 'sparkconstructionlite_off_page_selection' );
$content_length = sparkconstructionlite_get_option( 'sparkconstructionlite_off_sec_content' );

if( $enabler_section == 1 && !empty( $offer_contents ) ) {
    ?>
    <section class="spc_general_section spc_what_we_offer">
        <div class="section_inner">
            <div class="spc_container">
                <?php
                    if( !empty( $section_title ) ) :
                ?>
                        <div class="section_title">
                            <h2>
                                <?php
                                    echo wp_kses_post( $section_title );
                                ?>
                            </h2>
                        </div><!-- .section_title -->
                <?php
                    endif;

                    if( !empty( $section_sub_title ) ) :
                ?>
                        <div class="section_desc">
                            <p>
                                <?php
                                    echo wp_kses_post( $section_sub_title );
                                ?>
                            </p>
                        </div><!-- .section_desc -->
                <?php
                    endif;
                ?>
                <div class="section_content">
                    <div class="row">
                        <?php
                            foreach( $offer_contents as $key => $content  ) {
                                $content_page_args = array(
                                    'post_type' => 'page',
                                    'posts_per_page' => 1,
                                );

                                if( absint( $content['sparkconstructionlite_off_page'] ) > 0 ) {
                                    $content_page_args['page_id'] = absint( $content['sparkconstructionlite_off_page'] );
                                }

                                $content_page_query = new WP_Query( $content_page_args );

                                while( $content_page_query->have_posts() ) {
                                    $content_page_query->the_post();
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="what_we_offer_block itemgrid_block">
                                            <?php
                                                if( !empty( $content['sparkconstructionlite_off_icon'] ) ) {
                                            ?>
                                                    <div class="what_we_offer_icon">
                                                        <span class="icon_holder">
                                                            <i class="fa <?php echo esc_attr( $content['sparkconstructionlite_off_icon'] ); ?>"></i>
                                                        </span><!-- .icon_holder -->
                                                    </div><!-- .what_we_offer_icon -->
                                            <?php
                                                }
                                            ?>
                                            <div class="content_holder">
                                                <div class="service_title">
                                                    <h3>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php
                                                                the_title();
                                                            ?>
                                                        </a>
                                                    </h3>
                                                </div><!-- .service_title -->
                                                <div class="service_desc">
                                                    <?php
                                                        if( !empty( $content_length ) ) {
                                                            echo wp_kses_post( wp_trim_words( get_the_content(), absint( $content_length ) ) );
                                                        }
                                                    ?>
                                                </div><!-- .service_desc -->
                                            </div><!-- .content_holder -->
                                        </div><!-- .what_we_offer_block.itemgrid_block -->
                                    </div>
                                    <?php
                                }
                                wp_reset_postdata();
                            }
                        ?>
                    </div><!-- .row -->
                </div>
                <!-- .section_content -->
            </div><!-- .spc_container -->
        </div><!-- .section_inner -->
    </section><!-- .spc_general_section.spc_what_we_offer -->
    <?php
    }
?>