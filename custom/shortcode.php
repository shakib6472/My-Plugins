<?php 

// Add shortcode function
function post_id_shortcode() {
    // Get the current post ID
    $post_id = get_the_ID();

    // Create the invisible input field with the post ID as its value
    $output = '<input type="hidden" class="post_id_box_for_archive" value="'  . esc_attr($post_id) . '">'; // Change input type as needed

    // Alternatively, you can use h1 or any other HTML element to display the post ID
    // $output = '<h1>' . esc_html($post_id) . '</h1>';

    return $output;
}
add_shortcode('post_id', 'post_id_shortcode');
