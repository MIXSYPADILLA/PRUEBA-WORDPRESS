<?php $transportex_calltoaction_enable = get_theme_mod('transportex_calltoaction_enable','true');
if($transportex_calltoaction_enable !='false')
{
$transportex_calltoaction_background = get_theme_mod('transportex_calltoaction_background');
$transportex_calltoaction_overlay_color = get_theme_mod('transportex_calltoaction_overlay_color');
$transportex_calltoaction_text_color = get_theme_mod('transportex_calltoaction_text_color');
$transportex_calltoaction_button_one_label = get_theme_mod('transportex_calltoaction_button_one_label','Lets Start');
$transportex_calltoaction_button_one_link = get_theme_mod('transportex_calltoaction_button_one_link','#');
$transportex_calltoaction_button_one_target = get_theme_mod('transportex_calltoaction_button_one_target','true'); ?>
<style>
.ta-calltoaction-box-icon i, .ta-calltoaction-box-info h5, .ta-calltoaction-box-info p {
color: <?php echo $transportex_calltoaction_text_color;
?>;
}
</style>
<!--==================== CALL TO ACTION SECTION ====================-->
<?php if($transportex_calltoaction_background != '') { ?>

<section class="ta-calltoaction wow fadeIn animated" style="background-image:url('<?php echo $transportex_calltoaction_background;?>');">
<?php } else { ?>
<section class="ta-calltoaction wow fadeIn animated">
  <?php } ?>
  <div class="overlay" style="background-color: <?php echo esc_attr($transportex_calltoaction_overlay_color);?>;">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <div class="ta-calltoaction-box-info">
            <?php $transportex_calltoaction_title = get_theme_mod('transportex_calltoaction_title',__('Make A Difference With <span>Expert Team</span>','transportex'));
          
            if( !empty($transportex_calltoaction_title) ):

              echo '<h5>'.$transportex_calltoaction_title.'</h5>';

            endif; ?>
            <?php $transportex_calltoaction_subtitle = get_theme_mod('transportex_calltoaction_subtitle');

            if( !empty($transportex_calltoaction_subtitle) ):

              echo '<p>'.$transportex_calltoaction_subtitle.'</p>';

            endif; ?>
          </div>
        </div>
        <div class="col-md-2 col-sm-4"> <a href="<?php echo $transportex_calltoaction_button_one_link; ?>" <?php if( $transportex_calltoaction_button_one_target == true) { echo "target='_blank'"; } ?>  class="btn btn-theme"> <?php echo $transportex_calltoaction_button_one_label; ?> </a> </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
