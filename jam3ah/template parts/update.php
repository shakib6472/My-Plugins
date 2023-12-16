<?php

function update_post_action()
{
    $post_id = (int) $_POST['post_id'];
    echo 'POst Id : '. $post_id;

    // Check if the current user can edit this post
    if (current_user_can('edit_post', $post_id)) {
        $post_type = get_post_type($post_id);

        if ($post_type === 'book' || $post_type === 'digital-note') {
            $post_data = array(
                'ID' => $post_id,
                'post_title' => sanitize_text_field($_POST['title']),
            );

            // Update post meta
            update_post_meta($post_id, 'books_price', sanitize_text_field($_POST['price']));
            update_post_meta($post_id, 'whatsapp_link', ($_POST['whatsapp']));
            update_post_meta($post_id, 'book_description', sanitize_text_field($_POST['description']));

            // Update the post
            wp_update_post($post_data);

            echo 'Post updated successfully.';
        } else {
            echo 'You are not authorized to edit this post type.';
        }
    } else {
        echo 'You are not authorized to edit this post.';
    }

    wp_die(); // Always include this to terminate the AJAX response
}

add_action('wp_ajax_update_post_action', 'update_post_action');
add_action('wp_ajax_nopriv_update_post_action', 'update_post_action');
