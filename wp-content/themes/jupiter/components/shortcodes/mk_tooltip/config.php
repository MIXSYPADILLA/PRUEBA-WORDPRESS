<?php

extract(shortcode_atts(array(
    'text' => '',
    'tooltip_text' => '',
    'href' => '#!',
    'visibility' => '',
    'el_class' => ''
) , $atts));
Mk_Static_Files::addAssets('mk_tooltip');