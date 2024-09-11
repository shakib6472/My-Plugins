<?php 

function add_new_order_for_this_bottole()
{
    $package = isset($_POST['package']) ? intval($_POST['package']) : 0; 
    $delivery = isset($_POST['deliveryValue']) ? sanitize_text_field($_POST['deliveryValue']) : ''; 
    $product_id = 928; 

    // Define prices based on quantity
    $price_per_product = 59; // Default price for 1 product
    if ($package == 2) {
        $price_per_product = 41.33;
    } elseif ($package == 3) {
        $price_per_product = 38.33;
    }

    if ($package > 0 && !empty($delivery)) {
        // Create a new order
        $order = wc_create_order();

        // Get the product
        $product = wc_get_product($product_id);

        if ($product) {
            // Set the custom price for the product
            $product->set_price($price_per_product);

            // Add the product to the order with the custom price and quantity
            $order->add_product($product, $package);

            // Add custom meta data for delivery type
            $order->add_meta_data('Delivery', $delivery);
        }

        // Set payment method to COD
        $order->set_payment_method('cod');

        // Set order status to pending
        $order->set_status('pending');

        // Calculate the totals
        $order->calculate_totals();
        // Return success response
        wp_send_json_success( $order->get_id());
    } else {
        // Return error if package or delivery is invalid
        wp_send_json_error('Invalid package or delivery value.');
    }
}

add_action('wp_ajax_add_new_order_for_this_bottole', 'add_new_order_for_this_bottole');
add_action('wp_ajax_nopriv_add_new_order_for_this_bottole', 'add_new_order_for_this_bottole');


