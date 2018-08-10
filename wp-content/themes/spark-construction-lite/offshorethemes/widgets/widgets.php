<?php
/**
 * Widgets Classes
 *
 * @package Sparkle_Construction_Lite
 */

if ( ! class_exists( 'sparkconstructionlite_Company_Info_Widget' ) ) :
	/**
	* Company Info Widget
	*/
	class sparkconstructionlite_Company_Info_Widget extends WP_Widget
	{
		
		function __construct()
		{
			$opts = array(
				'classname' => 'widget_information',
				'description'	=> esc_html__( 'Company Info', 'spark-construction-lite' )
			);

			parent::__construct( 'sparkconstructionlite-company-info', esc_html__( 'SC: Comapany Info', 'spark-construction-lite' ), $opts );
		}

		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			
			$address = !empty( $instance['address'] ) ? $instance['address'] : '';

			$phone_no = !empty( $instance['phone'] ) ? $instance['phone'] : '';

			$email = !empty( $instance['email'] ) ? $instance['email'] : '';

			$facebook_link = !empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';

			$twitter_link = !empty( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';

			$googleplus_link = !empty( $instance['googleplus_link'] ) ? $instance['googleplus_link'] : '';

			$instagram_link = !empty( $instance['instagram_link'] ) ? $instance['instagram_link'] : '';
			
			$vk_link = !empty( $instance['vk_link'] ) ? $instance['vk_link'] : '';

			$pinterest_link = !empty( $instance['pinterest_link'] ) ? $instance['pinterest_link'] : '';
			
			$linkedin_link = !empty( $instance['linkedin_link'] ) ? $instance['linkedin_link'] : '';

			echo $args[ 'before_widget' ];

				if( !empty( $title ) ) :

					echo $args[ 'before_title' ];

						echo esc_html( $title ); 

					echo $args[ 'after_title' ];
					
				endif;
				?>
			
				<ul>
					<?php
						if( $address ) {
							?>
		                    <li class="address clearfix">
		                        <p class="cih">
		                        	<?php esc_html_e( 'Address: ', 'spark-construction-lite' ); ?>
		                        	<span>
		                        		<?php
		                        			echo esc_attr( $address );
		                        		?>
		                        	</span>
		                       	</p><!-- .cih -->
		                    </li><!-- .address.clearfix -->
		                    <?php
                    	}
                    	if( $phone_no ) {
                    		?>
                    		<li class="phone clearfix">
		                    	<p class="cih">
		                    		<?php esc_html_e( 'Phone: ', 'spark-construction-lite' ); ?>
		                    		<span>
		                    			<?php
		                    				echo esc_attr( $phone_no );
		                    			?>
		                    		</span>
		                    	</p><!-- .cih -->
		                    </li><!-- .phone.clearfix -->
                    		<?php
                    	}
                    	if( $email ) {
                    		?>
                    		<li class="email clearfix">
		                    	<p class="cih">
		                    		<?php esc_html_e( 'Email: ', 'spark-construction-lite' ); ?> 
		                    		<span>
		                    			 <?php echo esc_attr( antispambot( $email ) ); ?>
		                    		</span>
		                    	</p><!-- .cih -->
		                    </li><!-- .email.clearfix -->
                    		<?php
                    	}
                    ?>
                    
                    
                </ul>
                <div class="widget_socials">
                	<div class="socials">
                		<ul class="social_icons_list">
                			<?php
                				if( $facebook_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $facebook_link ); ?>">
		                					<i class="fa fa-facebook" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                		if( $twitter_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $twitter_link ); ?>">
		                					<i class="fa fa-twitter" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                		if( $googleplus_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $googleplus_link ); ?>">
		                					<i class="fa fa-google-plus" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                		if( $vk_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $vk_link ); ?>">
		                					<i class="fa fa-vk" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                		if( $instagram_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $instagram_link ); ?>">
		                					<i class="fa fa-instagram" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                		if( $pinterest_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $pinterest_link ); ?>">
		                					<i class="fa fa-pinterest" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                		if( $linkedin_link ) {
		                			?>
		                			<li>
		                				<a href="<?php echo esc_url( $linkedin_link ); ?>">
		                					<i class="fa fa-linkedin" aria-hidden="true"></i>
		                				</a>
		                			</li>
		                			<?php
		                		}
		                	?>
                        </ul><!-- .social_icons_list -->
                    </div><!-- .socials -->
                </div><!-- .widget_socials -->
				<?php 
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'address' ] = sanitize_text_field( $new_instance[ 'address' ] );
			$instance[ 'phone' ] = sanitize_text_field( $new_instance[ 'phone' ] );
			$instance[ 'email' ] = sanitize_text_field( $new_instance[ 'email' ] );
			$instance[ 'facebook_link' ] = esc_url_raw( $new_instance[ 'facebook_link' ] );
			$instance[ 'twitter_link' ] = esc_url_raw( $new_instance[ 'twitter_link' ] );
			$instance[ 'googleplus_link' ] = esc_url_raw( $new_instance[ 'googleplus_link' ] );
			$instance[ 'vk_link' ] = esc_url_raw( $new_instance[ 'vk_link' ] );
			$instance[ 'instagram_link' ] = esc_url_raw( $new_instance[ 'instagram_link' ] );
			$instance[ 'pinterest_link' ] = esc_url_raw( $new_instance[ 'pinterest_link' ] );
			$instance[ 'linkedin_link' ] = esc_url_raw( $new_instance[ 'linkedin_link' ] );

			return $instance;
		}

		function form( $instance ) {

			$defaults = array(
				'title' => '',
				'address' => '',
				'phone' => '',
				'email' => '',
				'facebook_link' => '',
				'twitter_link' => '',
				'googleplus_link' => '',
				'vk_link' => '',
				'instagram_link' => '',
				'pinterest_link' => '',
				'linkedin_link' => '',
			); 

			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><strong><?php echo esc_html__( 'Address: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" value="<?php echo esc_attr( $instance['address'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><strong><?php echo esc_html__( 'Phone: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" value="<?php echo esc_attr( $instance['phone'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><strong><?php echo esc_html__( 'Email: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="email" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_link' ) ); ?>"><strong><?php echo esc_html__( 'Facebook Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_link' ) ); ?>" value="<?php echo esc_url( $instance['facebook_link'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>"><strong><?php echo esc_html__( 'Twitter Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_link' ) ); ?>" value="<?php echo esc_url( $instance['twitter_link'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'googleplus_link' ) ); ?>"><strong><?php echo esc_html__( 'Google Plus Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'googleplus_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'googleplus_link' ) ); ?>" value="<?php echo esc_url( $instance['googleplus_link'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'vk_link' ) ); ?>"><strong><?php echo esc_html__( 'VK Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'vk_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk_link' ) ); ?>" value="<?php echo esc_url( $instance['vk_link'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_link' ) ); ?>"><strong><?php echo esc_html__( 'Instagram Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_link' ) ); ?>" value="<?php echo esc_url( $instance['instagram_link'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_link' ) ); ?>"><strong><?php echo esc_html__( 'Pinterest Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_link' ) ); ?>" value="<?php echo esc_url( $instance['pinterest_link'] ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin_link' ) ); ?>"><strong><?php echo esc_html__( 'Linkedin Link: ', 'spark-construction-lite' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_link' ) ); ?>" value="<?php echo esc_url( $instance['linkedin_link'] ); ?>" class="widefat">
			</p>
			
			<?php			
		}
	}
endif;