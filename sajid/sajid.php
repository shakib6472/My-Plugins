<?php
/*
 * Plugin Name:       Shajid's Helper
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the shakib-helper websites Custom Plugin. All features are came from here.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       shakib-helper
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

//require_once(plugin_dir_path(__FILE__) . 'ajax.php');


// Enqueueing styles
function sazid_plugin_enqueue_styles()
{
    // Enqueue the style file
    wp_enqueue_style('sazid-plugin-styles', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0', 'all');
    wp_enqueue_style('sazid-plugin-bootstrap-styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-sazid-script', plugin_dir_url(__FILE__) . 'scripts.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'sazid_plugin_enqueue_styles');



// Add a custom widget to the widgets_init action hook.
function elementor_form_addons_adding($widgets_manager)
{

    require_once(__DIR__ . '/calculator.php');
    require_once(__DIR__ . '/calculator2.php');


    $widgets_manager->register(new \Elementor_calculator_form_build());
    $widgets_manager->register(new \Elementor_calculator2_form_build());
}
add_action('elementor/widgets/register', 'elementor_form_addons_adding');


// Activation Hook
register_activation_hook(__FILE__, 'sazid_helper_plugin_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'sazid_helper_plugin_deactivation_function');

// Activation function
function sazid_helper_plugin_activation_function()
{
}


// Deactivation function
function sazid_helper_plugin_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}
