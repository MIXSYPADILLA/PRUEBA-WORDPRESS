<?php
extract( shortcode_atts( array(
	'style' 			=> 'multicolor',
	'table_number' 	=> 4,
	'tables' 		=> '',
	'orderby'		=> 'date',
	'order'			=> 'DESC',
	'visibility' 	=> '',
	'el_class' 		=> ''
), $atts ) );
Mk_Static_Files::addAssets('mk_pricing_table');
Mk_Static_Files::addAssets('mk_pricing_table_2');