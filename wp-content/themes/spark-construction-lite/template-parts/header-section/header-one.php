<?php
/**
 * Template part for header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sparkconstructionlite
 */

?>

    <header class="spc_general_header spc_header_layout_one header_wrapper">
        <div class="header_inner header_mask">
            <?php
                $enable_top_header = sparkconstructionlite_get_option( 'sparkconstructionlite_enable_top_header' );
                if( $enable_top_header ) :
                    ?>
                    <div class="header_top_outer">
                        <div class="header_top_inner">
                            <div class="spc_container">
                                <div class="row">
                                    <?php
                                        if( has_nav_menu( 'menu-2' ) ) :
                                    ?>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="header_social">
                                                    <?php
                                                        wp_nav_menu( array(
                                                            'theme_location' => 'menu-2',
                                                            'menu_class' => 'social_icons_list'
                                                        ) );
                                                    ?>
                                                </div><!-- .header_social -->
                                            </div>
                                    <?php
                                        endif;

                                        $company_number = sparkconstructionlite_get_option( 'sparkconstructionlite_tel_phone_no' );
                                        $company_email = sparkconstructionlite_get_option( 'sparkconstructionlite_company_email' );
                                        $company_hour = sparkconstructionlite_get_option( 'sparkconstructionlite_working_hour' );

                                        if( !empty( $company_number ) || !empty( $company_email ) || !empty( $company_hour ) ) :                           
                                    ?>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <div class="header_top_right">
                                                    <ul class="company_extraa_info">
                                                        <?php
                                                            if( !empty( $company_number ) ) :
                                                        ?>
                                                                <li> 
                                                                    <span class="contact_number">
                                                                        <?php echo esc_attr( $company_number ); ?>
                                                                    </span><!-- .contact_number -->
                                                                </li>
                                                        <?php
                                                            endif;
                                                            if( !empty( $company_email ) ) :
                                                        ?>
                                                                <li>
                                                                    <span class="email_address">
                                                                        <?php echo esc_attr( antispambot( $company_email ) ); ?>
                                                                    </span><!-- .email_address -->
                                                                </li>
                                                        <?php
                                                            endif;
                                                            if( !empty( $company_hour ) ) :
                                                        ?>
                                                                <li> 
                                                                    <span class="opening_timing">
                                                                        <?php echo esc_attr( $company_hour ); ?>
                                                                    </span><!-- .opening_timing -->
                                                                </li>
                                                        <?php
                                                            endif;
                                                        ?>
                                                    </ul><!-- .company_extraa_info -->
                                                </div><!-- .header_top_right -->
                                            </div>
                                    <?php
                                        endif;
                                    ?>
                                </div><!-- .row -->
                            </div><!-- .spc_container -->
                        </div><!-- .header_top_inner -->
                    </div><!-- .header_top_outer -->
                    <?php
                endif;
            ?>
            <div class="spc_header_nav_and_logo_holder">
                <div class="nav_and_logo_holder_inner">
                    <div class="spc_container">
                        <div class="row">
                            <div class="col-md-3 col-sm-9 col-xs-9">
                                <?php
                                    if( has_custom_logo() ) :
                                ?>
                                        <div class="logo_holder">
                                            <?php
                                                the_custom_logo();
                                            ?>
                                        </div><!-- .logo_holder -->
                                <?php
                                    else :
                                ?>
                                        <div class="logo_holder">
                                            <h1 class="site-title">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                    <?php 
                                                        bloginfo( 'name' ); 
                                                    ?>
                                                </a>
                                            </h1><!-- .site-title -->
                                            <h5 class="site-description">
                                                <?php 
                                                    bloginfo( 'description' ); /* WPCS: xss ok. */ 
                                                ?>
                                            </h5><!-- .site-description -->
                                        </div><!-- .logo_holder -->
                                <?php
                                    endif;
                                ?>
                            </div>
                            <div class="col-md-9 col-sm-3 col-xs-3">
                                <nav class="primary_navigation">
                                    <?php
                                        wp_nav_menu( array( 
                                            'theme_location' => 'menu-1',
                                            'menu_class' => 'primary_nav',
                                            'menu_id' => 'primary_nav',
                                            'fallback_cb' => 'sparkconstructionlite_primary_menu_fallback', 
                                        ) );
                                    ?>
                                </nav><!-- .primary_navigation -->
                            </div>
                        </div><!-- .row -->
                    </div><!-- .spc_container -->
                </div><!-- .nav_and_logo_holder_inner -->
            </div><!-- .spc_header_nav_and_logo_holder -->
        </div><!-- .header_inner header_mask -->
    </header><!-- .spc_general_header.spc_header_layout_one.header_wrapper -->