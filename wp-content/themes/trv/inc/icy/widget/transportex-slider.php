<?php
add_action('admin_enqueue_scripts', 'transportex_slider_widget_scripts');

function transportex_slider_widget_scripts() {    

    wp_enqueue_media();

    wp_enqueue_script('transportex_slider_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);

}

class transportex_slider_widget extends WP_Widget {    

    public function __construct() {
        parent::__construct(
            'transportex_slider-widget',
            __( 'Tx - Slider Widget', 'transportex' )
        );
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
        
		$transportex_btnone_target = '_self';
        if( !empty($instance['open_btnone_new_window']) ):
            $transportex_btnone_target = '_blank';
        endif;

        $transportex_btntwo_target = '_self';
        if( !empty($instance['open_btntwo_new_window']) ):
            $transportex_btntwo_target = '_blank';
        endif;

        ?>
    <div class="item">
        <figure>
            <?php if( !empty($instance['image_uri']) ): ?>

                    <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo apply_filters('widget_title', $instance['name']); ?>" />

                <?php else:

                    echo '<img src="'.esc_url( get_template_directory_uri() ).'/images/slide/slide.jpg" class="img-responsive" alt="'.apply_filters('widget_title', $instance['name']).'" />'; 
                
                endif; ?>
        </figure>
		
        
      <div class="ta-slider-inner">
        <div class="container inner-table">
          <div class="inner-table-cell">
            <div class="slide-caption slide-center">
             <div class="slide-inner">
			   <?php if ( !empty($instance['slider_title']) ): ?>
                <h1><?php echo apply_filters('widget_title', $instance['slider_title']); ?></h1>
                <?php endif; ?>
              <div class="description">
				<?php if ( !empty($instance['slider_desc']) ): ?>
                <p><?php echo apply_filters('widget_title', $instance['slider_desc']); ?></p>
                <?php endif; ?>
              </div>
              <?php if ( !empty($instance['btnonelink']) ): ?>
                <a class="btn btn-tislider"  href="<?php echo apply_filters('widget_title', $instance['btnonelink']); ?>" target="<?php echo $transportex_btnone_target; ?>"><?php echo apply_filters('widget_title', $instance['btnone']); ?></a>
                <?php endif; ?>  
                </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['slider_page'] = ( ! empty( $new_instance['slider_page'] ) ) ? $new_instance['slider_page'] : '';
        $instance['hide_image'] = isset($new_instance['hide_image']) ? $new_instance['hide_image'] : '';
        
        $instance['btnone'] = stripslashes(wp_filter_post_kses($new_instance['btnone']));
		$instance['slider_title'] = stripslashes(wp_filter_post_kses($new_instance['slider_title']));
		$instance['slider_desc'] = stripslashes(wp_filter_post_kses($new_instance['slider_desc']));
		$instance['btnonelink'] = stripslashes(wp_filter_post_kses($new_instance['btnonelink']));
        $instance['open_btnone_new_window'] = strip_tags($new_instance['open_btnone_new_window']);
        $instance['btntwo'] = stripslashes(wp_filter_post_kses($new_instance['btntwo']));
		$instance['image_uri'] = strip_tags($new_instance['image_uri']);

        $transportex_btnone_target = '_self';
        if( !empty($instance['open_btnone_new_window']) ):
            $transportex_btnone_target = '_blank';
        endif;


        return $instance;

    }

    function form($instance) { ?>
    
				<div style="width: 100%;">
				</div>	
				<td>
                    <label for="<?php echo $this->get_field_id('slider_title'); ?>"><?php _e('Slider Title', 'transportex'); ?></label>
                </td>
				<td>
                    <input type="text" name="<?php echo $this->get_field_name('slider_title'); ?>" id="<?php echo $this->get_field_id('slider_title'); ?>" value="<?php if( !empty($instance['slider_title']) ): echo htmlspecialchars_decode($instance['slider_title']); endif; ?>" class="widefat"/>
                </td>
				
				<td>
                    <label for="<?php echo $this->get_field_id('slider_desc'); ?>"><?php _e('Slider Description', 'transportex'); ?></label>
                </td>
				<td>
                    <input type="text" name="<?php echo $this->get_field_name('slider_desc'); ?>" id="<?php echo $this->get_field_id('slider_desc'); ?>" value="<?php if( !empty($instance['slider_desc']) ): echo htmlspecialchars_decode($instance['slider_desc']); endif; ?>" class="widefat"/>
                </td>
				<p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'transportex'); ?></label><br/>

            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'transportex' ).'" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_team" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','transportex'); ?>" style="margin-top:5px;">
        </p>
        <table>
			<tr>
                <td style="width: 50%;">
                    <label for="<?php echo $this->get_field_id('btnone'); ?>"><?php _e('Button One Label', 'transportex'); ?></label>
                </td>
                <td>
                    <label for="<?php echo $this->get_field_id('btnonelink'); ?>"><?php _e('Button One Link', 'transportex'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('btnone'); ?>" id="<?php echo $this->get_field_id('btnone'); ?>" value="<?php if( !empty($instance['btnone']) ): echo htmlspecialchars_decode($instance['btnone']); endif; ?>" class="widefat"/>
                </td>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('btnonelink'); ?>" id="<?php echo $this->get_field_id('btnonelink'); ?>" value="<?php if( !empty($instance['btnonelink']) ): echo $instance['btnonelink']; endif; ?>" class="widefat"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="<?php echo $this->get_field_name('open_btnone_new_window'); ?>" id="<?php echo $this->get_field_id('open_btnone_new_window'); ?>" <?php if( !empty($instance['open_btnone_new_window']) ): checked( (bool) $instance['open_btnone_new_window'], true ); endif; ?> ><?php _e( 'Open Button One Link in new window?','transportex' ); ?>
                </td>
            </tr>
        </table>
    <?php

    }

}