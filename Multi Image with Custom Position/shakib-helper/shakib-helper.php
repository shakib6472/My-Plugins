<?php /*
 * Plugin Name:       Academic Helper
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the boikotha websites Custom Plugin. All features are came from here.
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
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}




$plugin_url = plugin_dir_path(__FILE__);


function enqueue_jquery_in_plugin()
{
	wp_enqueue_style('shakib-helper-skb-p-slider-css', plugins_url('style.css', __FILE__), [], '1.0.0', 'all');
	wp_enqueue_style('shakib-helper-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', [], '1.0.0', 'all');
	wp_enqueue_style('shakib-helper-toastify-css', 'https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css', [], '1.0.0', 'all');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquetry-loading-app', 'https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js', array('jquery'), null, true);
	wp_enqueue_script('shakib-helper-toastify-jquery-bulder-js', 'https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.js', [], '2.1.0', true);
	wp_enqueue_script('shakib-helper-catetgory-slider-form-js', plugins_url('script.js', __FILE__) , array('jquery'), null, true);
	wp_localize_script('shakib-helper-catetgory-slider-form-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'home_url' => home_url('/') ));
	wp_enqueue_script('fontowsome', 'https://kit.fontawesome.com/46882cce5e.js' , array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_jquery_in_plugin');


// Add a custom widget to the widgets_init action hook.
function elementor_boikotha_widgets($widgets_manager)
{

	require_once(__DIR__ . '/widgets/image-on-hover.php');


	$widgets_manager->register(new \Elementor_skb_image_on_hover());

}
add_action('elementor/widgets/register', 'elementor_boikotha_widgets');


















// Activation Hook
register_activation_hook(__FILE__, 'shakib_helperactivation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'shakib_helperdeactivation_function');

// Activation function
function shakib_helperactivation_function() {
    // Your activation code here
    // For example, create database tables or set default options
}

// Deactivation function
function shakib_helperdeactivation_function() {
    // Your deactivation code here
    // For example, delete database tables or clean up options
}