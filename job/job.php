<?php
/*
 * Plugin Name:       Job
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

require_once(plugin_dir_path(__FILE__) . '/admin.php');
// require_once(plugin_dir_path(__FILE__) . 'ajax.php');






// Add a custom widget to the widgets_init action hook.
function elementor_skb_form_addons_adding($widgets_manager)
{

    require_once(__DIR__ . '/widget.php');


    $widgets_manager->register(new \Elementor_form_finder_skbhabihai_widget());
}
add_action('elementor/widgets/register', 'elementor_skb_form_addons_adding');


// Activation Hook
register_activation_hook(__FILE__, 'shakib_helper_plugin_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'shakib_helper_plugin_deactivation_function');

// Activation function
function shakib_helper_plugin_activation_function()
{
    // Your activation code here
    global $wpdb;

    $table_name = $wpdb->prefix . 'form_data_by_shakib';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        username varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        region varchar(255) NOT NULL,
        total varchar(255) NOT NULL,
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




function add_new_data_from_user()
{
    global $wpdb;

    // Parse the JSON data sent from the frontend
    $userArray = json_decode(stripslashes($_POST['userArray']), true);

        $useremail = $_POST['useremail'];
        $username = $_POST['username'];
        $total = $_POST['total'];
        $region = $_POST['region'];

        // Insert data into the database
        $table_name = $wpdb->prefix . 'form_data_by_shakib';
    $wpdb->insert(
        $table_name,
        array(
            'username' => $username ,
            'email' => $useremail,
            'region' => $region,
            'total' => $total, // Optional if you want to save the total score
        )
    );

    // Send a response back to the frontend
    echo 'Data saved successfully';

    // Don't forget to exit
    wp_die();
}


// Add an action to handle the AJAX request
add_action('wp_ajax_add_new_data_from_user', 'add_new_data_from_user');
add_action('wp_ajax_nopriv_add_new_data_from_user', 'add_new_data_from_user'); // Handle non-logged in users as well
