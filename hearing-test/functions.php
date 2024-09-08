<?php 




function get_device_points($device_id, $post_id = null) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'hearing_test_points';

    // Fetch the record for the given device_id
    $record = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE device_id = %s", $device_id));

    if ($record) {
        $points_array = json_decode($record->points, true);
        if (is_array($points_array)) {
            if ($post_id !== null) {
                // Check if specific post_id exists in the points array
                if (isset($points_array[$post_id])) {
                    $this_point_data = $points_array[$post_id];
                    return array(
                        'point'  => intval($this_point_data['point']),
                        'label'  => intval($this_point_data['label']),
                        'tested' => intval($this_point_data['tested']),
                    );
                } else {
                    // If the post_id is not found, return default values
                    return array(
                        'point'  => 0,
                        'label'  => 0,
                        'tested' => 0,
                    );
                }
            } else {
                // Return total points
                return array_sum(array_column($points_array, 'point'));
            }
        }
    }

    // If no record is found or points_array is not valid
    if ($post_id !== null) {
        return array(
            'point'  => 0,
            'label'  => 0,
            'tested' => 0,
        );
    } else {
        return 0;
    }
}






