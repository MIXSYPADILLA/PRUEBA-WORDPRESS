<?php
/**
 * List of all texts in control panel for translation
 *
 * @package Control Panel
 */

/**
 * This function will be hooked into wp_localize_script in admin/general/enqueue-assets.php
 */
function mk_adminpanel_textdomain() {
	return array(
		'important_notice'                                                 => __( 'Important Notice', 'mk_framework' ),
		'restore_settings'                                                 => __( 'Restore Settings', 'mk_framework' ),
		'installing_sample_data_will_delete_all_data_on_this_website'      => __( 'Installing a new template will remove all current data on your website. Do you want to proceed?', 'mk_framework' ),
		'you_are_trying_to_restore_your_theme_settings_to_this_date'       => __( 'You are trying to Restore your database to this date: ', 'mk_framework' ),
		'yes_install'                                                      => __( 'Yes', 'mk_framework' ),
		'restore'                                                          => __( 'Restore', 'mk_framework' ),
		'reload_page'                                                      => __( 'Reload Page', 'mk_framework' ),
		'uninstalling_template_will_remove_all_your_contents_and_settings' => __( 'Uninstalling template will remove all you current data and settings. Do you want to proceed?', 'mk_framework' ),
		'yes_uninstall'                                                    => __( 'Yes, uninstall ', 'mk_framework' ),
		'template_uninstalled'                                             => __( 'Template uninstalled', 'mk_framework' ),
		'hooray'                                                           => __( 'All Done!', 'mk_framework' ),
		'template_installed_successfully'                                  => __( 'Template is successfully installed.', 'mk_framework' ),
		'something_wierd_happened_please_try_again'                        => __( 'Something wierd happened , Please try again', 'mk_framework' ),
		'oops'                                                             => __( 'Something went wrong!', 'mk_framework' ),
		'preview'                                                          => __( 'Preview', 'mk_framework' ),
		'install'                                                          => __( 'Install', 'mk_framework' ),
		'uninstall'                                                        => __( 'Uninstall', 'mk_framework' ),
		'downloading_sample_package_data'                                  => __( 'Downloading package', 'mk_framework' ),
		'backup_reset_database'                                            => __( 'Backup Database', 'mk_framework' ),
		'install_required_plugins'                                         => __( 'Install required plugins', 'mk_framework' ),
		'install_sample_data'                                              => __( 'Installing in progress...', 'mk_framework' ),
		'installled'                                                       => __( 'Installed', 'mk_framework' ),
		'include_images_and_videos'                                        => __( 'Include Images and Videos?', 'mk_framework' ),
		'would_you_like_to_import_images_and_videos_as_preview'            => __( 'Would you like to import images and videos as preview? <br>* Notice that all images are <strong>strictly copyrighted</strong> and you need to acquire the license in case you want to use them on your project. {param}', 'mk_framework' ),
		'insufficient_system_resource'                                     => __( 'Insufficient system resource', 'mk_framework' ),
		'insufficient_system_resource_notes'                               => __( 'Your system resource is not enough. Please contact our support or {param} here.', 'mk_framework' ),
		'continue_without_media'                                           => __( 'Continue without Media', 'mk_framework' ),
		'do_not_include'                                                   => __( 'Do not Include', 'mk_framework' ),
		'include'                                                          => __( 'Include', 'mk_framework' ),

		'whoops'                                                           => __( 'Whoops!', 'mk_framework' ),
		'dont_panic'                                                       => __( 'There seems to be an inconsistency in installing procedure. Don’t panic though—here we’ve listed some possible solutions for you to get back on track.<br>( Warning number : {param}) {param} ', 'mk_framework' ),
		'error_in_network_please_check_your_connection_and_try_again'      => __( 'Error in network , Please check your connection and try again', 'mk_framework' ),
		'incorrect_credentials'                                            => __( 'There was an error connecting to the server, Please verify the settings are correct.', 'mk_framework' ),
		'restore_from_last_backup'                                         => __( 'Restore from Last Backup', 'mk_framework' ),
		'restore_theme_settings_to_this_version'                           => __( 'Restore theme settings to this version', 'mk_framework' ),
		'are_you_sure'                                                     => __( 'Are you sure?', 'mk_framework' ),

		'installing_notice'                                                => __( 'Installing Notice', 'mk_framework' ),
		'are_you_sure_you_want_to_install'                                 => __( 'Are you sure you want to install <strong>{param}</strong> ?', 'mk_framework' ),

		'something_wierd_happened_please_retry_again'                      => __( 'Something wierd happened , please retry again', 'mk_framework' ),

		'all_done'                                                         => __( 'All Done!', 'mk_framework' ),
		'item_is_successfully_installed'                                   => __( '<strong>{param}</strong> Plugin is successfully installed.', 'mk_framework' ),

		'are_you_sure_you_want_to_remove_plugin'                           => __( 'Are you sure you want to remove <strong>{param}</strong> Plugin? <br> Note that the plugin files will be removed from your server!', 'mk_framework' ),
		'conitune'                                                         => __( 'Continue ', 'mk_framework' ),

		'deactivating_notice'                                              => __( 'Deactivating Notice ', 'mk_framework' ),
		'plugin_deactivate_successfully'                                   => __( 'Plugin deactivated successfully ', 'mk_framework' ),

		'deactivate'                                                       => __( 'Deactivate', 'mk_framework' ),
		'remove'                                                           => __( 'Remove', 'mk_framework' ),
		'activate'                                                         => __( 'Activate', 'mk_framework' ),
		'something_went_wrong'                                             => __( 'Something went wrong!', 'mk_framework' ),
		'are_you_sure_you_want_to_remove_addon'                            => __( 'Are you sure you want to remove <strong>{param}</strong> Add-on? <br> Note that all any data regarding this add-on will be lost.', 'mk_framework' ),
		'addon_deactivate_successfully'                                    => __( '<strong>{param}</strong> deactivated successfully.', 'mk_framework' ),

		'product_registeration_required'                                   => __( 'Product registration required!', 'mk_framework' ),
		'you_must_register_your_product'                                   => __( 'In order to use this feature you must register your product.', 'mk_framework' ),
		'register_product'                                                 => __( 'Register Product', 'mk_framework' ),
		'registering_theme'                                                => __( 'Registering Jupiter', 'mk_framework' ),
		'wait_for_api_key_registered'                                      => __( 'Please wait while your API key is being verified.', 'mk_framework' ),
		'discard'                                                          => __( 'Discard', 'mk_framework' ),
		'thanks_registering'                                               => __( 'Thanks for Registration!', 'mk_framework' ),
		'registeration_unsuccessful'                                       => __( 'Oops! Registration was unsuccessful.', 'mk_framework' ),
		'revoke_API_key'                                                   => __( 'Revoke API Key', 'mk_framework' ),
		'you_are_about_to_remove_API_key'                                  => __( 'You are about to remove API key from this website?', 'mk_framework' ),
		'ok'                                                               => __( 'Ok', 'mk_framework' ),
		'cancel'                                                           => __( 'Cancel', 'mk_framework' ),
		'continue'                                                         => __( 'Continue', 'mk_framework' ),
		'activating_plugin'                                                => __( 'Activating Plugin', 'mk_framework' ),
		'wait_for_plugin_activation'                                       => __( 'Please wait while the plugin going to be activated...', 'mk_framework' ),
		'deactivating_plugin'                                              => __( 'Deactivating Plugin', 'mk_framework' ),
		'wait_for_plugin_deactivation'                                     => __( 'Please wait while the plugin going to be deactivated...', 'mk_framework' ),
		'update_plugin'                                                    => __( 'Update Plugin', 'mk_framework' ),
		'you_are_about_to_update'                                          => __( 'You are about to update', 'mk_framework' ),
		'updating_plugin'                                                  => __( 'Updating Plugin', 'mk_framework' ),
		'wait_for_plugin_update'                                           => __( 'Please wait while the plugin going to be updated...', 'mk_framework' ),
		'plugin_is_successfully_updated'                                   => __( 'Plugin is successfully updated', 'mk_framework' ),
		'plugin_updated_recent_version'                                    => __( ' is successfully updated to the most recent version.', 'mk_framework' ),
		'you_are_about_to_install'                                         => __( 'You are about to install <strong>{param}</strong>', 'mk_framework' ),
		'uninstalling_Template'                                            => __( 'Uninstalling Template', 'mk_framework' ),
		'please_wait_for_few_moments'                                      => __( 'Please wait for few moments...', 'mk_framework' ),
		'restoring_database'                                               => __( 'Restoring Database', 'mk_framework' ),
		'remove_image_size'                                                => __( 'Remove Image Size', 'mk_framework' ),
		'are_you_sure_remove_image_size'                                                     => __( 'Are you sure you want to remove this image size?', 'mk_framework' ),
		'image_sizes_could_not_be_stored'                                  => __( 'Image sizes could not be stored. Please try again and if issue persists, contact our support.', 'mk_framework' ),
		'download_psd_files'                                               => __( 'Download PSD files', 'mk_framework' ),

	);
}
