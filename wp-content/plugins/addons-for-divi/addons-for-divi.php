<?php
/*
 * Plugin Name: DiviTorque
 * Plugin URI:  https://divitorque.com
 * Description: Powerful divi modules to create powerful websites.
 * Version:     3.6.1
 * Author:      WPPaw
 * Author URI:  https://wppaw.com
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: addons-for-divi
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

define('DIVI_TORQUE_PLUGIN_VERSION', '3.6.1');
define('DIVI_TORQUE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('DIVI_TORQUE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('DIVI_TORQUE_PLUGIN_ASSETS', trailingslashit(DIVI_TORQUE_PLUGIN_URL . 'assets'));
define('DIVI_TORQUE_PLUGIN_FILE', __FILE__);
define('DIVI_TORQUE_PLUGIN_BASE', plugin_basename(__FILE__));

do_action('divitorque_loaded');

if (!class_exists('DIVI_TORQUE_PLUGIN')) :
    final class DIVI_TORQUE_PLUGIN
    {

        private static $instance;

        private function __construct()
        {
            register_activation_hook(__FILE__, array($this, 'activate'));
            add_action('plugins_loaded', array($this, 'init_plugin'));
        }

        public static function instance()
        {

            if (!isset(self::$instance) && !(self::$instance instanceof DIVI_TORQUE_PLUGIN)) {
                self::$instance = new DIVI_TORQUE_PLUGIN();
                self::$instance->init();
                self::$instance->includes();
            }

            return self::$instance;
        }

        private function init()
        {
            add_action('divi_extensions_init', array($this, 'initialize_extension'));
        }

        public function init_plugin()
        {



            new DiviTorque\Includes\AssetsManager();

            // if (is_admin()) {
            //     // new DiviTorque\Includes\Admin();
            // } else {
            // }

            // // if (is_admin()) {
            // //     $this->initFeedback();
            // // }
        }


        public function activate()
        {

            // update_option('divitorque_version', '3.5.8');

            update_option('dt-version', DIVI_TORQUE_PLUGIN_VERSION);

            $version = get_option('divitorque_version');

            if ($version) {
                if (version_compare($version, '3.5.7', '<')) {
                    $deprecated = new DiviTorque_Deprecated();
                    $deprecated->run();
                }
            }

            // add_option(DIVI_TORQUE_REDIRECTION_FLAG, false);

            // Version compare and run deprecated functions only if the version is less than 3.5.8

            // if (false === get_transient('divitorque-notice-rating')) {
            //     set_transient('divitorque-notice-rating', true, WEEK_IN_SECONDS);
            // }

            // $inactive_extensions = get_option('ba_inactive_extensions', array());
            // if (!in_array('login-designer', $inactive_extensions, true)) {
            // }

            // if (!in_array('popup-maker', $inactive_extensions, true)) {
            // }
        }

        private function includes()
        {
            // require_once DIVI_TORQUE_PLUGIN_DIR . '/freemius.php';
            require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/functions.php';
            require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/deprecated.php';

            // if (is_admin()) {
            // require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/admin.php';
            // require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/admin/feedback.php';
            // }

            // require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/customizer/customizer.php';
            require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/extensions/extensions.php';
            // require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/admin/static-icons.php';
            require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/assets-manager.php';
            require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/functions-forms.php';
        }

        public function initialize_extension()
        {
            require_once DIVI_TORQUE_PLUGIN_DIR . 'includes/divi-extension.php';
        }

        // private function initFeedback()
        // {

        //     $feedback = true;

        //     if ($feedback) {
        //         // new DiviTorque_Admin_Feedback();
        //     }
        // }
    }


endif;

function divi_torque_lite_plugin()
{
    return DIVI_TORQUE_PLUGIN::instance();
}

divi_torque_lite_plugin();
