<?php /*
 * Plugin Name:       S-Checkout Core
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the s-checkout websites Custom Plugin. All features are came from here.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       s-checkout
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
//requir Files

$plugin_url = plugin_dir_path(__FILE__);
require_once ($plugin_url . 'ajax.php');

function s_checkout_enqueue_scripts()
{
	//css
	wp_enqueue_style('s-checkout-style', plugin_dir_url(__FILE__) . '/assets/style.css');
	//wp_enqueue_script('font-owesome', plugin_dir_url(__
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('s-checkout-script', plugin_dir_url(__FILE__) . 'assets/scripts.js', array('jquery'), null, true);

	// Localize the script with new data
	wp_localize_script('s-checkout-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'hone_url' => home_url(),
		// Add other variables you want to pass to your script here
	));
}

add_action('wp_enqueue_scripts', 's_checkout_enqueue_scripts');




//Elementor Setup
function elementor_s_checkout_widgets($widgets_manager)
{

	require_once(__DIR__ . '/elementor/checkout.php');

	$widgets_manager->register(new \Elementor_s_checkout());

}
add_action('elementor/widgets/register', 'elementor_s_checkout_widgets');







// Activation function
function s_checkout_activation_function()
{
	// Your activation code here
	// For example, create database tables or set default options
}

// Deactivation function
function s_checkout_deactivation_function()
{
	// Your deactivation code here
	// For example, delete database tables or clean up options
}



// Activation Hook
register_activation_hook(__FILE__, 's_checkout_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 's_checkout_deactivation_function');






//Ajax
function add_to_cart_this_product()
{
	// Check if product ID is set and valid
	if (!isset($_POST['product_id']) || !is_numeric($_POST['product_id'])) {
		wp_send_json_error(array('message' => 'Invalid product ID.'));
		return;
	}

	$product_id = intval($_POST['product_id']);
	$quantity = 10; // Set the quantity to 10

	// Add the product to the cart
	$added = WC()->cart->add_to_cart($product_id, $quantity);

	if ($added) {
		wp_send_json_success(array('message' => 'Product added to cart successfully.'));
	} else {
		wp_send_json_error(array('message' => 'Failed to add product to cart.'));
	}

	wp_die(); // Always include this to terminate the script
}
add_action('wp_ajax_add_to_cart_this_product', 'add_to_cart_this_product');
add_action('wp_ajax_nopriv_add_to_cart_this_product', 'add_to_cart_this_product');