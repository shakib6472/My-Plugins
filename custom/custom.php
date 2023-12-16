<?php
/**
 * Custom Plugin
 * Plugin Name:       custom
 * Plugin URI:        www.facebook.com/shakib6472
 * Description:       Customize WordPress with powerful, professional and intuitive fields.
 * Version:           1.0.7
 * Author:            Shakib Shown
 * Author URI:        www.facebook.com/shakib6472
 * Text Domain:       custom
 * Domain Path:       /lang
 * Requires PHP:      7.0
 * Requires at least: 5.8
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

include plugin_dir_path(__FILE__) .'activation.php';
include plugin_dir_path(__FILE__) .'enquqe.php';
include plugin_dir_path(__FILE__) .'handle2.php';
include plugin_dir_path(__FILE__) .'shortcode.php';

//enqueuing the archive-character.php

function custom_post_type_archive_template($template) {
    if (is_post_type_archive('marvel_characters')) {
        $new_template = plugin_dir_path(__FILE__) . 'archive-character.php';
        if ('' !== $new_template) {
            // Debugging
            // var_dump($new_template); // Check if this path is correct
            // error_log($new_template); // Log the path to the error log for inspection
            return $new_template;
        }
    }
    return $template;
}
add_filter('archive_template', 'custom_post_type_archive_template');


//enqueuing the single-character.php
function custom_character_single_template($template) {
    if (is_singular('marvel_characters') ) {
        if(has_category('character')){
        $new_template = plugin_dir_path(__FILE__) . 'single-character.php';
        if ('' !== $new_template) {
            include($new_template); // Include the custom template file
        exit();
        }
    } else {
        $new_template = plugin_dir_path(__FILE__) . 'single-others.php';
        if ('' !== $new_template) {
            include($new_template); // Include the custom template file
        exit();
    }
}
include($new_template); // Include the custom template file
exit();
}}
// add_filter('template_include', 'custom_character_single_template');
add_action('template_redirect', 'custom_character_single_template');
