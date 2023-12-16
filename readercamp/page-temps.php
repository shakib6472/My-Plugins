<?php

function readers_campaign_function($atts) {
    ob_start(); // Start output buffering
    include(plugin_dir_path(__FILE__) . 'index.php'); // Include the file
    $content = ob_get_clean(); // Get the included file's content and clean the output buffer

    // Additional logic, if needed, for processing the included content

    return $content; // Return the included content as the output of the shortcode
}

add_shortcode('readers_campaign', 'readers_campaign_function');

