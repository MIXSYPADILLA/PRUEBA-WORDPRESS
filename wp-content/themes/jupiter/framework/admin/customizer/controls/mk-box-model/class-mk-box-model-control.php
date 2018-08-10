<?php
/**
 * Customize API: MK_Box_Model_Control class
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

/**
 * Customize Box Model Control class.
 *
 * @since 5.9.4
 *
 * @see MK_Control
 */
class MK_Box_Model_Control extends MK_Control {

	/**
	 * Control type
	 *
	 * @var string $type
	 */
	public $type = 'mk-box-model';

	/**
	 * Control type
	 *
	 * @var array $disabled
	 */
	public $disabled = array();

	/**
	 * Control type
	 *
	 * @var boolean $is_single
	 */
	public $is_single = false;

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		wp_enqueue_style( $this->type . '-control', THEME_CUSTOMIZER_URI . '/controls/' . $this->type . '/styles.css' );
		wp_enqueue_script( $this->type . '-control', THEME_CUSTOMIZER_URI . '/controls/' . $this->type . '/scripts.js' );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
		$current_value = mk_maybe_json_decode( $this->value() );
		?>
		<div class="mk-control-wrap mk-control-box-model">
			<div class="mk-box-model">
				
				<?php
				if ( ! array_key_exists( 'margin', $this->disabled ) && ! array_key_exists( 'padding', $this->disabled ) ) {
					$this->render_margin( $current_value );
					$this->render_padding( $current_value );
				} elseif ( ! array_key_exists( 'margin', $this->disabled ) ) {
					$this->is_single = true;
					$this->render_margin( $current_value );
				} elseif ( ! array_key_exists( 'padding', $this->disabled ) ) {
					$this->is_single = true;
					$this->render_padding( $current_value );
				}
				?>

			</div>
			<input class="mk-box-model-value" type="hidden" value="<?php echo esc_attr( mk_maybe_json_encode( $this->value() ) ); ?>" <?php $this->link(); ?> />
		</div>
		<?php
	}

	/**
	 * Render padding.
	 *
	 * @param mixed $current_value method argument.
	 */
	public function render_margin( $current_value ) {
		$class = 'md';
		$extra_class = '';
		if ( true === $this->is_single ) {
			$class = 'sm';
			$extra_class = ' mk-box-model-sm--left';
		}

		?>
		<div class="mk-box-model-<?php echo esc_attr( $class . $extra_class ); ?>">
			<span class="mk-box-model-<?php echo esc_attr( $class ); ?>-title"><?php esc_html_e( 'Margin', 'mk_framework' ); ?></span>
			<?php
			$margins = array(
				'margin_top',
				'margin_right',
				'margin_bottom',
				'margin_left',
			);
			foreach ( $margins as $margin ) {
				$input_attrs = array(
					'name' => $margin,
					'class' => 'mk-box-model-' . $class . str_replace( 'margin_', '-', $margin ) . '-val',
				);
				$input_field = array(
					'link' => $this->id . '-' . $margin,
					'input_type' => 'number',
					'value' => isset( $current_value->{$margin} ) ? $current_value->{$margin} : '',
				);
				if ( array_key_exists( $margin , $this->disabled ) ) {
					$input_attrs['disabled'] = 'disabled';
					$input_field['value'] = isset( $this->disabled[ $margin ] ) ? $this->disabled[ $margin ] : '';
				}
				$input_field['input_attrs'] = $input_attrs;
				$this->render_input( $input_field );
			}
			?>
			
		</div>	
		<?php
	}

	/**
	 * Render padding.
	 *
	 * @param mixed $current_value method argument.
	 */
	public function render_padding( $current_value ) {
		$class = 'sm';
		$extra_class = ( true === $this->is_single ) ? ' mk-box-model-sm--left' : '';

		?>
		<div class="mk-box-model-<?php echo esc_attr( $class . $extra_class ); ?>">
			<span class="mk-box-model-<?php echo esc_attr( $class ); ?>-title"><?php esc_html_e( 'Padding', 'mk_framework' ); ?></span>
			<?php
			$paddings = array(
				'padding_top',
				'padding_right',
				'padding_bottom',
				'padding_left',
			);
			foreach ( $paddings as $padding ) {
				$input_attrs = array(
					'name' => $padding,
					'class' => 'mk-box-model-' . $class . str_replace( 'padding_', '-', $padding ) . '-val',
					'min' => 0,
				);
				$input_field = array(
					'link' => $this->id . '-' . $padding,
					'input_type' => 'number',
					'value' => isset( $current_value->{$padding} ) ? $current_value->{$padding} : '',
				);
				if ( array_key_exists( $padding , $this->disabled ) ) {
					$input_attrs['disabled'] = 'disabled';
					$input_field['value'] = isset( $this->disabled[ $padding ] ) ? $this->disabled[ $padding ] : '';
				}
				$input_field['input_attrs'] = $input_attrs;
				$this->render_input( $input_field );
			}
			?>
		</div>	
		<?php
	}
}
