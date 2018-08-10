<?php 
if($view_params['is_shortcode']) return false;

$sticky_style = mk_get_option( 'header_sticky_style', 'fixed' );

$is_sticky_false_in_single = ( $sticky_style === 'false' && is_single() );

if ( !$is_sticky_false_in_single && ( $sticky_style == 'false' || is_header_transparent() ) ) return false;

?>
<div class="mk-header-padding-wrapper"></div>
 