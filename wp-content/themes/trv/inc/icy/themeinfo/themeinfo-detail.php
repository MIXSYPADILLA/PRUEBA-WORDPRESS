<?php
/**
 * transportex Admin Class.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'transportex_Admin' ) ) :

/**
 * transportex_Admin Class.
 */
class transportex_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'transportex_admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'transportex_hide_notices' ) );
		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'transportex_activation_admin_notice' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function transportex_admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'About', 'transportex' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'transportex' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'transportex-welcome', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'transportex_enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function transportex_enqueue_styles() {
		global $transportex_version;

		wp_enqueue_style( 'transportex-welcome', get_template_directory_uri() . '/css/themeinfo.css', array(), $transportex_version );
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function transportex_hide_notices() {
		if ( isset( $_GET['transportex-hide-notice'] ) && isset( $_GET['_transportex_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_transportex_notice_nonce'], 'transportex_transportex_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'transportex' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'transportex' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['transportex-hide-notice'] );
		}
	}

	public function transportex_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'transportex_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function transportex_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Transportex 
For the best use of Transportex theme, visit the Wecome page %swelcome page%s.', 'transportex' ), '<a href="' . esc_url( admin_url( 'themes.php?page=transportex-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=transportex-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Transportex', 'transportex' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * transportex_intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function transportex_intro() {
		global $transportex_version;

		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		$major_version = substr( $transportex_version, 0, 3 );
		?>
		<div class="transportex-theme-info">
			<h1>
				<?php esc_html_e('About', 'transportex'); ?>
				<?php echo $theme->display( 'Name' ); ?>
				<?php printf( '%s', $major_version ); ?>
			</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo $theme->display( 'Description' ); ?></div>

				<div class="transportex-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<p class="transportex-actions">
			<a href="<?php echo esc_url( 'https://themeansar.com/themes/transportex/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'transportex' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/transportex/' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'transportex' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/transportex/default/' ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'transportex' ); ?></a>

			<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/transportex/reviews/#new-post' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rating this theme', 'transportex' ); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'transportex-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'transportex-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo $theme->display( 'Name' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'supported_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'transportex-welcome', 'tab' => 'supported_plugins' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Supported Plugins', 'transportex' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'transportex-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs Pro', 'transportex' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->transportex_intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'transportex' ); ?></h3>
						<p><?php esc_html_e( 'Theme Cusomization features availbale in Customizer setting : -   Appearance &#8594; Customize', 'transportex' ) ?></p>
						<p><a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'transportex' ); ?></a></p>
					</div>
					
					<div class="col">
						<h3><?php esc_html_e( 'Home Page Section Widget', 'transportex' ); ?></h3>
						<p><?php esc_html_e( 'Homepage Section Widget like: Tx: Slider widget, Tx: Service widget, Tx: Call to action widget , Tx: Callout widget, Tx: Recent news Widget,  availbale: -  Appearance &#8594; Widgets', 'transportex' ) ?></p>
						<p><a href="<?php echo admin_url( 'widgets.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Widgets', 'transportex' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'transportex' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'transportex' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/docs/wp/transportex/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Documentation', 'transportex' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'transportex' ); ?></h3>
						<p><?php esc_html_e( 'Please Put your question / query on support forum.', 'transportex' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/transportex-lite' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support Forum', 'transportex' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more functionality / features?', 'transportex' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features and functionlaity.', 'transportex' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/transportex/' ); ?>" class="button button-secondary"><?php esc_html_e( 'View Pro', 'transportex' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got sales related question?', 'transportex' ); ?></h3>
						<p><?php esc_html_e( 'Please send it via our sales contact page.', 'transportex' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/contact/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Contact Page', 'transportex' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'transportex' );
							echo ' ' . $theme->display( 'Name' );
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'transportex' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/transportex' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'transportex' );
								echo ' ' . $theme->display( 'Name' );
								?>
							</a>
						</p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard transportex">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'transportex' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'transportex' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'transportex' ) : esc_html_e( 'Go to Dashboard', 'transportex' ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Output the supported plugins screen.
	 */
	public function supported_plugins_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->transportex_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'This theme recommends following plugins:', 'transportex' ); ?></p>
			<ol>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>" target="_blank"><?php esc_html_e( 'Contact Form 7', 'transportex' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce/' ); ?>" target="_blank"><?php esc_html_e( 'WooCommerce', 'transportex' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/polylang/' ); ?>" target="_blank"><?php esc_html_e( 'Polylang', 'transportex' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'transportex'); ?>
				</li>
				<li><a href="<?php echo esc_url( 'https://wpml.org/' ); ?>" target="_blank"><?php esc_html_e( 'WPML', 'transportex' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'transportex'); ?>
				</li>
			</ol>

		</div>
		<?php
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->transportex_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'transportex' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'transportex'); ?></h3></th>
						<th><h3><?php esc_html_e('transportex Lite', 'transportex'); ?></h3></th>
						<th><h3><?php esc_html_e('transportex Pro', 'transportex'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Slider', 'transportex'); ?></h3></td>
						<td><?php esc_html_e('3', 'transportex'); ?></td>
						<td><?php esc_html_e('Unlimited Slides', 'transportex'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Slider Settings', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Slides type, duration & delay time', 'transportex'); ?></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Color Palette', 'transportex'); ?></h3></td>
						<td><?php esc_html_e('Primary Color Option', 'transportex'); ?></td>
						<td><?php esc_html_e('Multiple Color Options', 'transportex'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Additional Top Header', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Social Icons + Menu + Header text option', 'transportex'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Social Icons', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Boxed & Wide layout option', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Light & Dark Color skin', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Compatible', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Page Layouts', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Translation Ready', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WPML Compatible', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Polylang Compatible', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Footer Copyright Editor', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Demo Content', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Support', 'transportex'); ?></h3></td>
						<td><?php esc_html_e('Forum', 'transportex'); ?></td>
						<td><?php esc_html_e('Forum + Emails/Support Ticket', 'transportex'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('MailChimp Subscriber', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Services widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Call to Action widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Single page widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured widget (Recent Work/Portfolio)', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Testimonial Widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Posts', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Our Clients widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('About us Template', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Teams Widget', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Portfolio 2 , 3 , 4 Column Template', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Template Template', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Contact us Template', 'transportex'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'transportex_pro_theme_url', 'https://themeansar.com/themes/transportex-pro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Pro', 'transportex' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new transportex_Admin();
