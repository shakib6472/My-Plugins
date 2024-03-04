<?php /*
 * Plugin Name:       Form Finder
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the renuaddons websites Custom Plugin. All features are came from here.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       form-finder
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

$plugin_url = plugin_dir_path(__FILE__);



function enqueue_fsdsda_jquery_in_plugin()
{


    // Register Bootstrap CSS
    wp_enqueue_style('bootstrap-renu-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2');
    wp_enqueue_script('jquery');

}
add_action('wp_enqueue_scripts', 'enqueue_fsdsda_jquery_in_plugin');


// Add a custom widget to the widgets_init action hook.
function elementor_form_addons_adding($widgets_manager)
{

    require_once(__DIR__ . '/widget/form.php');


    $widgets_manager->register(new \Elementor_form_finder());

}
add_action('elementor/widgets/register', 'elementor_form_addons_adding');


function renu_addonssssss_settings_activate() {
}

register_activation_hook(__FILE__, 'renu_addonssssss_settings_activate');

