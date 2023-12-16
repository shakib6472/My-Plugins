<?php

function save_offset_settings_callback()
{
    // Handle saving settings here

    $get_offset = $_POST['offset']; // Retrieve serialized form data

    //Creating Post

    // Your keys
    $public_key = '51f2735d74a5dc0ed69ebada63771647';
    $private_key = '4e7fb29bb94b4c07f5d579187996515cad2335da';
    $number = 0;
    $limit = 1; // Number of items per request
    $offset = $get_offset;
    // Endpoint and parameters
    $api_endpoint = 'https://gateway.marvel.com/v1/public/characters';
    $ts = time();
    $hash = md5($ts . $private_key . $public_key);

    $request_url = $api_endpoint . '?apikey=' . $public_key . '&ts=' . $ts . '&hash=' . $hash . '&limit=' . $limit . '&offset=' . $offset;

    $response = wp_remote_get($request_url);

    if (is_wp_error($response)) {
        // Handle error
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // Create custom post type 'character'
        foreach ($data['data']['results'] as $character) {
            // Set up parent post data for character
            $post_data = array(
                'post_title' => $character['name'],
                'post_type' => 'character',
                'post_status' => 'publish',
            );

            // Insert the parent post (character) into the database
            $parent_post_id = wp_insert_post($post_data);

            // Set featured image for character
            if ($parent_post_id && isset($character['thumbnail']['path']) && isset($character['thumbnail']['extension'])) {
                $image_url = $character['thumbnail']['path'] . '.' . $character['thumbnail']['extension'];
                $image_id = media_sideload_image($image_url, $parent_post_id, '', 'id'); // Download image and get ID
                if (!is_wp_error($image_id)) {
                    set_post_thumbnail($parent_post_id, $image_id); // Set featured image
                }

                // Fetch detailed comic information for the character
                if (isset($character['comics']['collectionURI'])) {

                    $comic_endpoint = $character['comics']['collectionURI'];

                    $comics_url = $comic_endpoint . '?apikey=' . $public_key . '&ts=' . $ts . '&hash=' . $hash;
                    $comics_response = wp_remote_get($comics_url);

                    if (!is_wp_error($comics_response)) {
                        $comics_body = wp_remote_retrieve_body($comics_response);
                        $comics_data = json_decode($comics_body, true);

                        // Create child posts (comics) for each character
                        if ($comics_data && isset($comics_data['data']['results'])) {
                            foreach ($comics_data['data']['results'] as $comic) {
                                // Set up child post data for comic
                                $comic_data = array(
                                    'post_title' => $comic['title'],
                                    'post_type' => 'character', // Adjust post type for comics
                                    'post_status' => 'publish',
                                    'post_parent' => $parent_post_id, // Set the parent post ID
                                );

                                // Insert the child post (comic) into the database
                                $child_post_id = wp_insert_post($comic_data);

                                // Save detailed comic data as post meta for reference
                                if ($child_post_id) {
                                    update_post_meta($child_post_id, 'comic_data', $comic);
                                }
                            }
                        }
                    }
                }
            }
        }


    }



    // Send a response back
    wp_send_json_success('Settings saved successfully');
    wp_die(); // Always include this to terminate the Ajax request properly
}

add_action('wp_ajax_save_offset_settings', 'save_offset_settings_callback');
