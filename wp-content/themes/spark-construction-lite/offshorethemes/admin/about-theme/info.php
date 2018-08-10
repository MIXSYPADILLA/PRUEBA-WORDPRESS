<?php
/**
 * Info setup
 *
 * @package Spark Construction Lite
 */

if ( ! function_exists( 'spark_construction_lite_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function spark_construction_lite_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is a Multipurpose WordPress Theme which is designed and developed targetting agencies and companies which deal with construction, renovation, architecture design, engineering etc. It has beautiful, elegant and attractive design and meets the need to build constuction and related field’s websites. It is based on customizer from where you can easily customize your site. It has reponsive design, cross browser compatible, and is developed with respect to WordPress Standards. It is compatible with plugin Contact Form 7 , is translation ready and SEO friendly. Although the theme targets construction houses, it can be used for corporate and business websites.', 'spark-construction-lite' ), 'Spark Construction Lite' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'spark-construction-lite' ),
				'support'         => esc_html__( 'Support', 'spark-construction-lite' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'spark-construction-lite' ),
				'demo-content'    => esc_html__( 'Demo Content', 'spark-construction-lite' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'spark-construction-lite' ),
			),

			// Quick links.
			'quick_links' => array(

				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'spark-construction-lite' ),
					'url'  => 'https://offshorethemes.com/wordpress-themes/spark-construction-lite/',
				),

				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'spark-construction-lite' ),
					'url'  => 'https://offshorethemes.com/demo/sparkconstructionlite/',
				),

				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'spark-construction-lite' ),
					'url'  => 'https://offshorethemes.com/docs/sparkconstruction/',
				),

				'rating_url' => array(
					'text' => esc_html__( 'Rate This Theme','spark-construction-lite' ),
					'url'  => 'https://wordpress.org/support/theme/spark-construction-lite/reviews/#new-post',
				),

				'upgrade_to_pro' => array(
					'text' => esc_html__( 'Buy Pro Themes','spark-construction-lite' ),
					'url'  => 'https://offshorethemes.com/wordpress-themes/spark-construction-pro/',
				)

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'spark-construction-lite' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'spark-construction-lite' ),
					'button_text' => esc_html__( 'View Documentation', 'spark-construction-lite' ),
					'button_url'  => 'https://offshorethemes.com/docs/sparkconstruction/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'spark-construction-lite' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'spark-construction-lite' ),
					'button_text' => esc_html__( 'Customize', 'spark-construction-lite' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'spark-construction-lite' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'spark-construction-lite' ), esc_html__( 'One Click Demo Import', 'spark-construction-lite' ) ),
					'button_text' => esc_html__( 'Demo Content', 'spark-construction-lite' ),
					'button_url'  => admin_url( 'themes.php?page=spark-construction-lite-info&tab=demo-content' ),
					'button_type' => 'secondary',
					)
				
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'spark-construction-lite' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'spark-construction-lite' ),
					'button_text' => esc_html__( 'Contact Support', 'spark-construction-lite' ),
					'button_url'  => 'https://offshorethemes.com/forum/wordpress-themes/spark-construction-lite/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'spark-construction-lite' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'spark-construction-lite' ),
					'button_text' => esc_html__( 'View Documentation', 'spark-construction-lite' ),
					'button_url'  => 'https://offshorethemes.com/docs/sparkconstruction/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'spark-construction-lite' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'spark-construction-lite' ),
					'button_text' => esc_html__( 'Learn More', 'spark-construction-lite' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'spark-construction-lite' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'spark-construction-lite' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'spark-construction-lite' ) . '</a>' ),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'spark-construction-lite' ),
				'button_text' => esc_html__( 'Buy Pro Themes', 'spark-construction-lite' ),
				'button_url'  => 'https://offshorethemes.com/wordpress-themes/spark-construction-pro/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Spark_Construction_Lite_::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'spark_construction_lite_info_setup' );
