<?php 

function add_new_post() {
    // Sanitize and validate the data (replace with appropriate sanitization and validation)
    $post_id = $_POST['postid'];
   

    $post = array(
        'ID' => $post_id,
        'post_status' => 'publish'
      );
  
      wp_update_post($post);
    echo 'Book Published successfully with ID: ' . $post_id ;

     wp_die(); // Always include this to terminate the AJAX response
}
add_action('wp_ajax_add_new_post', 'add_new_post');
