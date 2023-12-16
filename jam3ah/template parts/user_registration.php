<?php

//Create total to 0 
function create_author_details($author_id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';

    // Sanitize input
    $author_id = intval($author_id);

    // Insert a new row for the author with initial values
    $wpdb->insert(
        $table_name,
        array(
            'authorID' => $author_id,
            'totalClick' => 0,
            'totalView' => 0
        ),
        array('%d', '%d', '%d')
    );

    // Check if the insert was successful
    if ($wpdb->last_error) {
        // Log or handle the error accordingly
        return false;
    }

    // Successfully created author details
    return true;
}


function update_user_custom_fields_on_registration($user_id)
{
    // Retrieve the values from the registration form (adjust these to match your actual field names)


    $university = sanitize_text_field($_POST['university']);
    $major = sanitize_text_field($_POST['major']);
    $whatsapp = sanitize_text_field($_POST['whatsapp_number']);

    // Update user meta with the retrieved values
    update_user_meta($user_id, 'university', $university);
    update_user_meta($user_id, 'major', $major);
    update_user_meta($user_id, 'mobile_number', $whatsapp);
    create_author_details($user_id);

}


// Hook into user registration
add_action('user_register', 'update_user_custom_fields_on_registration', 10, 1);
