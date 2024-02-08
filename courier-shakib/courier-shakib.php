<?php /*
 * Plugin Name:       Courier Helper By Shakib
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the boikotha websites Custom Plugin. All features are came from here.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       shakib-shown
 * Domain Path:       /languages
 */



if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$plugin_url = plugin_dir_path(__FILE__);

function enqueue_jquery_in_plugin()
{
	wp_enqueue_style('cuorier-skb-p-slider-css', plugins_url('asset/style.css', __FILE__), [], '1.0.0', 'all');
	wp_enqueue_style('boikotha-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', [], '1.0.0', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquetry-loading-app', 'https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js', array('jquery'), null, true);
	wp_enqueue_script('boikotha-catetgory-slider-form-js', plugins_url('asset/script.js', __FILE__), array('jquery'), null, true);
	wp_localize_script('boikotha-catetgory-slider-form-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	wp_enqueue_script('fontowsome', 'https://kit.fontawesome.com/46882cce5e.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_jquery_in_plugin');


function elementor_boikotha_widgets($widgets_manager)
{

	require_once(__DIR__ . '/widgets/user-dashboard/user-dashboard.php');


	$widgets_manager->register(new \Elementor_boikkotha_Slider());
}
add_action('elementor/widgets/register', 'elementor_boikotha_widgets');




function add_new_parcel_from_user()
{
	// Get current user ID
	$current_user_id = get_current_user_id();

	// Handle your AJAX request here
	$form_data = $_POST['formData'];

	// Parse form data
	parse_str($form_data, $formDataArray);

	// Extract data from form array
	$name = $formDataArray['recivername'];
	$contact = $formDataArray['rcvcontact'];
	$payment_type = $formDataArray['payment-type'];
	$cod_amount = $formDataArray['cod-amount'];
	$receiver_address = $formDataArray['receiveraddress'];
	$area = $formDataArray['area'];
	$city = $formDataArray['city'];
	$district = $formDataArray['district'];
	$parcel_description = $formDataArray['parcelDescription'];

	// Prepare post data
	$post_data = array(
		'post_title'    => $name, // Assuming 'name' is the title
		'post_type'     => 'parcel',
		'post_status'   => 'publish',
		'post_author'   => $current_user_id, // Set the current user as the author
		// Add other post meta as needed
		'meta_input'    => array(
			'receivers_name'	=> $name,
			'receiver_contact'           => $contact,
			'parcel_type'      => $payment_type,
			'cod_amount'        => $cod_amount,
			'receiver_address'  => $receiver_address,
			'receiver_area'              => $area,
			'receiver_city'              => $city,
			'receiver_distric'          => $district,
			'parcel_description' => $parcel_description,
			'parcel_status'=> 'pending'
		)
	);

	// Insert the post into the database
	$post_id = wp_insert_post($post_data);

	if ($post_id) {
		// Send back a success response
		echo json_encode(array('success' => true, 'post_id' => $post_id));
	} else {
		// Send back an error response
		echo json_encode(array('success' => false, 'message' => 'Failed to add parcel.'));
	}

	wp_die();
}

// Handle the AJAX request
add_action('wp_ajax_add_new_parcel_from_user', 'add_new_parcel_from_user');
add_action('wp_ajax_nopriv_add_new_parcel_from_user', 'add_new_parcel_from_user');
