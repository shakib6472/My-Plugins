<?php
/*
 * Plugin Name:       Shakib's Helper
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the shakib-helper websites Custom Plugin. All features are came from here.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       shakib-helper
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once(plugin_dir_path(__FILE__) . '/admin/widget/admin.php');
require_once(plugin_dir_path(__FILE__) . 'ajax.php');






// Add a custom widget to the widgets_init action hook.
function elementor_form_addons_adding($widgets_manager)
{

    require_once(__DIR__ . '/widget/form.php');


    $widgets_manager->register(new \Elementor_form_finder());

}
add_action('elementor/widgets/register', 'elementor_form_addons_adding');


// Activation Hook
register_activation_hook(__FILE__, 'shakib_helper_plugin_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'shakib_helper_plugin_deactivation_function');

// Activation function
function shakib_helper_plugin_activation_function()
{
    // Your activation code here
    global $wpdb;

    $table_name = $wpdb->prefix . 'quiz_question_data';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        question varchar(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    // For example, create database tables or set default options

    $table_name = $wpdb->prefix . 'quiz_user_data';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        username varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(255) NOT NULL,
        total varchar(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
        detailarray varchar(255) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}


// Deactivation function
function shakib_helper_plugin_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}
