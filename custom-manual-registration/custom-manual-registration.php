<?php 
 /*
 * Plugin Name:       Custom Manual Registration
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       User Registration with Manual & What'sApp Proccess
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       boikotha
 * Domain Path:       /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// /regi-form.php


// Enqueueing styles
function sazid_plugin_enqueue_styles()
{
    // Enqueue the style file
    wp_enqueue_style('custom-manual-registration-bootstrap-styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all');
    wp_enqueue_script('jquery');
 
}
add_action('wp_enqueue_scripts', 'sazid_plugin_enqueue_styles');



// Add a custom widget to the widgets_init action hook.
function elementor_form_addons_adding($widgets_manager)
{

    require_once(__DIR__ . '/regi-form.php');


    $widgets_manager->register(new \Elementor_custom_regi_form());
}
add_action('elementor/widgets/register', 'elementor_form_addons_adding');


// Activation Hook
register_activation_hook(__FILE__, 'sazid_helper_plugin_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'sazid_helper_plugin_deactivation_function');

// Activation function
function sazid_helper_plugin_activation_function()
{
}


// Deactivation function
function sazid_helper_plugin_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}




// Ajax Handaling



function add_new_user_as_pending_user_callback() {
    // Security checks
    check_ajax_referer('add_new_user_nonce', 'security');

    // Retrieve data sent via AJAX
    $firstname = sanitize_text_field($_POST['firstname']);
    $lastname = sanitize_text_field($_POST['lastname']);
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password']; // Note: This should be properly sanitized and validated

    // Check if the user with the given email or username already exists
    if (email_exists($email) || username_exists($username)) {
        $response = array(
            'success' => false,
            'message' => 'User with this email or username already exists.'
        );
        wp_send_json_error($response);
    }

    // Create a new user with the provided details
    $user_id = wp_create_user($username, $password, $email);

    // Check if user creation was successful
    if (is_wp_error($user_id)) {
        $response = array(
            'success' => false,
            'message' => $user_id->get_error_message()
        );
        wp_send_json_error($response);
    }

    // Update user meta to mark the user as pending or not approved
    update_user_meta($user_id, 'account_status', 'pending');

      // Get the path to the email HTML file
      $email_html_path = plugin_dir_path(__FILE__) . 'email.html';

      // Check if the file exists
      if (file_exists($email_html_path)) {
          // Read the contents of the HTML file
          $message = file_get_contents($email_html_path);
  
          // Send email to the user
          $subject = 'Registration Confirmation';
          $headers[] = 'Content-Type: text/html; charset=UTF-8';
          $headers[] = 'From: Ajita Alem <noreply@ajitaalem.com>';
          wp_mail($email, $subject, $message, $headers);
      }

    // Send success response
    $response = array(
        'success' => true,
        'path' => $email_html_path,
        'message' => 'User created successfully.'
    );
    wp_send_json_success($response);
    wp_die(); //
}

// Add a function to handle AJAX request for adding a new user as pending
add_action('wp_ajax_add_new_user_as_pending_user', 'add_new_user_as_pending_user_callback');
add_action('wp_ajax_nopriv_add_new_user_as_pending_user', 'add_new_user_as_pending_user_callback');


