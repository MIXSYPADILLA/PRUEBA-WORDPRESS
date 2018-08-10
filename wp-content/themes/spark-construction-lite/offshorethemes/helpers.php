<?php
/**
 * Helper Functions
 *
 * @package sparkconstructionlite
 */

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'sparkconstructionlite_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function sparkconstructionlite_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'spark-construction-lite')) {
            $fonts[] = 'Montserrat:300,400,500,500i,600,700,800';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;

/**
 * Funtion For Fallback
 */
if( !function_exists( 'sparkconstructionlite_primary_menu_fallback' ) ) {
    /**
     * Return Fallback Navigation Menu
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function sparkconstructionlite_primary_menu_fallback() {
        ?>
        <div class="primary-menu-container">
            <ul id="primary_nav" class="primary_nav">
                <?php wp_list_pages( array( 'title_li' => '' ) ); ?>
            </ul>
        </div>
        <?php
    }
}


if( !function_exists( 'sparkconstructionlite_postmeta' ) ) {

    function sparkconstructionlite_postmeta( $author, $date, $category ) {

        $enable_post_date = sparkconstructionlite_get_option( 'sparkconstructionlite_date_meta' );

        $enable_author_name = sparkconstructionlite_get_option( 'sparkconstructionlite_author_meta' );

        $enable_category = sparkconstructionlite_get_option( 'sparkconstructionlite_category_meta' );

        if( $enable_post_date == 1 || $enable_author_name == 1 || $enable_category == 1 ){
    ?>
        <div class="single_meta">
            <ul class="meta_list">
                <?php
                    
                    if( $enable_author_name == 1 && $author == true ) { ?>

                            <li class="author_name">
                                <?php sparkconstructionlite_get_author(); ?>
                            </li>

                        <?php
                    }

                    if( $enable_post_date == 1 && $date == true ) { ?>

                            <li class="posted_date">
                                <?php sparkconstructionlite_get_post_date(); ?>
                            </li>

                        <?php
                    }

                    if( $enable_category == 1 && $category == true ) { ?>

                            <li class="posted_category">
                                <?php sparkconstructionlite_get_categories(); ?>
                            </li>

                        <?php
                    }                    
                ?>
            </ul>
        </div>
    <?php }

    }
}
