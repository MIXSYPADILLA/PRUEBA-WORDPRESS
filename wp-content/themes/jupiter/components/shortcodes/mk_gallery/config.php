<?php
extract(shortcode_atts(array(
    "images"            => '',
    'title'             => '',
    'style'             => 'grid',
    'collection_title'  => '',
    'margin_bottom'     => '20',
    "height"            => 500,
    "column"            => 3,
    "el_class"          => '',
    'disable_title'     => 'false',
    'custom_links'      => '',
    'frame_style'       => 'simple',
    'hover_scenarios'   => 'fadebox',
    'overlay_color'     => '',
    'orderby'           => 'date',
    //'image_quality'     => 1,
    'item_spacing'      => 8,
    'order'             => 'ASC',
    'pagination'        => 'false',
    'pagination_style'  => 1,
    'image_size'        => 'crop',
    'item_id'           => '',
    'count'             => 10,
    'lazyload'          => 'false',
    'disable_lazyload'  => 'false',
	'visibility' 		=> ''
), $atts));
Mk_Static_Files::addAssets('mk_gallery');