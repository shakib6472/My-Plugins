<?php 

function myplugin_enqueue_custom_jquery()
{
    // URL for the jQuery library hosted on a CDN
    $jquery_cdn = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js';

    // Output the jQuery script tag
    echo '<script src="' . esc_url($jquery_cdn) . '"></script>';
}

// Hook the function to the 'wp_head' action to place it in the header
add_action('wp_head', 'myplugin_enqueue_custom_jquery');
function enqueue_admin_script($hook) {
    // Enqueue script only on specific admin pages
    // Replace 'your_admin_page_hook' with the hook of your admin page
        wp_enqueue_style('waitMe-css', plugins_url('waitMe.css', __FILE__));
        wp_enqueue_style('custom-main-style-css', plugins_url('style.css', __FILE__));
        wp_enqueue_script('waitMe-script', plugin_dir_url( __FILE__ ) . 'script.js', array('jquery'), '1.0', true);
        wp_enqueue_script('admin-custom-script', plugin_dir_url( __FILE__ ) . 'waitMe.js', array('jquery'), '1.0', true);

        // Localize the script with data
        wp_localize_script('admin-custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
    
}
add_action('admin_enqueue_scripts', 'enqueue_admin_script');
function enqueue_frontend_enqueues() {
    // Enqueue main stylesheet for your plugin
    wp_enqueue_script('customdsfs-script', plugin_dir_url( __FILE__ ) . 'script.js', array('jquery'), '1.0', true);
    wp_enqueue_style('customdsfs-chunk-css', plugins_url('chunk.css', __FILE__), array(), '1.0.0', 'all');
    wp_enqueue_style('customdsfs-main-style-css', plugins_url('style.css', __FILE__), array(), '1.0.0', 'all');
    wp_enqueue_style('customdsfs-bootstrap-min-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all');
    // Add more enqueued styles or scripts here if needed
}
add_action('wp_enqueue_scripts', 'enqueue_frontend_enqueues');




