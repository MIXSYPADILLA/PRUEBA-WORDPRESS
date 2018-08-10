<?php
/**
 * The template for displaying partner section
 *
 * @package sparkconstructionlite
 */
$enable_section = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_part_sec' );
$section_title = sparkconstructionlite_get_option( 'sparkconstructionlite_part_sec_title' );
$section_sub_title = sparkconstructionlite_get_option( 'sparkconstructionlite_part_sec_subtitle' );

$partner_contents = sparkconstructionlite_get_option( 'sparkconstructionlite_part_content_selection' );

if( $enable_section == 1 && !empty( $partner_contents ) ) {
    ?>
    <section class="spc_general_section spc_our_partners">
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
                    <div class="owl-carousel owl-theme partners_carousel">
                        <?php
                            foreach( $partner_contents as $content ) {
                                $partner_id = $content['sparkconstructionlite_part_image']['id'];

                                $partner_link = $content['sparkconstructionlite_part_link'];

                                if( !empty( $partner_id ) ) {

                                    $partner_image = wp_get_attachment_image_src( $partner_id, 'sparkconstructionlite-thumbnail-4' );

                                    $partner_image_attr = get_post( $partner_id );
                                    ?>
                                    <div class="item">
                                        <a href="<?php echo esc_url( $partner_link ); ?>">
                                            <img src="<?php echo esc_url( $partner_image[0] ); ?>" alt="<?php echo esc_attr( $partner_image_attr->post_title ); ?>" class="img-responsive">
                                        </a>
                                    </div><!-- .item -->
                                    <?php
                                }
                            }
                        ?>
                    </div><!-- .owl-carousel.owl-theme.partners_carousel -->
                </div><!-- .section_content -->
            </div><!-- .spc_container -->
        </div><!-- .section_inner -->
    </section><!-- .spc_general_section.spc_our_partners -->
    <?php
}
?>