<?php
/**
 * Add customizer selective refresh
 *
 * @since 1.2.1
 *
 * @param $wp_customize
 */
function sparkconstructionlite_customizer_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    $selective_refresh_keys = array(
        // Section Slider
        array(
            'id' => 'slider',
            'selector' => '',
            'settings' => array(
                'sparkconstructionlite_enable_banner',
                'sparkconstructionlite_enable_banner_cap',
                'sparkconstructionlite_banner_selection',
            ),
        ),

        // Section About
        array(
            'id' => 'about',
            'selector' => '.spc_who_we_are',
            'settings' => array(
                'sparkconstructionlite_enable_abt_sec',
                'sparkconstructionlite_abt_sec_title',
                'sparkconstructionlite_abt_sec_subtitle',
                'sparkconstructionlite_abt_sec_vidlink',
                'sparkconstructionlite_abt_sec_pages',
            ),
        ),

        // Section Offer
        array(
            'id' => 'offer',
            'selector' => '.spc_what_we_offers',
            'settings' => array(
                'sparkconstructionlite_enable_off_sec',
                'sparkconstructionlite_off_sec_title',
                'sparkconstructionlite_off_sec_subtitle',
                'sparkconstructionlite_off_page_selection',
            ),
        ),

        // Section Counter
        array(
            'id' => 'counter',
            'selector' => '.spc_counter_Section',
            'settings' => array(
                'sparkconstructionlite_enable_cnt_sec',
                'sparkconstructionlite_cnt_sec_background',
                'sparkconstructionlite_cnt_sec_content',
            ),
        ),

        // Section Team
        array(
            'id' => 'team',
            'selector' => '',
            'settings' => array(
                'sparkconstructionlite_enable_team_sec',
                'sparkconstructionlite_team_sec_title',
                'sparkconstructionlite_team_sec_subtitle',
                'sparkconstructionlite_team_page_selection',
            ),
        ),

        // Section Blog
        array(
            'id' => 'blog',
            'selector' => '.spc_section_blog',
            'settings' => array(
                'sparkconstructionlite_enable_blog_sec',
                'sparkconstructionlite_blog_sec_title',
                'sparkconstructionlite_blog_sec_subtitle',
                'sparkconstructionlite_blog_sec_post_no',
                'sparkconstructionlite_blog_sec_all_title',
                'sparkconstructionlite_blog_sec_all_link',
                'sparkconstructionlite_blog_sec_content',
            ),
        ),

        // Section Testimonial
        array(
            'id' => 'testimonial',
            'selector' => '',
            'settings' => array(
                'sparkconstructionlite_enable_testi_sec',
                'sparkconstructionlite_testi_sec_title',
                'sparkconstructionlite_testi_sec_subtitle',
                'sparkconstructionlite_testi_page_selection',
            ),
        ),

        // Section CTA
        array(
            'id' => 'cta',
            'selector' => '.spc_cta',
            'settings' => array(
                'sparkconstructionlite_enable_cta_sec',
                'sparkconstructionlite_cta_page',
                'sparkconstructionlite_cta_sec_btn_title',
                'sparkconstructionlite_cta_sec_btn_link',
            ),
        ),

        // Section CTA
        array(
            'id' => 'partner',
            'selector' => '.spc_our_partners',
            'settings' => array(
                'sparkconstructionlite_enable_part_sec',
                'sparkconstructionlite_part_sec_title',
                'sparkconstructionlite_part_sec_subtitle',
                'sparkconstructionlite_part_content_selection',
            ),
        ),
    );

    $selective_refresh_keys = apply_filters( 'sparkconstructionlite_customizer_partials_selective_refresh_keys', $selective_refresh_keys );

    foreach ( $selective_refresh_keys as $section ) {
        foreach ( $section['settings'] as $key ) {
            if ( $wp_customize->get_setting( $key ) ) {
                $wp_customize->get_setting( $key )->transport = 'postMessage';
            }
        }

        $wp_customize->selective_refresh->add_partial( 'section-'.$section['id'] , array(
            'selector' => $section['selector'],
            'settings' => $section['settings'],
            'render_callback' => '__return_false',
        ));
    }

    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector'        => '.site-title a',
        'render_callback' => 'sparkconstructionlite_customize_partial_blogname',
    ) );
    
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector'        => '.site-description',
        'render_callback' => 'sparkconstructionlite_customize_partial_blogdescription',
    ) );

}
add_action( 'customize_register', 'sparkconstructionlite_customizer_partials', 199 );