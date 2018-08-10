<?php
if (!defined('THEME_FRAMEWORK')) exit('No direct script access allowed');

/**
 * Adds Heading for grouping options
 *
 * @author      Bob Ulusoy
 * @copyright   Artbees LTD (c)
 * @link        http://artbees.net
 * @since       Version 5.1
 * @package     artbees
 */


if (function_exists('mk_add_shortcode_param')) {
    mk_add_shortcode_param('group_heading', 'mk_group_heading_param_field');
}


function mk_group_heading_param_field($settings, $value) {
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    
    $style = isset($settings['style']) ? $settings['style'] : '';
    $title = isset($settings['title']) ? $settings['title'] : '';
    $type = isset($settings['type']) ? $settings['type'] : '';
    $output = '';
    
    $output.= '<div class="mk-param-heading" style="' . $style . '" >';
    $output.= $title;
    $output.= '<input name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '" type="hidden" value="' . $value . '"/>';
    $output.= '</div>';
    
    return $output;
}