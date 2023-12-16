<?php 


function handle_customized_product_data() {
    if (isset($_POST['$image_data'], $_POST['$product_id'], $_POST['$product_name'], $_POST['$product_price'])) {
        $image_data = $_POST['$image_data'];
        $product_id = $_POST['$product_id'];
        $product_name = $_POST['$product_name'];
        $product_price = $_POST['$product_price'];
       
        
        // Set product name
        $post = array(
            'ID'         => $product_id,
            'post_title' => $product_name
        );
        wp_update_post($post);

        // Set featured image
        if ($image_data) {
            echo 'Image Data';
            $upload_dir = wp_upload_dir();
            $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image_data));
            $filename = 'custom_image_' . time() . '.png';
            $upload_path = $upload_dir['path'] . '/' . $filename;
            file_put_contents($upload_path, $image_data);

            $wp_filetype = wp_check_filetype($filename, null);
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            $attachment_id = wp_insert_attachment($attachment, $upload_path, $product_id);
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_path);
            wp_update_attachment_metadata($attachment_id, $attachment_data);
            set_post_thumbnail($product_id, $attachment_id);
        }

        // Set product price
        update_post_meta($product_id, '_regular_price', $product_price);
        update_post_meta($product_id, '_price', $product_price);
// Include necessary WooCommerce files
require_once(ABSPATH . 'wp-load.php');

// Define the product ID and quantity

$quantity = 1;

// Add the product to the cart
if (WC()->cart) {
    // Check if the product exists in the cart
    $cart_id = WC()->cart->generate_cart_id($product_id);
    $cart_item_id = WC()->cart->find_product_in_cart($cart_id);

    // If the product is not already in the cart, add it
    if (!$cart_item_id) {
        WC()->cart->add_to_cart($product_id, $quantity);
    } else {
        // If the product is already in the cart, update the quantity
        WC()->cart->set_quantity($cart_item_id, $quantity, true);
    }
}
       
        
    } else {
        echo json_encode(array('error' => 'Incomplete data.'));
    }



    wp_die();
}



add_action('wp_ajax_customized_product_data', 'handle_customized_product_data');
add_action('wp_ajax_nopriv_customized_product_data', 'handle_customized_product_data');



//Shipping Details Adding 




function update_custom_shipping_field() {

    $area = sanitize_text_field($_POST['area']);
    $block = sanitize_text_field($_POST['Block']);
    $house = sanitize_text_field($_POST['House']);
    $floor = sanitize_text_field($_POST['Floor']);
    $jaddah = sanitize_text_field($_POST['Jaddah']);
    $street = sanitize_text_field($_POST['Street']);
        
        // Store the value in a user's session, database, or options based on your requirement
        // For example, to store in user meta (requires user ID):
        $user_id = get_current_user_id();
        if ($user_id) {
            update_user_meta($user_id, 'area', $area);
            update_user_meta($user_id, 'block', $block);
            update_user_meta($user_id, 'house', $house);
            update_user_meta($user_id, 'floor', $floor);
            update_user_meta($user_id, 'jaddah',$jaddah);
            update_user_meta($user_id, 'street', $street);
            echo 'User meta Updated';
        }
    
    wp_die(); // This is required to terminate immediately and return a proper response
}

add_action('wp_ajax_update_custom_shipping_field', 'update_custom_shipping_field');
add_action('wp_ajax_nopriv_update_custom_shipping_field', 'update_custom_shipping_field');