<?php
/**
 * Customize API: MK_Shop_Control class
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

/**
 * Custom class used to create a shop customizer element
 *
 * @since 5.9.4
 *
 * @see MK_Control
 */
class MK_Dialog_Control extends MK_Control {

	/**
	 * Control type data
	 *
	 * @var string $type
	 */
	public $type = 'mk-dialog';

	/**
	 * List of pages.
	 *
	 * @var array $pages
	 */
	public $pages = [];

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
		echo '<p>Shop Pages</p>';

		$mkfs = new Mk_Fs();

		foreach ( $this->pages as $key => $value ) {

			$icon_path = THEME_CUSTOMIZER_URI . '/assets/icons/' . esc_attr( $key ) . '.svg';

			$icon = $mkfs->get_contents( $icon_path );

			if ( $mkfs->get_error_codes() || ! $icon ) {
				$icon = '<img src="' . $icon_path . '">';
			}

			// @codingStandardsIgnoreLine
			echo '<button type="button" class="button mk-dialog-button" data-dialog="' . esc_attr( $key ) . '">' . $icon . esc_html( $value ) . '</button><div id="' . esc_attr( $key ) . '"></div>';
		}

	}

}

