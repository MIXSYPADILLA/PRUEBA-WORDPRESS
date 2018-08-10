<?php

if ( ! defined( 'THEME_FRAMEWORK' ) ) exit( 'No direct script access allowed' );

if ( ! class_exists( 'Mk_Tracking_Control_Panel' ) ) {

    /**
     * Control Panel Tracking System.
     *
     * Class that contains the gather data functionality only for Control Panel page and other stuff.
     * This class will collect the data, save to Database as an option, and send it to API by
     * Jupiter Tracking System (Mk_Tracking) once a week.
     *
     * NOTE: This functionality is opt-in. Disabling the tracking in the settings or saying no
     * when asked will not allowed all of these functions to work.
     *
     * @author      Ayub Adiputra
     * @copyright   Artbees LTD (c)
     * @link        http://artbees.net
     * @since       Version 5.8
     * @version     Version 5.8
     * @package     artbees
     * @see         Mk_Tracking
     */
    class Mk_Tracking_Control_Panel {

        /**
         * Declare private variables that will be used in all of class cycle.
         *
         * @access private
         * @var string  $option_name
         * @var mixed   $option_data
         * @var boolean $allow_track
         * @var boolean $daily_track
         */
        private $option_name;
        private $option_data;
        private $allow_track;
        private $daily_track;

        /**
         * Construct object and functionality to track control panel.
         *
         * @param boolean $daily_track Daily tracking status, default is false.
         */
        function __construct( $daily_track = false ) {
            // Setup the Control Panel Tracking properties.
            $this->option_name = 'jupiter-control-panel-tracking';
            $this->option_data = $this->get_data();
            $this->allow_track = $this->get_allow_track();
            $this->daily_track = $daily_track;

            // Check if the Control Panel Tracking System is allowed to track and run daily.
            if ( true === $this->allow_track && true === $this->daily_track ) {
                // Set tasks for daily schedule.
                $this->set_schedule_track();

                // Ajax action for front end tracking and processing.
                add_action( 'wp_ajax_mk_frontend_side_tracking_data', array( $this, 'set_frontend_data' ) );

                // Action for theme update process complete.
                add_action( 'upgrader_process_complete', array( $this, 'set_theme_update_check' ), 10, 2 );
            }
        }

        /**
         * Get control panel tracking option.
         */
        private function get_data() {
            return get_option( $this->option_name, array() );
        }

        /**
         * Update control panel tracking option.
         *
         * @param mixed $data Option value will be saved in database, default is empty array.
         */
        private function update_data( $data = array() ) {
            return update_option( $this->option_name, $data );
        }

        /**
         * Get control panel option value based on option key.
         *
         * @param  string $key Option key.
         * @return mixed       Return false if key or value is empty. Return mixed if data is not empty.
         */
        private function get_data_by_key( $key = null ) {

            // Check if key is empty.
            if ( empty( $key ) ) {
                return false;
            }

            // Check if the value is not empty.
            if ( ! empty( $this->option_data[ $key ] ) ) {
                return $this->option_data[ $key ];
            } else {
                return false;
            }

        }

        /**
         * Update option value based on key. We can append (array) or replace the value.
         *
         * @param  string  $key    Option key.
         * @param  mixed   $value  Option key value will be saved to database.
         * @param  string  $action Save action, 'append' or 'replace' (default).
         * @return boolean         Return false if key is empty or update is fail.
         */
        private function update_data_by_key( $key = null, $value = null, $action = 'replace' ) {

            // Check if key is empty.
            if ( empty( $key ) ) {
                return false;
            }

            $options = $this->get_data();

            // Check if the key is not exist in options.
            if ( ! isset( $options[ $key ] ) ) {
                $options[ $key ] = $value;
            } else {
                // Add the action identifier and logic here, default is replace.
                if ( $action == 'append' ) {
                    // Ensure the current value is array, then append/merge new value.
                    $current_value   = (array) $options[ $key ];
                    $options[ $key ] = wp_parse_args( $value, $prev_value );
                } else {
                    $options[ $key ] = $value;
                }
            }

            // Update the options.
            return $this->update_data( $options );

        }

        /**
         * Update option value based on multiple keys.
         *
         * @param  array   $data  Option keys and values will be saved to database.
         * @param  boolean $multi Status of multidimensional array/subarray to check.
         *
         *     $data = array(
         *         'key' => 'value'
         *     );
         *
         * @return boolean        Return true if success, return false if empty or fail.
         */
        private function update_data_by_keys( $data = array(), $multi = false ) {

            // Check if data is empty.
            if ( empty( $data ) ) {
                return false;
            }

            $options = $this->get_data();

            // Extract the values.
            foreach ( $data as $key => $value ) {
                // Check if key is exist or not and multidimensional array status.
                if ( ! isset( $options[ $key ] ) || false === $multi ) {
                    $options[ $key ] = $value;
                } else {
                    // Special case for multidimesional array in frontend site.
                    foreach ( $value as $sub_key => $sub_value ) {
                        $type = ( ! empty( $sub_value['collectType'] ) ) ? $sub_value['collectType'] : null;
                        if ( ! isset( $options[ $key ][ $sub_key ] ) || empty( $type ) ) {
                            $options[ $key ][ $sub_key ] = $sub_value;
                        } else {
                            // Add the action identifier and logic here, default is replace.
                            if ( $type == 'add' ) {
                                $default = $options[ $key ][ $sub_key ]['value'];
                                $options[ $key ][ $sub_key ]['value'] = (int) $default + (int) $sub_value['value'];
                            } elseif ( $type == 'append' ) {
                                // Ensure the current value is array, then append/merge new value.
                                $cur_value   = (array) $options[ $key ][ $sub_key ]['value'];
                                $options[ $key ][ $sub_key ]['value'] = wp_parse_args( $sub_value['value'], $cur_value );
                            } else {
                                $options[ $key ][ $sub_key ] = $sub_value;
                            }
                        }
                    }
                }

            }

            // Update the options.
            return $this->update_data( $options );

        }

        /**
         * Check if the function is allowed to track.
         *
         * @return boolean Return true if allowed.
         */
        private function get_allow_track() {
            $allow_track = get_option( 'jupiter-data-tracking' );
            if ( ! empty( $allow_track ) && 'yes' == $allow_track ) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Get lapse time between start and end time in second.
         *
         * @param  string $start_time Start time.
         * @param  string $end_time   End time.
         * @return mixed              False if time is empty or null. Integer if it's correct.
         */
        private function get_lapse_of_time( $start_time = null, $end_time = null ) {

            // Check if start or end time is null.
            if ( null == $start_time || null == $end_time ) {
                return false;
            }

            // Convert to seconds and count the difference.
            $start = strtotime( $start_time );
            $end   = strtotime( $end_time );
            $diff  = $end - $start;

            if ( $diff < 0 ) {
                return false;
            }

            return $diff;

        }

        /**
         * Get available Jupiter version.
         *
         * @param  array  $value Option value.
         * @return string        Current Jupiter version.
         */
        private function get_version_available( $value = array() ) {
            // Check if the value contain Jupiter version.
            if ( ! empty( $value['version'] ) ) {
                return $value['version'];
            }

            // Get latest Jupiter version.
            $version = null;
            $jupiter = wp_get_theme( 'jupiter' );
            if ( $jupiter->exists() ) {
                $version = $jupiter->get( 'Version' );
            }

            return $version;
        }

        /**
         * Set daily schedule to run the Control Panel trackers. Similar with Tracking schedule.
         *
         * @see Mk_Tracking
         */
        public function set_schedule_track() {
            // Set cron to run daily tracking schedule.
            add_action( 'jupiter_control_panel_tracking', array( $this, 'set_daily_track' ) );
            if ( ! wp_next_scheduled( 'jupiter_control_panel_tracking' ) ) {
                wp_schedule_event( time(), 'daily', 'jupiter_control_panel_tracking' );
            }
        }

        /**
         * List all Control Panel Trackers that will be run once in a day.
         */
        public function set_daily_track() {

            // Prepare all the data.
            $plugin_usage                 = $this->get_plugin_usage();
            $values['plugin_used']        = $plugin_usage['plugin_used'];
            $values['plugin_unused']      = $plugin_usage['plugin_unused'];
            $values['user_registered']    = $this->get_user_registered();
            $values['user_image_sizes']   = $this->get_image_sizes();
            $values['theme_update_time']  = $this->get_theme_update_average();
            $values['template_installed'] = $this->get_template_installed();
            $values['theme_notice_time']  = $this->get_user_notice_update_average();

            // Save all in bulk action.
            $this->update_data_by_keys( $values );

        }

        /**
         * Set data from frontend side.
         */
        public function set_frontend_data() {

            // Check if data is empty.
            if ( ! isset( $_POST['data'] ) ) {
                $status  = false;
            } else {
                $data = $_POST['data'];

                // Convert the data to array.
                $options = json_decode( stripslashes( $data ), true );

                // Save the data to database.
                $status = $this->update_data_by_keys( $options, true );
            }

            // Send JSON response
            $return = array(
                'status'  => $status,
                'time'    => date( 'Y-m-d H:i:s' )
            );

            wp_send_json( $return );

        }

        /**
         * Get user registered status.
         */
        public function get_user_registered() {

            // Check if mk_control_panel class is not exist.
            if ( ! class_exists( 'mk_control_panel' ) ) {
                require_once THEME_CONTROL_PANEL . '/logic/functions.php';
            }

            // Get user registered the product status.
            $products = new mk_control_panel();
            $value    = $products->is_verified_artbees_customer( false );

            return $value;
        }

        /**
         * Get all image sizes added by user.
         */
        public function get_image_sizes() {
            // Get all image sizes added.
            return get_option( IMAGE_SIZE_OPTION );
        }

        /**
         * Get all user active and inactive plugins.
         */
        public function get_plugin_usage() {

            // Check if mk_plugin_management class is not exist.
            if ( ! class_exists( 'mk_plugin_management' ) ) {
                require_once THEME_CONTROL_PANEL . '/logic/plugin-management.php';
            }

            // Get all plugins in Control Panel.
            $plugins = new mk_plugin_management( false, false );
            $list    = $plugins->plugins_custom_api( 0, 0, array( 'slug', 'name' ) );

            // Prepare return value structure.
            $value   = array(
                'plugin_used'   => array(),
                'plugin_unused' => array()
            );

            // Check if the list is not empty.
            if ( ! empty( $list ) ) {
                $list   = (array) $list;
                foreach ( $list as $list_key => $list_value ) {
                    if ( $plugins->check_active_plugin( $list_value['slug'] ) ) {
                        $value['plugin_used'][ $list_value['slug'] ]   = $list_value['name'];
                    } else {
                        $value['plugin_unused'][ $list_value['slug'] ] = $list_value['name'];
                    }
                }
            }

            return $value;
        }

        /**
         * Set average time of Jupiter update.
         */
        public function get_theme_update_average() {

            $option = $this->get_data_by_key( 'theme_update_time' );

            // Check if the option is not empty.
            if ( ! empty( $option ) ) {
                $value = $option;
            } else {

                /**
                 * Jupiter Update value data structure.
                 *
                 * @see  set_theme_update_check
                 *
                 * $value = array(
                 *     'average'      => null,  // Average update time.
                 *     'version'      => null,  // Latest version of check.
                 *     'check_status' => false, // Check average status.
                 *     'update_diff'  => array( // Update time each version.
                 *         '5.7' => '123'       // In second.
                 *     ),
                 *     'update_done'  => array( // All updated versions (set_theme_update_check).
                 *         '5.7' => '2017-03-...', '5.8' => '2017-04-...'
                 *     ),
                 *     'last_details' => array(
                 *         'updated_time' => null,    // Recent update time (set_theme_update_check).
                 *         'updated_ver'  => null,    // Recent update version (set_theme_update_check).
                 *         'options'      => array()  // Data recent update (set_theme_update_check).
                 *     )
                 * );
                 *
                 */
                $value = array(
                    'average'      => null,
                    'version'      => null,
                    'check_status' => false,
                    'update_diff'  => array(),
                    'update_done'  => array(),
                    'last_details' => array(
                        'updated_time' => null,
                        'updated_ver'  => null,
                        'options'      => array()
                    )
                );
            }

            // Get Jupiter version.
            $version = $this->get_version_available( $value );

            // Check if the average update time is not checked.
            if ( false === $value['check_status'] ) {

                // Check the last_details is not empty.
                $updated_ver = $updated_time = $prev_up_time = null;
                if ( ! empty( $value['last_details']['updated_ver'] ) && ! empty( $value['last_details']['updated_time'] ) ) {

                    $updated_ver  = $value['last_details']['updated_ver'];
                    $updated_time = $value['last_details']['updated_time'];

                    // Compare the version and check if Theme Update class is exist.
                    if ( version_compare( $updated_ver, $version, '>' ) && ! empty( $value['update_done'] ) ) {
                        $done_version = (array) $value['update_done'];
                        $end_up_time  = end( $done_version );
                        $prev         = prev( $done_version );
                        $prev_up_time = ( ! empty( $prev ) ) ? $prev : null;
                    }

                    // Get the diff time.
                    $diff_time = $this->get_lapse_of_time( $prev_up_time, $updated_time );
                    if ( false !== $diff_time ) {
                        $value['update_diff'][ $updated_ver ] = $diff_time;
                    }

                }

                // Check the update_diff is not empty.
                if ( ! empty( $value['update_diff'] ) && ! empty( $updated_ver ) ) {
                    // Count and set average time from all update.
                    $total_time       = array_sum( $value['update_diff'] );
                    $total_update     = count( $value['update_diff'] );
                    $value['average'] = $total_time / $total_update;
                }

                $value['version'] = ! empty( $updated_ver ) ? $updated_ver : $version;

                // Set check status true.
                $value['check_status'] = true;

            }

            return $value;

        }

        /**
         * Set theme update status, details, and time. Only run after WordPress updater process
         * is complete successfully and save the details when the recent updated theme is Jupiter.
         *
         * @param object $upgrader_object All update details.
         * @param array  $options         Updated items.
         */
        public function set_theme_update_check( $upgrader_object, $options ) {

            // Check if the recent update is theme only.
            if ( ! empty( $options['themes'] ) ) {

                $themes = (array) $options['themes'];

                // Check if Jupiter is included in the recent update.
                if ( in_array( 'jupiter', $themes ) ) {

                    $option = $this->get_data_by_key( 'theme_update_time' );

                    // Get latest Jupiter version.
                    $version = $this->get_version_available();

                    // Check if value is empty or not.
                    if ( ! empty( $option ) ) {
                        $value = $option;
                    } else {

                        /**
                         * Jupiter Update value data structure.
                         *
                         * @see  get_theme_update_average
                         *
                         * $value = array(
                         *     'average'      => null,  // Average update time (get_theme_update_average).
                         *     'version'      => null,  // Latest version of check (get_theme_update_average).
                         *     'check_status' => false, // Check average status.
                         *     'update_diff'  => array( // Update time each version (get_theme_update_average).
                         *         '5.7' => '123'       // In second.
                         *     ),
                         *     'update_done'  => array( // All updated versions.
                         *         '5.7' => '2017-03-...', '5.8' => '2017-04-...'
                         *     ),
                         *     'last_details' => array(
                         *         'updated_time' => null,    // Recent update time.
                         *         'updated_ver'  => null,    // Recent update version.
                         *         'options'      => array()  // Data recent update.
                         *     )
                         * );
                         *
                         */
                        $value = array(
                            'average'      => null,
                            'version'      => null,
                            'check_status' => false,
                            'update_diff'  => array(),
                            'update_done'  => array(),
                            'last_details' => array(
                                'updated_time' => null,
                                'updated_ver'  => null,
                                'options'      => array()
                            )
                        );
                    }

                    // Ask cron to check recent Jupiter update average time.
                    $value['check_status'] = false;

                    // Track latest Jupiter update version, time, and details.
                    $current_time = date( 'Y-m-d H:i:s' );
                    $value['last_details'] = array(
                        'updated_time' => $current_time,
                        'updated_ver'  => $version,
                        'options'      => $options
                    );

                    // Append recent Jupiter version.
                    if ( ! empty( $version ) ) {
                        $value['update_done'][ $version ] = $current_time;
                    }

                    $this->update_data_by_key( 'theme_update_time', $value );
                }

            }
        }

        /**
         * Set installed template.
         */
        public function get_template_installed() {
            // Get installed template slug.
            return get_option( 'jupiter_template_installed', false );
        }

        /**
         * Set API entry attempts. Store only when user try to register the API.
         *
         * @param boolean $status Current entry status.
         */
        public function set_api_entry_attempt( $status = false ) {

            // Check if the Control Panel Tracking System is allowed to track.
            if ( false === $this->allow_track ) {
                return false;
            }

            $option = $this->get_data_by_key( 'api_entry_attempt' );
            $limit  = 3; // Attempt limit.

            // Check the value and count the attempt.
            $value   = ( ! empty( $option ) ) ? $option : array();
            $attempt = count( $value ) + 1;

            // Set the value maximum only on $limit attempts.
            if ( $limit >= $attempt ) {
                // Prepare the value.
                $value[] = array(
                    'status'  => $status,
                    'attempt' => $attempt,
                );

                $this->update_data_by_key( 'api_entry_attempt', $value );
            }
        }

        /**
         * Set average time of Jupiter update notice.
         */
        public function get_user_notice_update_average() {

            $option = $this->get_data_by_key( 'theme_notice_time' );

            // Check if value is empty or not.
            if ( ! empty( $option ) ) {
                $value = $option;
            } else {

                /**
                 * Jupiter Update Notice value data structure.
                 *
                 * @see  set_user_notice_update_check
                 *
                 * $value = array(
                 *     'average'      => null,  // Average notice time.
                 *     'version'      => null,  // Latest version of check.
                 *     'check_status' => false, // Average notice status.
                 *     'notice_diff'  => array( // Notice time for each version.
                 *         '5.7' => '123'       // In second.
                 *     ),
                 *     'notice_done'  => array( // Notice done for each version (set_user_notice_update_check).
                 *         '5.7', '5.8'
                 *     ),
                 *     'last_details' => array(
                 *         'noticed_time' => null, // Recent notice time (set_user_notice_update_check).
                 *         'noticed_ver'  => null  // Recent notice version (set_user_notice_update_check).
                 *     )
                 * );
                 *
                 */
                $value = array(
                    'average'      => null,
                    'version'      => null,
                    'check_status' => false,
                    'notice_diff'  => array(),
                    'notice_done'  => array(),
                    'last_details' => array(
                        'noticed_time' => null,
                        'noticed_ver'  => null
                    )
                );
            }

            // Get Jupiter version.
            $version = $this->get_version_available( $value );

            // Check if the average update time is not checked.
            if ( false === $value['check_status'] ) {

                // Check the last_details is not empty.
                $noticed_ver = $noticed_time = $release_time = null;
                if ( ! empty( $value['last_details']['noticed_ver'] ) && ! empty( $value['last_details']['noticed_time'] ) ) {

                    $noticed_ver  = $value['last_details']['noticed_ver'];
                    $noticed_time = $value['last_details']['noticed_time'];

                    // Compare the version and check if Theme Update class is exist.
                    if ( version_compare( $noticed_ver, $version, '>' ) && class_exists( 'Mk_Wp_Theme_Update' ) ) {
                        $updates      = new Mk_Wp_Theme_Update();
                        $releases     = $updates->get_release_note();
                        $release_time = $releases->post_date;
                    }

                    // Get the diff time.
                    $diff_time = $this->get_lapse_of_time( $release_time, $noticed_time );
                    if ( false !== $diff_time ) {
                        $value['notice_diff'][ $noticed_ver ] = $diff_time;
                    }

                }

                // Check the update_diff is not empty.
                if ( ! empty( $value['notice_diff'] ) && ! empty( $noticed_ver ) ) {
                    // Count and set average time from all notice.
                    $total_time       = array_sum( $value['notice_diff'] );
                    $total_notice     = count( $value['notice_diff'] );
                    $value['average'] = $total_time / $total_notice;
                    $value['version'] = $noticed_ver;
                }

                // Set check status true.
                $value['check_status'] = true;
            }

            return $value;

        }

        /**
         * Set the time when user notice new Jupiter update available.
         *
         * @param string $new_version Latest version notified.
         */
        public function set_user_notice_update_check( $new_version = null ) {

            // Check if the Control Panel Tracking System is allowed to track.
            if ( false === $this->allow_track ) {
                return false;
            }

            $option = $this->get_data_by_key( 'theme_notice_time' );

            // Check if option is empty or not.
            if ( ! empty( $option ) ) {
                $value = $option;
            } else {

                /**
                 * Jupiter Update Notice value data structure.
                 *
                 * @see  get_user_notice_update_average
                 *
                 * $value = array(
                 *     'average'      => null,  // Average notice time (get_user_notice_update_average).
                 *     'version'      => null,  // Latest version of check (get_user_notice_update_average).
                 *     'check_status' => false, // Average notice status.
                 *     'notice_diff'  => array( // Notice time for each version (get_user_notice_update_average).
                 *         '5.7' => '123'       // In second.
                 *     ),
                 *     'notice_done'  => array( // Notice done for each version.
                 *         '5.7', '5.8'
                 *     ),
                 *     'last_details' => array(
                 *         'noticed_time' => null, // Recent notice time.
                 *         'noticed_ver'  => null  // Recent notice version.
                 *     )
                 * );
                 *
                 */
                $value = array(
                    'average'      => null,
                    'version'      => null,
                    'check_status' => false,
                    'notice_diff'  => array(),
                    'notice_done'  => array(),
                    'last_details' => array(
                        'noticed_time' => null,
                        'noticed_ver'  => null
                    )
                );
            }

            // Check if notice_done is not empty.
            if ( ! empty( $value['notice_done'] ) ) {
                // Check if the new version has been logged.
                if ( in_array( $new_version, $value['notice_done'] ) ) {
                    return false;
                }
            }

            // Save current version has been noticed.
            $value['notice_done'][] = $new_version;

            // Ask cron to check recent update notice average time.
            $value['check_status']  = false;

            // Track latest Jupiter noticed version, time, and details.
            $value['last_details'] = array(
                'noticed_time' => date( 'Y-m-d H:i:s' ),
                'noticed_ver'  => $new_version
            );

            $this->update_data_by_key( 'theme_notice_time', $value );
        }

    }

}

// Run control panel tracking in daily shedule.
new Mk_Tracking_Control_Panel( true );