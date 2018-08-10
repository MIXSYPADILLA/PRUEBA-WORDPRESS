<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package transportex
 */
get_header(); ?>
<div class="transportex-breadcrumb-section">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="transportex-page-breadcrumb">
              <li><a href="<?php echo esc_url(home_url());?>"><i class="fa fa-home"></i></a></li>
              <li class="active"><a href="#"><?php _e('404','transportex'); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center transportex-section">
        <div class="transportex-error-404">
          <h1><?php _e('4','transportex'); ?><i class="fa fa-times-circle-o"></i><?php _e('4','transportex'); ?></h1>
          <h4><?php esc_html_e('Oops! Page not found','transportex'); ?></h4>
          <p><?php esc_html_e("Sorry, we can't find the page you're looking for. This page has moved or was never here to start with.","transportex"); ?></p>
          <a class="btn btn-theme" href="#"><?php _e('Go Back','transportex'); ?></a> </div>
      </div>
    </div>
  </div>
<?php
get_footer();