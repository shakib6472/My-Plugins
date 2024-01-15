<?php 
function change_product_details_to_tutor() {
    // Your AJAX logic goes here
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $date = sanitize_text_field($_POST['date']);
    $hour = sanitize_text_field($_POST['hour']);
    $question = sanitize_text_field($_POST['question']);
    $teacherName = sanitize_text_field($_POST['teacherName']);
    //for real
    $product_id = 4544;
    //for localhost
    //$product_id = 13872 ;

    // Create a new product
    $product = wc_get_product($product_id);

    // Set product attributes
    $product->set_name($teacherName .' - ' . $subject .  ' - ' . $date . ' ' . $hour);
    $product->set_regular_price(10); // Set your desired price
    $product->set_description('Student Name: ' . $name . 'Email: ' . $email .'Phoone: ' . $phone . 'Subject: ' . $subject . '<br>Date: ' . $date . '<br>Time: ' . $hour . '<br>Question: ' . $question);

    // Add the product to the cart
    WC()->cart->empty_cart();

    // Example: Send a response back to the JavaScript
    echo json_encode(array('message' => 'Success! Product added to the cart.'));

    // Always exit after processing to avoid extra output
    die();
}

add_action('wp_ajax_change_product_details_to_tutor', 'change_product_details_to_tutor');
add_action('wp_ajax_nopriv_change_product_details_to_tutor', 'change_product_details_to_tutor'); // For non-logged-in users
