<?php /*
 * Plugin Name:       Hearing Test Core
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the Hearing Test websites Custom Plugin. All features are came from here.
 * Version:           1.1.0
 * Requires at least: 5.6
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hearing_test
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
//requir Files

$plugin_url = plugin_dir_path(__FILE__);
require_once(__DIR__ . '/ajax.php');
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/admin.php');
function hearing_test_enqueue_scripts()
{
	//css
	wp_enqueue_style('hearing_test-style', plugin_dir_url(__FILE__) . '/style.css');
	wp_enqueue_style('hearing_test-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('hearing_test-script-font-owsome', 'https://kit.fontawesome.com/46882cce5e.js', array(), null, true);
	wp_enqueue_script('hearing_test-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);

	// Localize the script with new data
	wp_localize_script('hearing_test-script', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		// Add other variables you want to pass to your script here
	));
}

add_action('wp_enqueue_scripts', 'hearing_test_enqueue_scripts');

//Elementor Setup
function elementor_ctds_widgets($widgets_manager)
{

	require_once(__DIR__ . '/ht-posts.php');
	require_once(__DIR__ . '/single-post.php');
	require_once(__DIR__ . '/all-qs.php');
	$widgets_manager->register(new \Elementor_hearing_test_posts());
	$widgets_manager->register(new \Elementor_hearing_test_single_posts());
	$widgets_manager->register(new \Elementor_hearing_test_all_posts());
}

add_action('elementor/widgets/register', 'elementor_ctds_widgets');


// Activation function
function hearing_test_activation_function()
{
	//Creating Database
		global $wpdb;
		global $hearing_test_db_version;
	
		$table_name = $wpdb->prefix . 'hearing_test_points';
		$charset_collate = $wpdb->get_charset_collate();
	
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			device_id varchar(255) NOT NULL,
			points longtext NOT NULL,
			PRIMARY KEY  (id),
			UNIQUE KEY device_id (device_id)
		) $charset_collate;";
	
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		add_option('hearing_test_db_version', $hearing_test_db_version);


}

// Deactivation function
function hearing_test_deactivation_function()
{
	// Your deactivation code here
	// For example, delete database tables or clean up options
}


// Activation Hook
register_activation_hook(__FILE__, 'hearing_test_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'hearing_test_deactivation_function');


$options = get_option('ht_setup_options');

$green_color = isset($options['green_color']) ? esc_attr($options['green_color']) : '#dcfce7'; // Default green
$blue_color = isset($options['blue_color']) ? esc_attr($options['blue_color']) : '#0000FF'; // Default blue
$font_family = isset($options['font_family']) ? esc_attr($options['font_family']) : 'Arial, sans-serif';



