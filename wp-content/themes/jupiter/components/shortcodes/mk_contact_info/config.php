<?php

extract( shortcode_atts( array(
	'title' 	 => '',
	'phone' 	 => '',
	'fax' 		 => '',
	'email' 	 => '',
	'address' 	 => '',
	'website' 	 => '',
	'company' 	 => '',
	'person' 	 => '',
	'skype'		 => '',
	'visibility' => '',
	'el_class' 	 => ''
), $atts ) );
Mk_Static_Files::addAssets('mk_contact_info');