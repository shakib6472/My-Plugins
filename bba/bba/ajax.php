<?php
// Insert order data into custom table
function bba_insert_order_data($order_id)
{
    global $wpdb;

    // Get the order object
    $order = wc_get_order($order_id);
    if (!$order)
        return;

    // Get user ID who placed the order
    $user_id = $order->get_user_id();
    if (!$user_id)
        return;

    // Loop through each product in the order
    foreach ($order->get_items() as $item_id => $item) {
        $product_id = $item->get_product_id();

        // Check if the product is connected to Paid Membership Pro
        $membership_id = 0; // Default value for membership ID
        $subscription = 0;  // Default to 'false'

        // Insert a new row for each product
        $wpdb->insert(
            $wpdb->prefix . 'bba_course_lookup', // Table name
            array(
                'user_id' => $user_id,
                'product_id' => $product_id,
                'course_id' => 0,
                'subscription' => $subscription, // Subscription default to false
                'membership_id' => $membership_id // Default membership ID
            ),
            array('%d', '%d', '%d', '%d', '%d') // Data types: integer
        );
    }

    // If the order is paid, mark it as complete
    $order->update_status('completed');

}
// Hook for COD orders or unpaid orders
add_action('woocommerce_checkout_order_processed', 'bba_insert_order_data', 10, 1);



function add_to_cart_and_go_to_checkout()
{

    $product_id = $_POST['product_id'];

    //Check if we are on a single course page (adjust this condition as needed)
    // Clear WooCommerce cart
    WC()->cart->empty_cart();
    // If we have a valid product ID, add it to the cart with a quantity of 1
    if (!empty($product_id) && is_numeric($product_id)) {
        WC()->cart->add_to_cart($product_id, 1);
    }
    $checkout = home_url('/checkout');

    wp_send_json_success($checkout);


}
add_action('wp_ajax_add_to_cart_and_go_to_checkout', 'add_to_cart_and_go_to_checkout');
add_action('wp_ajax_nopriv_add_to_cart_and_go_to_checkout', 'add_to_cart_and_go_to_checkout');