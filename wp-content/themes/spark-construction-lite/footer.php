<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sparkconstructionlite
 */

?>

	<div class="searchbox">
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fa fa-times"></i>
                        </span>
                    </button><!-- .close -->
                    <?php
                    	get_search_form();
                    ?>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog.modal-lg -->
        </div><!-- .modal.fade.bs-example-modal-lg -->
    </div><!-- .searchbox -->
        
    <?php if( is_active_sidebar( 'footer' ) ) : ?>
        <footer id="footer">
            <div id="footer-widgets" class="spc_container style-1">
                <div class="row">
                    <?php
                        dynamic_sidebar( 'footer' );
                    ?>
                </div><!-- .row -->
            </div><!-- #footer-widgets.spc_container.style-1 -->
        </footer><!-- #footer -->
    <?php endif; ?>

    <div class="footer_bottom">
        <div class="spc_container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <p>
                        <?php do_action( 'sparkconstructionlite_copyright', 5 ); ?> <?php the_privacy_policy_link(); ?>
                    </p>
                </div>
            </div>                   
        </div><!-- .spc_container -->
    </div><!-- .footer_bottom -->

<?php wp_footer(); ?>

</body>
</html>
