<?php /*
 * Plugin Name:       Renu Addons
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the renuaddons websites Custom Plugin. All features are came from here.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       renuaddons
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

$plugin_url = plugin_dir_path(__FILE__);



function enqueue_sdfsdg_jquery_in_plugin()
{
    wp_enqueue_script('jquery');
    // Register Bootstrap CSS
    wp_enqueue_style('bootstrap-renu-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2');
}
add_action('wp_enqueue_scripts', 'enqueue_sdfsdg_jquery_in_plugin');


// Add a custom widget to the widgets_init action hook.
function elementor_renu_addons_adding($widgets_manager)
{

    require_once(__DIR__ . '/widgets/search-tutor/search-tutor.php');
    require_once(__DIR__ . '/widgets/subject-slider/subject-slider.php');
    require_once(__DIR__ . '/widgets/tutor-profile/tutor-profile.php');
    require_once(__DIR__ . '/widgets/booking-page/booking-page.php');
    require_once(__DIR__ . '/change-product.php');

    $widgets_manager->register(new \Elementor_renu_search_tutor());
    $widgets_manager->register(new \Elementor_renu_subject_slider());
    $widgets_manager->register(new \Elementor_renu_tutorprofile());
    $widgets_manager->register(new \Elementor_renu_booking_page());
}
add_action('elementor/widgets/register', 'elementor_renu_addons_adding');


function renu_addons_settings_activate()
{
}

register_activation_hook(__FILE__, 'renu_addons_settings_activate');
