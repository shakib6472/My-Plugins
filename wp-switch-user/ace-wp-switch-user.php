<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/acewebx/#content-plugins
 * @since             1.0.0
 * @package           Ace_Wp_Switch_User
 *
 * @wordpress-plugin
 * Plugin Name:       Ace WP Switch User
 * Plugin URI:        ace-wp-switch-user
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.1
 * Author:            AceWebX Team
 * Author URI:        https://profiles.wordpress.org/acewebx/#content-plugins
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ace-wp-switch-user
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ACE_WP_SWITCH_USER_VERSION', '1.1');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ace-wp-switch-user-activator.php
 */
function activate_ace_wp_switch_user()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ace-wp-switch-user-activator.php';
	Ace_Wp_Switch_User_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ace-wp-switch-user-deactivator.php
 */
function deactivate_ace_wp_switch_user()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-ace-wp-switch-user-deactivator.php';
	Ace_Wp_Switch_User_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_ace_wp_switch_user');
register_deactivation_hook(__FILE__, 'deactivate_ace_wp_switch_user');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ace-wp-switch-user.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ace_wp_switch_user()
{

	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	$plugin = new Ace_Wp_Switch_User();
	$plugin->run();
}
run_ace_wp_switch_user();
