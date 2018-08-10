<?php
/**
 * Helper functions for dynamic styles.
 *
 * @package Jupiter
 * @subpackage MK_Customizer
 * @since 5.9.4
 */

/**
 * Typography helper for dynamic styles.
 *
 * @param string $setting  Customizer control setting name.
 * @param array  $excludes  Properties field keys to exludes.
 */
function mk_cs_typography( $setting, array $excludes = array() ) {
	$typography = mk_maybe_json_decode( get_theme_mod( $setting ) );
	$css = '';
	$excludes[] = 'source';

	if ( $typography ) {
		foreach ( $typography as $key => $value ) {
			if ( ! in_array( $key, $excludes, true ) ) {
				switch ( $key ) {
					case 'color':
						$css .= $key . ':' . $value . ';';
						break;
					case 'size':
						$css .= 'font-' . $key . ':' . $value . 'px;';
						break;

					default:
						$css .= 'font-' . $key . ':' . $value . ';';
						break;
				}
			}
		}

		// Check and add google fonts to filter.
		if ( ! empty( $typography->source ) && 'google-font' === $typography->source ) {
			add_filter( 'mk_google_fonts', function( $google_fonts ) use ( $typography ) {
				if ( ! in_array( $typography->family, $google_fonts, true ) ) {
					$google_fonts[] = $typography->family;
				}

				return $google_fonts;
			} );
		}
	}
	return $css;
}

/**
 * BoxModel helper for dynamic styles.
 *
 * @param string $setting  Customizer control setting name.
 * @param array  $excludes  Properties field keys to exludes.
 */
function mk_cs_box_model( $setting, array $excludes = array() ) {
	$box_model = mk_maybe_json_decode( get_theme_mod( $setting ) );
	$css = '';
	if ( $box_model ) {
		foreach ( $box_model as $key => $value ) {
			if ( ! in_array( $key, $excludes, true ) ) {
				$css .= str_replace( '_', '-', $key ) . ':' . $value . 'px;';
			}
		}
	}
	return $css;
}
