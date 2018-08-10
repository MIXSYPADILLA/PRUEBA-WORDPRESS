<?php
/**
 * The template for displaying counter
 *
 * @package sparkconstructionlite
 */

$enabler_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_cnt_sec' );

$section_background = sparkconstructionlite_get_option( 'sparkconstructionlite_cnt_sec_background' );

$counter_contents = sparkconstructionlite_get_option( 'sparkconstructionlite_cnt_sec_content' );

if( $enabler_section == 1 && !empty( $counter_contents ) ) {
    ?>
    <section class="spc_general_section spc_counter_Section">
        <?php
            if( !empty( $section_background ) ) :
        ?>
                <div class="section_inner" style="background-image:url(<?php echo esc_url( $section_background ); ?>);">
        <?php
            else :
        ?>
                <div class="section_inner">
        <?php
            endif;
        ?>
            <div class="spc_container">
                <div class="section_content">
                    <div class="row">
                        <?php
                            foreach( $counter_contents as $content ) {
                                ?>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="counterup_block itemgrid_block">
                                            <?php
                                                if( !empty( $content['sparkconstructionlite_cnt_sec_count'] ) ) {
                                                    ?>
                                                    <div class="what_we_offer_icon">
                                                        <span class="icon_holder">
                                                            <span class="counter">
                                                                <?php echo esc_attr( $content['sparkconstructionlite_cnt_sec_count'] ); ?>
                                                            </span><!-- .counter -->
                                                        </span><!-- .icon_holder -->
                                                    </div><!-- .what_we_offer_icon -->
                                                    <?php
                                                }

                                                if( !empty( $content['sparkconstructionlite_cnt_sec_title'] ) ) {
                                                    ?>
                                                    <div class="content_holder">
                                                        <div class="service_title">
                                                            <h3>
                                                                <?php
                                                                    echo esc_attr( $content['sparkconstructionlite_cnt_sec_title'] );
                                                                ?>
                                                            </h3>
                                                        </div><!-- .service_title -->
                                                    </div><!-- .content_holder -->
                                                    <?php
                                                }
                                            ?>
                                        </div><!-- .what_we_offer_block.itemgrid_block -->
                                    </div>
                                <?php
                            }
                        ?>
                    </div><!-- .row -->
                </div><!-- .section_content -->
            </div><!-- .spc_container -->
            <div class="thin_mask"></div><!-- .thin_mask -->
        </div><!-- .section_inner -->
    </section><!-- .spc_general_section.spc_counter_Section -->
    <?php
    }
?>