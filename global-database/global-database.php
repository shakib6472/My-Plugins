<?php
/*
 * Plugin Name:       Global Database
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


// Enqueueing styles
function global_database_by_shakib_enqueue_styles()
{
    // Enqueue the style file
    wp_enqueue_style('global_database_by_shakib-styles', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0', 'all');
    wp_enqueue_style('global_database_by_shakib-bootstrap-styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('global_database_by_shakib-script', plugin_dir_url(__FILE__) . 'scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'global_database_by_shakib_enqueue_styles');

// Database table name
global $wpdb;
$table_name = $wpdb->prefix . 'global_survey_details';

// Activation hook
register_activation_hook( __FILE__, 'create_global_survey_details_table' );

function create_global_survey_details_table() {
    global $wpdb;

    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}global_survey_details (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        all_details TEXT NOT NULL,
        regi_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute SQL query to create table
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}






// Hook into the WordPress REST API initialization
add_action( 'rest_api_init', 'webhook_receiver_init' );

// Function to register the REST route
function webhook_receiver_init() {
    register_rest_route( 'webhook/v1', '/receive', array(
        'methods' => 'POST',
        'callback' => 'webhook_receiver_handle',
    ) );
}

// Function to handle incoming webhook requests
function webhook_receiver_handle( $request ) {
    global $wpdb;

    // Retrieve data from the request
    $data = $request->get_body_params();

    // Prepare data for insertion
    $insert_data = array(
        'fullname'    => isset( $data['fullname'] ) ? sanitize_text_field( $data['fullname'] ) : '',
        'email'       => isset( $data['email'] ) ? sanitize_email( $data['email'] ) : '',
        'all_details' => isset( $data['all_details'] ) ? wp_json_encode( $data['all_details'] ) : '',
        'regi_date'   => current_time( 'mysql' ), // Current date and time
    );

    // Insert data into the database table
    $inserted = $wpdb->insert( $wpdb->prefix . 'global_survey_details', $insert_data );

    if ( $inserted ) {
        // Respond with a success message
        return new WP_REST_Response( array( 'message' => 'Data received and stored successfully' ), 200 );
    } else {
        // Respond with an error message
        return new WP_Error( 'insert_error', 'Failed to store data in the database', array( 'status' => 500 ) );
    }
}








// Handaling Ajax

// Function to handle AJAX request
function get_surveydata_fromdatabase() {
    global $wpdb;

    // Get the ID sent via AJAX
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    // Validate ID (if needed)
    if (empty($id)) {
        wp_send_json_error('Invalid ID');
    }

    // Prefix for the table name
    $table_name = $wpdb->prefix . 'global_survey_details';

    // Prepare SQL query to retrieve data based on ID
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id);

    // Retrieve data from the database
    $result = $wpdb->get_row($query, ARRAY_A);

    // Check if data is retrieved
    if ($result) {
        // Return data as JSON response
        wp_send_json_success($result);
    } else {
        // If no data found, send error response
        wp_send_json_error('No data found');
    }

    // Always exit after sending the JSON response
    wp_die();
}



// Add custom AJAX action hook
add_action('wp_ajax_get_surveydata_fromdatabase', 'get_surveydata_fromdatabase');
add_action('wp_ajax_nopriv_get_surveydata_fromdatabase', 'get_surveydata_fromdatabase');




