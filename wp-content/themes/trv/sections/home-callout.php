<?php $transportex_callout_enable = get_theme_mod('transportex_callout_enable','true');
if($transportex_callout_enable !='false')
{
$transportex_callout_background = get_theme_mod('transportex_callout_background');
$transportex_callout_overlay_color = get_theme_mod('transportex_callout_overlay_color');
$transportex_callout_text_color = get_theme_mod('transportex_callout_text_color');
$transportex_callout_text_align = get_theme_mod('transportex_callout_text_align','center');
$transportex_callout_button_one_label = get_theme_mod('transportex_callout_button_one_label','Buy Now!');
$transportex_callout_button_one_link = get_theme_mod('transportex_callout_button_one_link','#');
$transportex_callout_button_one_target = get_theme_mod('transportex_callout_button_one_target','true');
$transportex_callout_button_two_label = get_theme_mod('transportex_callout_button_two_label','Know More');
$transportex_callout_button_two_link = get_theme_mod('transportex_callout_button_two_link','#');
$transportex_callout_button_two_target = get_theme_mod('transportex_callout_button_two_target','true'); ?>
<style>
.ta-callout .overlay h3, .ta-callout .overlay p { color: <?php echo esc_attr($transportex_callout_text_color); ?>; }
</style>
<!--==================== CALLOUT SECTION ====================-->
<?php if($transportex_callout_background != '') { ?>

<section class="ta-callout" style="background-image:url('<?php echo esc_url($transportex_callout_background);?>');">
<?php } else { ?>
<section class="ta-callout">
  <?php } ?>
  <div class="overlay" style="background-color:<?php echo esc_attr($transportex_callout_overlay_color);?>;">
    <div class="container">
      <div class="row">
        <div class="ta-callout-inner text-xs text-<?php echo $transportex_callout_text_align; ?>">
          <?php $transportex_callout_title = get_theme_mod('transportex_callout_title',__('Reach Your Place Sure & Safe','transportex'));
          
            if( !empty($transportex_callout_title) ):

              echo '<h3>'.$transportex_callout_title.'</h3>';

            endif; ?>
          <?php $transportex_callout_description = get_theme_mod('transportex_callout_description',__('We take care with merchandise and deliver your order where you are on time.','transportex'));

            if( !empty($transportex_callout_description) ):

              echo '<p>'.$transportex_callout_description.'</p>';

            endif; ?>
          <div class="padding-top-20">
          <?php if( !empty($transportex_callout_button_one_label) ): ?>
      		  <a href="<?php echo $transportex_callout_button_one_link; ?>" <?php if( $transportex_callout_button_one_target == true) { echo "target='_blank'"; } ?> class="btn btn-theme-two margin-bottom-10">
      		<?php echo $transportex_callout_button_one_label; ?></a>
      		<?php
      		endif;

          if( !empty($transportex_callout_button_two_label) ): ?>
      		  <a href="<?php echo $transportex_callout_button_two_link; ?>" <?php if( $transportex_callout_button_two_target ==true) { echo "target='_blank'"; } ?> class="btn btn-theme margin-bottom-10"><?php echo $transportex_callout_button_two_label; ?></a>
    		<?php endif; ?>	
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
