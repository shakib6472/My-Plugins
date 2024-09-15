<?php /*
  * Plugin Name:       BBA core
  * Plugin URI:        https://facebook.com/shakib6472/
  * Description:       This is the swagbulk websites Custom Plugin. All features are came from here.
  * Version:           1.0.0
  * Requires at least: 5.2
  * Requires PHP:      7.2
  * Author:            Shakib Shown
  * Author URI:        https://facebook.com/shakib6472/
  * License:           GPL v2 or later
  * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  * Text Domain:       swagbulk
  * Domain Path:       /languages
  */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
//requir Files

// Activation function
function swagbulk_activation_function()
{
    // Your activation code here

}

// Deactivation function
function swagbulk_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}

// Activation Hook
register_activation_hook(__FILE__, 'swagbulk_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'swagbulk_deactivation_function');





// Custom Codes
// Custom Codes
function wc_get_customer_bought_products($user_id, $p_id)
{
    global $wpdb;

    // Get table names with correct prefix
    $orders_table = $wpdb->prefix . 'wc_orders';
    $order_product_lookup_table = $wpdb->prefix . 'wc_order_product_lookup';

    // Query to get all orders by the customer
    $orders = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT id FROM $orders_table WHERE customer_id = %d",
            $user_id
        )
    );

    // Check if the user has any orders
    if ($orders) {
        foreach ($orders as $order) {
            // Get product IDs from the order
            $product_ids = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT product_id FROM $order_product_lookup_table WHERE order_id = %d",
                    $order->id
                )
            );

            // Check if any product matches the specified product ID
            foreach ($product_ids as $product_id) {
                if ($product_id->product_id == $p_id) {
                    return true; // Product found, return true
                }
            }
        }
    }

    // Return false if no matching product is found in any order
    return false;
}

function check_current_user()
{
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        error_log('Current ID: ' . $user_id);
        $p_id = get_post_meta(get_the_ID(), 'product_id', true);
        error_log(wc_get_customer_bought_products($user_id, $p_id));
        //print a style here #if_purchaased {display:none};
        if(wc_get_customer_bought_products($user_id, $p_id)) {
            echo '<style>#if_purchaased_lesson {display:block;}</style>';
            echo '<style>#if_purchaased_checkout {display:none;}</style>';
        } else {
            error_log('Not Purchased');
            //print a style here #if_purchaased {display:block};
            echo '<style>#if_purchaased_lesson {display:none;}</style>';
            echo '<style>#if_purchaased_checkout {display:block;}</style>';
        }
        
    } else {
        error_log('No user is logged in.');
        //print a style here #if_purchaased {display:block};
        echo '<style>#if_purchaased_lesson {display:none;}</style>';
        echo '<style>#if_purchaased_checkout {display:block;}</style>';
    }
}

add_action('wp', 'check_current_user');






function add_course_product_to_cart()
{
    // Check if we are on a single course page (adjust this condition as needed)
    if (is_singular('course')) {

        // Clear WooCommerce cart
        WC()->cart->empty_cart();
        // Get the product ID from the post meta field 'product_id'
        $product_id = get_post_meta(get_the_ID(), 'product_id', true);
        // If we have a valid product ID, add it to the cart with a quantity of 1
        if (!empty($product_id) && is_numeric($product_id)) {
            WC()->cart->add_to_cart($product_id, 1);
        }
    }
}

// Hook into the 'wp' action to run the function after WordPress is fully loaded
add_action('wp', 'add_course_product_to_cart');


