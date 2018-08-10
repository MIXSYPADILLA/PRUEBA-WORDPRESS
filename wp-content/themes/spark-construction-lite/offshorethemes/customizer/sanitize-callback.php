<?php
/**
 * Sanitization Functions
 *
 * @package sparkconstructionlite
 */

/**
 * Sanitization Function - Checkbox
 * 
 * @param $checked
 * @return bool
 */
if( !function_exists( 'sparkconstructionlite_sanitize_checkbox' ) ) :

	function sparkconstructionlite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;


/**
 * Sanitization Function - Dropdown-pages
 *
 * @param $page_id
 * @param $setting
 * @return sanitized output
 */
if( !function_exists( 'sparkconstructionlite_sanitize_dropdown_pages' ) ) :

	function sparkconstructionlite_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

endif;

/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('sparkconstructionlite_sanitize_select') ) :

	function sparkconstructionlite_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	
endif;

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('sparkconstructionlite_sanitize_number') ) :

	function sparkconstructionlite_sanitize_number( $input, $setting ) {

		$number = absint( $input );

		// If the input is a positibe number, return it; otherwise, return the default.
		return ( $number ? $number : $setting->default );
	}
	
endif;


/**
 * Sanitization Function - Repeater
 *
 * @param $input
 * @return sanitized input
 *
 */
if ( !function_exists('sparkconstructionlite_sanitize_repeater') ) :


    function sparkconstructionlite_repeater_data_field( $input , $setting ){
        
        $control = $setting->manager->get_control( $setting->id );

        $fields = $control->fields;
        if ( is_string( $input ) ) {
            $input = json_decode( wp_unslash( $input ) , true );
        }
        $data = wp_parse_args( $input, array() );

        if ( ! is_array( $data ) ) {
            return false;
        }
        if ( ! isset( $data['_items'] ) ) {
            return  false;
        }
        $data = $data['_items'];

        foreach( $data as $i => $item_data ){
            foreach( $item_data as $id => $value ){

                if ( isset( $fields[ $id ] ) ){
                    switch( strtolower( $fields[ $id ]['type'] ) ) {
                        case 'number':
                            $data[ $i ][ $id ] = absint( $value );
                            break;
                        case 'text':
                            $data[ $i ][ $id ] = sanitize_text_field( $value );
                            break;
                        case 'textarea':
                        case 'editor':
                            $data[ $i ][ $id ] = wp_kses_post( $value );
                            break;
                        case 'color':
                            $data[ $i ][ $id ] = sanitize_hex_color_no_hash( $value );
                            break;
                        case 'url':
                            $data[ $i ][ $id ] = esc_url_raw( $value );
                            break;
                        case 'coloralpha':
                            $data[ $i ][ $id ] = onepress_sanitize_color_alpha( $value );
                            break;
                        case 'checkbox':
                            $data[ $i ][ $id ] =  onepress_sanitize_checkbox( $value );
                            break;
                        case 'select':
                            $data[ $i ][ $id ] = '';
                            if ( is_array( $fields[ $id ]['options'] ) && ! empty( $fields[ $id ]['options'] ) ){
                                // if is multiple choices
                                if ( is_array( $value ) ) {
                                    foreach ( $value as $k => $v ) {
                                        if ( isset( $fields[ $id ]['options'][ $v ] ) ) {
                                            $value [ $k ] =  $v;
                                        }
                                    }
                                    $data[ $i ][ $id ] = $value;
                                }else { // is single choice
                                    if (  isset( $fields[ $id ]['options'][ $value ] ) ) {
                                        $data[ $i ][ $id ] = $value;
                                    }
                                }
                            }

                            break;
                        case 'radio':
                            $data[ $i ][ $id ] = sanitize_text_field( $value );
                            break;
                        case 'media':
                            $value = wp_parse_args( $value,
                                array(
                                    'url' => '',
                                    'id'=> false
                                )
                            );
                            $value['id'] = absint( $value['id'] );
                            $data[ $i ][ $id ]['url'] = sanitize_text_field( $value['url'] );

                            if ( $url = wp_get_attachment_url( $value['id'] ) ) {
                                $data[ $i ][ $id ]['id']   = $value['id'];
                                $data[ $i ][ $id ]['url']  = $url;
                            } else {
                                $data[ $i ][ $id ]['id'] = '';
                            }

                            break;
                        default:
                            $data[ $i ][ $id ] = wp_kses_post( $value );
                    }

                }else {
                    $data[ $i ][ $id ] = wp_kses_post( $value );
                }

                if ( count( $data[ $i ] ) !=  count( $fields ) ) {
                    foreach ( $fields as $k => $f ){
                        if ( ! isset( $data[ $i ][ $k ] ) ) {
                            $data[ $i ][ $k ] = '';
                        }
                    }
                }

            }
        }

        return $data;
    }

endif;

