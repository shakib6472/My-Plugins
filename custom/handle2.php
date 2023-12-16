<?php

function save_offset_settings_callback()
{
    $get_offset = $_POST['offset'];
    $get_limit = $_POST['limit'];

    //Your keys
    //$public_key = '51f2735d74a5dc0ed69ebada63771647'; //older
    $public_key = '51f2735d74a5dc0ed69ebada63771647'; //Premium
    //$private_key = '4e7fb29bb94b4c07f5d579187996515cad2335da'; //older
    $private_key = '4e7fb29bb94b4c07f5d579187996515cad2335da'; //Premium
    $number = 0;
    $limit = $get_limit; // Number of items per request
    $offset = $get_offset;
    // Endpoint and parameters
    $api_endpoint = 'https://gateway.marvel.com/v1/public/characters';
    $ts = time();
    $hash = md5($ts . $private_key . $public_key);

    $request_url = $api_endpoint . '?apikey=' . $public_key . '&ts=' . $ts . '&hash=' . $hash . '&limit=' . $limit . '&offset=' . $offset;
    
    $response = wp_remote_get($request_url);
    // Return the response as JSON


    if (is_wp_error($response)) {
        // Handle error
        $response_data = 'Erorr';
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // Create custom post type 'character'
        foreach ($data['data']['results'] as $character) {
            // Set up parent post data for character
            $post_data = array(
                'post_title' => $character['name'],
                'post_type' => 'marvel_characters',
                'post_category' => array(762), //Carecter Category Tag-id
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
                //Update MetaFields - Parent Posts
                update_field('characters_id', $character['id'], $parent_post_id);
                update_field('comics_items', $character['comics']['available'], $parent_post_id);
                update_field('series', $character['series']['available'], $parent_post_id);
                update_field('stories', $character['stories']['available'], $parent_post_id);
                update_field('events', $character['events']['available'], $parent_post_id);
                update_field('modify_date', $character['modified'], $parent_post_id);
                update_field('description', $character['description'], $parent_post_id);
                
                //Creatig Comics As Sub Items
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
                                    'post_type' => 'marvel_characters', // Adjust post type for comics
                                    'post_status' => 'publish',
                                    'post_category' => array(763),
                                    'post_parent' => $parent_post_id, // Set the parent post ID
                                );

                                // Insert the child post (comic) into the database
                                $child_post_id = wp_insert_post($comic_data);
                                $comic_image_url = $comic['thumbnail']['path'] . '.' . $comic['thumbnail']['extension'];
                                $comic_image_id = media_sideload_image($comic_image_url, $child_post_id, '', 'id'); // Download image and get ID
                                if (!is_wp_error($comic_image_id)) {
                                    set_post_thumbnail($child_post_id, $comic_image_id); // Set featured image
                                }

                                // Save detailed comic data as post meta for reference
                                if ($child_post_id) {
                                    update_post_meta($child_post_id, 'comic_data', $comic);
                                }
                                update_field('comic_id', $comic['id'], $child_post_id);
                                update_field('digitalid', $comic['digitalId'], $child_post_id);
                                update_field('comic_issuenumber', $comic['issueNumber'], $child_post_id);
                                update_field('description', $comic['description'], $child_post_id);
                                update_field('modify_date', $comic['modified'], $child_post_id);
                                update_field('comic_text', $comic['textObjects'][0]['text'], $child_post_id);
                                update_field('comic_print_price', $comic['prices'][0]['price'], $child_post_id);
                                update_field('comic_digital_purchase_price', $comic['prices'][1]['price'], $child_post_id);
                                update_field('comic_creator', $comic['creators']['items'][0]['name'], $child_post_id);
                                


                            }
                        }
                    }
                }

                //Creatig Serise As Sub Items
                if (isset($character['series']['collectionURI'])) {

                    $series_endpoint = $character['series']['collectionURI'];

                    $series_url = $series_endpoint . '?apikey=' . $public_key . '&ts=' . $ts . '&hash=' . $hash;
                    $series_response = wp_remote_get($series_url);

                    if (!is_wp_error($series_response)) {
                        $series_body = wp_remote_retrieve_body($series_response);
                        $series_data = json_decode($series_body, true);

                        // Create child posts (series) for each character
                        if ($series_data && isset($series_data['data']['results'])) {
                            foreach ($series_data['data']['results'] as $series) {
                                // Set up child post data for series
                                $series_data = array(
                                    'post_title' => $series['title'],
                                    'post_type' => 'marvel_characters', // Adjust post type for series
                                    'post_status' => 'publish',
                                    'post_category' => array(765),
                                    'post_parent' => $parent_post_id, // Set the parent post ID
                                );

                                // Insert the child post (series) into the database
                                $child_post_id = wp_insert_post($series_data);
                                $series_image_url = $series['thumbnail']['path'] . '.' . $series['thumbnail']['extension'];
                                $series_image_id = media_sideload_image($series_image_url, $child_post_id, '', 'id'); // Download image and get ID
                                if (!is_wp_error($series_image_id)) {
                                    set_post_thumbnail($child_post_id, $series_image_id); // Set featured image
                                }

                                // Save detailed series data as post meta for reference
                                if ($child_post_id) {
                                    update_post_meta($child_post_id, 'series_data', $series);
                                }
                                

                                update_field('series_id', $series['id'], $child_post_id);
                               
                                update_field('startyear', $series['startYear'], $child_post_id);
                                update_field('endyear', $series['endyear'], $child_post_id);
                                update_field('description', $series['description'], $child_post_id);
                                update_field('modify_date', $series['modified'], $child_post_id);
                                update_field('series_creator', $series['creators']['items'][0]['name'], $child_post_id);

                            }
                        }
                    }
                }

                //Creatig Stories As Sub Items
                if (isset($character['stories']['collectionURI'])) {

                    $stories_endpoint = $character['stories']['collectionURI'];

                    $stories_url = $stories_endpoint . '?apikey=' . $public_key . '&ts=' . $ts . '&hash=' . $hash;
                    $stories_response = wp_remote_get($stories_url);

                    if (!is_wp_error($stories_response)) {
                        $stories_body = wp_remote_retrieve_body($stories_response);
                        $stories_data = json_decode($stories_body, true);

                        // Create child posts (stories) for each character
                        if ($stories_data && isset($stories_data['data']['results'])) {
                            foreach ($stories_data['data']['results'] as $stories) {
                                // Set up child post data for stories
                                $stories_data = array(
                                    'post_title' => $stories['title'],
                                    'post_type' => 'marvel_characters', // Adjust post type for stories
                                    'post_status' => 'publish',
                                    'post_category' => array(766),
                                    'post_parent' => $parent_post_id, // Set the parent post ID
                                );

                                // Insert the child post (stories) into the database
                                $child_post_id = wp_insert_post($stories_data);
                                $stories_image_url = $stories['thumbnail']['path'] . '.' . $stories['thumbnail']['extension'];
                                $stories_image_id = media_sideload_image($stories_image_url, $child_post_id, '', 'id'); // Download image and get ID
                                if (!is_wp_error($stories_image_id)) {
                                    set_post_thumbnail($child_post_id, $stories_image_id); // Set featured image
                                }

                                // Save detailed stories data as post meta for reference
                                if ($child_post_id) {
                                    update_post_meta($child_post_id, 'stories_data', $stories);
                                }
                                

                                update_field('stories_id', $stories['id'], $child_post_id);
                                update_field('modify_date', $stories['modified'], $child_post_id);
                                update_field('stories_creator', $stories['creators']['items'][0]['name'], $child_post_id);

                            }
                        }
                    }
                }
                //Creatig events As Sub Items
                if (isset($character['events']['collectionURI'])) {

                    $events_endpoint = $character['events']['collectionURI'];

                    $events_url = $events_endpoint . '?apikey=' . $public_key . '&ts=' . $ts . '&hash=' . $hash;
                    $events_response = wp_remote_get($events_url);

                    if (!is_wp_error($events_response)) {
                        $events_body = wp_remote_retrieve_body($events_response);
                        $events_data = json_decode($events_body, true);

                        // Create child posts (events) for each character
                        if ($events_data && isset($events_data['data']['results'])) {
                            foreach ($events_data['data']['results'] as $events) {
                                // Set up child post data for events
                                $events_data = array(
                                    'post_title' => $events['title'],
                                    'post_type' => 'marvel_characters', // Adjust post type for events
                                    'post_status' => 'publish',
                                    'post_category' => array(764),
                                    'post_parent' => $parent_post_id, // Set the parent post ID
                                );

                                // Insert the child post (events) into the database
                                $child_post_id = wp_insert_post($events_data);
                                $events_image_url = $events['thumbnail']['path'] . '.' . $events['thumbnail']['extension'];
                                $events_image_id = media_sideload_image($events_image_url, $child_post_id, '', 'id'); // Download image and get ID
                                if (!is_wp_error($events_image_id)) {
                                    set_post_thumbnail($child_post_id, $events_image_id); // Set featured image
                                }

                                // Save detailed events data as post meta for reference
                                if ($child_post_id) {
                                    update_post_meta($child_post_id, 'events_data', $events);
                                }
                                
                                

                                update_field('event_id', $events['id'], $child_post_id);
                                update_field('modify_date', $events['modified'], $child_post_id);
                                update_field('events_creator', $events['creators']['items'][0]['name'], $child_post_id);
                                update_field('startyear', $events['start'], $child_post_id);
                                update_field('endyear', $events['end'], $child_post_id);

                            }
                        }
                    }
                }
            }
        }


    } 
    //$response_data = 'everything is fine';
    wp_send_json($response_data);
    wp_die(); // Always include this to terminate the Ajax request properly
}

add_action('wp_ajax_save_offset_settings', 'save_offset_settings_callback');
