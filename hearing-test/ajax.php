<?php 



// Ajax Handaler

function hearing_test_verify_the_answer()
{
	// Check if post_id is set in the AJAX request
	if (isset($_POST['post_id'])) {
		$post_id = intval($_POST['post_id']); // Sanitize the input
		// Retrieve the post based on the post ID
		$answer = get_post_meta($post_id, 'answer', true);
		$additional_answer = get_post_meta($post_id, 'additional_answer_optional', true);
		// Prepare the response data
		$response = array(
			'success' => true,
			'answer' => $answer,
			'add_answer' => $additional_answer,
		);
	} else {
		// If post_id is not set, send an error response
		$response = array(
			'success' => false,
			'message' => 'Post ID not provided.',
		);
	}

	// Send the response as a JSON
	wp_send_json($response);

	// Always end a function with wp_send_json with wp_die() to properly end the request
	wp_die();
}
add_action('wp_ajax_hearing_test_verify_the_answer', 'hearing_test_verify_the_answer');
add_action('wp_ajax_nopriv_hearing_test_verify_the_answer', 'hearing_test_verify_the_answer');



function add_point_to_database() {
    global $wpdb;

    // Check required fields
    if (!isset($_POST['device_id'], $_POST['post_id'], $_POST['points'], $_POST['label'])) {
        wp_send_json(array('success' => false, 'message' => 'Missing data.'));
        wp_die();
    }

    $device_id = sanitize_text_field($_POST['device_id']);
    $post_id = intval($_POST['post_id']);
    $points = intval($_POST['points']);
    $label = intval($_POST['label']);

    $table_name = $wpdb->prefix . 'hearing_test_points';

    // Fetch existing points record for the device_id
    $existing_record = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE device_id = %s", $device_id));
    $points_array = $existing_record ? json_decode($existing_record->points, true) : array();

    // Update the points array
    if (isset($points_array[$post_id])) {
        // If the post_id already exists, update the values
        $points_array[$post_id]['point'] = $points;
        $points_array[$post_id]['label'] = $label;
        $points_array[$post_id]['tested'] += 1; // Increment the tested count
    } else {
        // If the post_id does not exist, create a new entry
        $points_array[$post_id] = array(
            'point' => $points,
            'label' => $label,
            'tested' => 1
        );
    }

    if ($existing_record) {
        // Update the existing record
        $wpdb->update(
            $table_name,
            array('points' => json_encode($points_array)),
            array('device_id' => $device_id)
        );
    } else {
        // Insert a new record
        $wpdb->insert(
            $table_name,
            array(
                'device_id' => $device_id,
                'points' => json_encode($points_array)
            )
        );
    }

    wp_send_json(array('success' => true, 'message' => 'Points updated successfully.'));
    wp_die();
}
add_action('wp_ajax_add_point_to_database', 'add_point_to_database');
add_action('wp_ajax_nopriv_add_point_to_database', 'add_point_to_database');


function get_total_and_this_point() {
    // Check required fields
    if (!isset($_POST['deviceId'], $_POST['postid'])) {
        wp_send_json(array('success' => false, 'message' => 'Missing data.'));
        wp_die();
    }

    // Sanitize inputs
    $device_id = sanitize_text_field($_POST['deviceId']);
    $post_id = intval($_POST['postid']);

    // Prepare the response
    $response = array(
        'total' => get_device_points($device_id),
        'this'  => get_device_points($device_id, $post_id)
    );

    // Send response
    wp_send_json($response);
    wp_die();
}
add_action('wp_ajax_get_total_and_this_point', 'get_total_and_this_point');
add_action('wp_ajax_nopriv_get_total_and_this_point', 'get_total_and_this_point');


function only_lebel_update() {
    global $wpdb;

    // Check if the necessary data is provided
    if (!isset($_POST['labelValue'], $_POST['postid'])) {
        wp_send_json(array('success' => false, 'message' => 'Missing data.'));
        wp_die();
    }

    // Sanitize the inputs
    $label_value = intval($_POST['labelValue']);
    $post_id = intval($_POST['postid']);

    // Update the label in the database
    $table_name = $wpdb->prefix . 'hearing_test_points';

    // Fetch the existing points record for the post_id
    $device_id = sanitize_text_field($_POST['device_id']); // Assume this is passed, otherwise adjust accordingly
    $existing_record = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE device_id = %s", $device_id));

    if ($existing_record) {
        $points_array = json_decode($existing_record->points, true);

        // Update the label for the specific post_id
        if (isset($points_array[$post_id])) {
            $points_array[$post_id]['label'] = $label_value;

            // Update the record in the database
            $wpdb->update(
                $table_name,
                array('points' => json_encode($points_array)),
                array('device_id' => $device_id)
            );

            wp_send_json(array('success' => true, 'message' => 'Label updated successfully.'));
        } else {
            wp_send_json(array('success' => false, 'message' => 'Post ID not found.'));
        }
    } else {
        
        wp_send_json(array('success' => false, 'message' => 'Record not found.'));

    }

    wp_die();
}
add_action('wp_ajax_only_lebel_update', 'only_lebel_update');
add_action('wp_ajax_nopriv_only_lebel_update', 'only_lebel_update');


function get_filterised_posts() {
    global $wpdb;

    // Ensure required fields are set
    if (!isset($_POST['labelValue'], $_POST['device_id'])) {
        wp_send_json(array('success' => false, 'message' => 'Missing data.'));
        wp_die();
    }

    // Sanitize inputs
    $label_value = sanitize_text_field($_POST['labelValue']);
    $device_id = sanitize_text_field($_POST['device_id']);

    // Fetch all posts of type 'hearing-test'
    $args = array(
        'post_type'      => 'hearing-test',
        'posts_per_page' => -1 // Return all matching posts
    );

    $query = new WP_Query($args);
    $response = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();

            // Check in the hearing_test_points table if the post_id and label match for this device_id
            $table_name = $wpdb->prefix . 'hearing_test_points';
            $record = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE device_id = %s", $device_id));

            if ($record) {
                $points_array = json_decode($record->points, true);
                if (isset($points_array[$post_id]) && $points_array[$post_id]['label'] == $label_value) {
                    $response[] = array(
                        'title'     => get_the_title(),
                        'permalink' => get_permalink(),
                        'id'        => $post_id,
                    );
                }
            }
        }
        if (!empty($response)) {
            wp_send_json(array('success' => true, 'posts' => $response));
        } else {
            wp_send_json(array('success' => false, 'message' => 'No posts found with the specified label.'));
        }
    } else {
        wp_send_json(array('success' => false, 'message' => 'No hearing-test posts found.'));
    }

    wp_die();
}
add_action('wp_ajax_Get_filterised_posts', 'get_filterised_posts');
add_action('wp_ajax_nopriv_Get_filterised_posts', 'get_filterised_posts');
