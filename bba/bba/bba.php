<?php /*
  * Plugin Name:       BBA core
  * Plugin URI:        https://facebook.com/shakib6472/
  * Description:       This is the bba websites Custom Plugin. All features are came from here.
  * Version:           1.0.0
  * Requires at least: 5.2
  * Requires PHP:      7.2
  * Author:            Shakib Shown
  * Author URI:        https://facebook.com/shakib6472/
  * License:           GPL v2 or later
  * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  * Text Domain:       bba
  * Domain Path:       /languages
  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
require_once(__DIR__ . '/activate.php');
require_once(__DIR__ . '/ajax.php');

register_activation_hook(__FILE__, 'bba_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'bba_deactivation_function');


function bba_enqueue_scripts()
{
	//css
	wp_enqueue_style('bba-style', plugin_dir_url(__FILE__) . '/style.css');
	wp_enqueue_style('bba-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
	//wp_enqueue_script('font-owesome', plugin_dir_url(__
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bba-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
	// Localize the script with new data
	wp_localize_script('bba-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		// Add other variables you want to pass to your script here
	));
}

add_action('wp_enqueue_scripts', 'bba_enqueue_scripts');

//Elementor Setup
function elementor_for_bba($widgets_manager)
{

	require_once(__DIR__ . '/loop.php');
	$widgets_manager->register(new \Elementor_bba_lesson_loop());
}
add_action('elementor/widgets/register', 'elementor_for_bba');




// function add_course_product_to_cart()
// {
//     // Check if we are on a single course page (adjust this condition as needed)
//     if (is_singular('course')) {

//         // Clear WooCommerce cart
//         WC()->cart->empty_cart();
//         // Get the product ID from the post meta field 'product_id'
//         $product_id = get_post_meta(get_the_ID(), 'product_id', true);
//         // If we have a valid product ID, add it to the cart with a quantity of 1
//         if (!empty($product_id) && is_numeric($product_id)) {
//             WC()->cart->add_to_cart($product_id, 1);
//         }
//     }
// }

// // Hook into the 'wp' action to run the function after WordPress is fully loaded
// add_action('wp', 'add_course_product_to_cart');




