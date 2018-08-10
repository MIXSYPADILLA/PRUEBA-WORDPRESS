<?php 
add_action('admin_enqueue_scripts', 'transportex_callaction_widget_scripts');

function transportex_callaction_widget_scripts() {    

    wp_enqueue_media();

}

class transportex_callaction_widget extends WP_Widget{

    public function __construct() {
        parent::__construct(
            'transportex_callaction_widget',
            __( 'Tx - Call To Action Widget', 'transportex' )
        );
    }


    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
		$transportex_btn_target = '_self';
        if( !empty($instance['open_new_window']) ):
            $transportex_btn_target = '_blank';
        endif;
		
		if(($instance['service_page']) !=null) {
		?>
<div class="container">
      <div class="row">
        <div class="ta-callout-inner text-xs text-center">
				<?php if( !empty($instance['name']) ): ?>
                    
                    <h4><?php echo apply_filters('widget_title', $instance['name']); ?></h4>

                <?php endif; ?>
                <?php if( !empty($instance['description']) ): ?>
                    <p>

                    <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['description'])); ?>

                    </p>
                <?php endif; ?>
            <div class="padding-top-20">
					<?php if ( !empty($instance['btn_one_link']) ): ?>
                        <a class="btn btn-theme-two margin-bottom-10" href="<?php echo apply_filters('widget_title', $instance['btn_one_link']); ?>" target="<?php echo $transportex_btn_target; ?>"><?php echo apply_filters('widget_title', $instance['btn_one_more']); ?></a>
                    <?php endif; ?> 

					<?php if ( !empty($instance['btn_two_link']) ): ?>
                        <a class="btn btn-theme-two margin-bottom-10" href="<?php echo apply_filters('widget_title', $instance['btn_two_link']); ?>" target="<?php echo $transportex_btn_target; ?>"><?php echo apply_filters('widget_title', $instance['btn_two_more']); ?></a>
                    <?php endif; ?> 
			</div>
        </div>
	</div>
</div>	

        <?php
		}

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        $instance['name'] = strip_tags($new_instance['name']);
        $instance['description'] = stripslashes(wp_filter_post_kses($new_instance['description']));
		$instance['btn_one_more'] = stripslashes(wp_filter_post_kses($new_instance['btn_one_more']));
        $instance['btn_one_link'] = stripslashes(wp_filter_post_kses($new_instance['btn_one_link']));
		$instance['btn_two_more'] = stripslashes(wp_filter_post_kses($new_instance['btn_two_more']));
        $instance['btn_two_link'] = stripslashes(wp_filter_post_kses($new_instance['btn_two_link']));
        $instance['open_new_window'] = strip_tags($new_instance['open_new_window']);

        return $instance;

    }

    function form($instance) { ?>

	       
			
       
        <table>
			<tr>
               <td>
                    <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Section Title', 'transportex'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" style="width:100%"; name="<?php echo $this->get_field_name('name'); ?>" id="<?php echo $this->get_field_id('name'); ?>" value="<?php if( !empty($instance['name']) ): echo $instance['name']; endif; ?>" class="widefat"/>
                </td>
            </tr>
		</table>
		<table>
		<p>
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Section Description', 'transportex'); ?></label><br/>
            <textarea class="widefat" rows="4" cols="10" name="<?php echo $this->get_field_name('description'); ?>"
                      id="<?php echo $this->get_field_id('description'); ?>"><?php
                if( !empty($instance['description']) ): echo htmlspecialchars_decode($instance['description']); endif;
            ?></textarea>
        </p>
		</table>
		<table>
			
			
			
			
        	<tr>
        		<td>
        			<label for="<?php echo $this->get_field_id('btn_one_more'); ?>"><?php _e('Button Label', 'transportex'); ?></label>
        		</td>
        		<td>
        			<label for="<?php echo $this->get_field_id('btn_one_link'); ?>"><?php _e('Button Link', 'transportex'); ?></label>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<input type="text" name="<?php echo $this->get_field_name('btn_one_more'); ?>" id="<?php echo $this->get_field_id('btn_one_more'); ?>" value="<?php if( !empty($instance['btn_one_more']) ): echo htmlspecialchars_decode($instance['btn_one_more']); endif; ?>" class="widefat"/>
        		</td>
        		<td>
        			<input type="text" name="<?php echo $this->get_field_name('btn_one_link'); ?>" id="<?php echo $this->get_field_id('btn_one_link'); ?>" value="<?php if( !empty($instance['btn_one_link']) ): echo $instance['btn_one_link']; endif; ?>" class="widefat"/>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<span>&nbsp;</span>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<input type="checkbox" name="<?php echo $this->get_field_name('open_new_window'); ?>" id="<?php echo $this->get_field_id('open_new_window'); ?>" <?php if( !empty($instance['open_new_window']) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open Button Link in new window?','transportex' ); ?>
        		</td>
        	</tr>
			
			<!-- Button Two !-->
			<tr>
        		<td>
        			<label for="<?php echo $this->get_field_id('btn_two_more'); ?>"><?php _e('Button Label', 'transportex'); ?></label>
        		</td>
        		<td>
        			<label for="<?php echo $this->get_field_id('btn_two_link'); ?>"><?php _e('Button Link', 'transportex'); ?></label>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<input type="text" name="<?php echo $this->get_field_name('btn_two_more'); ?>" id="<?php echo $this->get_field_id('btn_two_more'); ?>" value="<?php if( !empty($instance['btn_two_more']) ): echo htmlspecialchars_decode($instance['btn_two_more']); endif; ?>" class="widefat"/>
        		</td>
        		<td>
        			<input type="text" name="<?php echo $this->get_field_name('btn_two_link'); ?>" id="<?php echo $this->get_field_id('btn_two_link'); ?>" value="<?php if( !empty($instance['btn_two_link']) ): echo $instance['btn_two_link']; endif; ?>" class="widefat"/>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<span>&nbsp;</span>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<input type="checkbox" name="<?php echo $this->get_field_name('open_new_window'); ?>" id="<?php echo $this->get_field_id('open_new_window'); ?>" <?php if( !empty($instance['open_new_window']) ): checked( (bool) $instance['open_new_window'], true ); endif; ?> ><?php _e( 'Open Button Link in new window?','transportex' ); ?>
        		</td>
        	</tr>
			
        </table>
    <?php
    }
}