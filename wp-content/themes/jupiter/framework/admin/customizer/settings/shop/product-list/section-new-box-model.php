<?php
/**
 * Add Box section of Product List > Styles.
 * Prefix: s -> shop, pl -> product-list, s -> styles
 *
 * @package WordPress
 * @subpackage Jupiter
 * @since 5.9.4
 */

$wp_customize->add_section( 'mk_s_pl_s_new_box_model', array(
		'title' => __( 'New Box Model', 'mk_framework' ),
		'priority' => 1,
		'active_callback' => array( $this, 'hide_sections' ),
		'type' => array(
			'mk-dialog',
			'mk_s_pl_dialog',
		),
	)
);

// Label 1.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_1' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_1',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Only Margin', 'mk_framework' ),
		)
	)
);

// Box Model 1.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_1', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_1',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'padding' => 0,
			),
		)
	)
);

// Label 2.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_2' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_2',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Top Margin', 'mk_framework' ),
		)
	)
);

// Box Model 2.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_2', array(
	'default' => array(
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_2',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'padding' => 0,
				'margin_top' => 0,
			),
		)
	)
);

// Label 3.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_3' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_3',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Right Margin', 'mk_framework' ),
		)
	)
);

// Box Model 3.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_3', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_3',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'padding' => 0,
				'margin_right' => 0,
			),
		)
	)
);

// Label 4.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_4' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_4',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Bottom Margin', 'mk_framework' ),
		)
	)
);

// Box Model 4.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_4', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_4',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'padding' => 0,
				'margin_bottom' => 0,
			),
		)
	)
);

// Label 5.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_5' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_5',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Left Margin', 'mk_framework' ),
		)
	)
);

// Box Model 5.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_5', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_5',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'padding' => 0,
				'margin_left' => 0,
			),
		)
	)
);

// Label 6.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_6' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_6',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Top Padding', 'mk_framework' ),
		)
	)
);

// Box Model 6.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_6', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_6',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'margin' => 0,
				'padding_top' => 0,
			),
		)
	)
);

// Label 7.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_7' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_7',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Right Padding', 'mk_framework' ),
		)
	)
);

// Box Model 7.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_7', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_7',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'margin' => 0,
				'padding_right' => 0,
			),
		)
	)
);

// Label 8.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_8' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_8',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Bottom Padding', 'mk_framework' ),
		)
	)
);

// Box Model 8.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_8', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_8',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'margin' => 0,
				'padding_bottom' => 0,
			),
		)
	)
);

// Label 9.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_9' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_9',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Left Padding', 'mk_framework' ),
		)
	)
);

// Box Model 9.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_9', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_9',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'margin' => 0,
				'padding_left' => 0,
			),
		)
	)
);

// Label 10.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_10' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_10',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Only Padding', 'mk_framework' ),
		)
	)
);

// Box Model 10.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_10', array(
	'default' => array(
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_10',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'margin' => 0,
				'margin_top'     => 0,
				'margin_right'   => 0,
				'margin_bottom'  => 0,
				'margin_left'    => 0,
			),
		)
	)
);

// Label 11.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_11' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_11',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'All Enabled', 'mk_framework' ),
		)
	)
);

// Box Model 11.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_11', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_11',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
		)
	)
);

// Label 12.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_label_12' );

$wp_customize->add_control(
	new MK_Label_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_label_12',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'label' => __( 'Disabled Left Margin and Right Padding', 'mk_framework' ),
		)
	)
);

// Box Model 12.
$wp_customize->add_setting( 'cs_pl_s_new_box_model_12', array(
	'default' => array(
		'margin_top'     => 0,
		'margin_right'   => 0,
		'margin_bottom'  => 0,
		'margin_left'    => 0,
		'padding_top'    => 0,
		'padding_right'  => 0,
		'padding_bottom' => 0,
		'padding_left'   => 0,
	),
	'transport' => 'postMessage',
) );

$wp_customize->add_control(
	new MK_Box_Model_Control(
		$wp_customize,
		'cs_pl_s_new_box_model_12',
		array(
			'section' => 'mk_s_pl_s_new_box_model',
			'column'  => 'mk-col-12',
			'disabled'  => array(
				'margin_left' => 0,
				'padding_right' => 0,
			),
		)
	)
);
