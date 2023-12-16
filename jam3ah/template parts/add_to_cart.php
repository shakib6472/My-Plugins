<?php function add_to_cart() {


    $book_name = $_POST['book-name'];
    $book_peice = $_POST['book-price'];
    $book_description = $_POST['book-description'];
    $book_wa = $_POST['wa-link'];
    $book_lang = $_POST['lang-box'];


    if (isset($_POST['product_id'])) {
        $item_id = sanitize_text_field($_POST['product_id']);

        $cart_item_data = array(
            
        );

        // Add the custom item to the cart
        WC()->cart->add_to_cart($item_id, 1, 0, array(), $cart_item_data);
    }

    $post_id = wp_insert_post(array(
        'post_title' => $book_name,
        'post_type' => 'book',
        'post_status' => 'private' // Set the post status to private
      ));

      if($post_id){
        update_post_meta($post_id, 'books_price', $book_price);
        update_post_meta($post_id, 'whatsapp_link', $book_wa);
        update_post_meta($post_id, 'book_description', $book_description);
        if ($book_lang != 'en') {
          pll_set_post_language($post_id, 'ar');
      } else {
          pll_set_post_language($post_id, 'en');
      }
        $image_id = media_handle_upload('imageupload', $post_id);
        set_post_thumbnail($post_id, $image_id);
        $response = array('success' => true, 'message' => 'Book created successfully.', 'post_id' => $post_id);
      } else {
        $response = array('success' => false, 'message' => 'Error creating book.');
      }

      wp_send_json($response);

      wp_die(); // Always include this to terminate the AJAX request properly
   // wp_send_json(['imageUrl' => $imageUrl]);
}

add_action('wp_ajax_add_to_cart', 'add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');


/* *******************************************************
 * Publishing Wanted Book
********************************************************* */




function publish_want_a_book() {


    $book_name = $_POST['book-name'];
    $book_description = $_POST['book-description'];

    // Get the input value
    $inputNumber = trim($_POST['wa-link']);

    // Remove leading '+' if present
    $inputNumber = ltrim($inputNumber, '+');

    // Remove leading '0' if present
    $inputNumber = ltrim($inputNumber, '0');

    // Remove any spaces
    $inputNumber = str_replace(' ', '', $inputNumber);

    // Create the WhatsApp link
    $book_wa = "https://wa.me/$inputNumber";


  
    $book_lang = $_POST['lang-box'];


    if (isset($_POST['product_id'])) {
        $item_id = sanitize_text_field($_POST['product_id']);

        $cart_item_data = array(
            
        );

        // Add the custom item to the cart
        WC()->cart->add_to_cart($item_id, 1, 0, array(), $cart_item_data);
    }

    $post_id = wp_insert_post(array(
        'post_title' => $book_name,
        'post_type' => 'wantoed-book',
        'post_status' => 'publish' // Set the post status to private
      ));

      if($post_id){
        update_post_meta($post_id, 'whatsapp_link', $book_wa);
        update_post_meta($post_id, 'book_description', $book_description);
        $post_url = get_permalink($post_id);
        if ($book_lang != 'en') {
          pll_set_post_language($post_id, 'ar');
      } else {
          pll_set_post_language($post_id, 'en');
      }
        $image_id = media_handle_upload('imageupload', $post_id);
        set_post_thumbnail($post_id, $image_id);
        $response = array('success' => true, 'message' => 'Wanted Book created successfully.', 'post_id' => $post_id , 'Walink' => $book_wa, 'post_url' => $post_url );
      } else {
        $response = array('success' => false, 'message' => 'Error creating book.');
      }

      wp_send_json($response);

      wp_die(); // Always include this to terminate the AJAX request properly
   // wp_send_json(['imageUrl' => $imageUrl]);
}

add_action('wp_ajax_publish_want_a_book', 'publish_want_a_book');
add_action('wp_ajax_nopriv_publish_want_a_book', 'publish_want_a_book');


