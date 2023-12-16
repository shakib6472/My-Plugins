<?php 

function delete_book_action() {
    if (isset($_POST['post_id']) && intval($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']);
        $result = wp_delete_post($post_id, true);

        if ($result) {
            // Post successfully deleted
            echo 'Post deleted successfully.';
        } else {
            // Error deleting post
            echo 'Error deleting post.';
        }
    } else {
        echo 'Invalid post ID.';
    }
    wp_die(); // Always include this to terminate the AJAX response
}
add_action('wp_ajax_delete_book_action', 'delete_book_action');