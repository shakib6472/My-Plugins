<?php /*
 * Plugin Name:       Pixel Digital Helper
 * Plugin URI:        https://pixelsdigital.net/
 * Description:       This is the pixel-digital websites Custom Plugin. All features are came from here.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pixel Digital
 * Author URI:        https://pixelsdigital.net/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pixel-digital
 * Domain Path:       /languages
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


$plugin_url = plugin_dir_path(__FILE__);



function enqueue_jquery_in_plugin()
{

    // //Adding Css & JS
    wp_enqueue_style('pixel-digital-Styles_sk-single-page-css', plugin_dir_url(__FILE__) . 'style.css', [], '1.0.0', 'all');
    wp_enqueue_style('pixel-digital-single-page-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', [], '1.0.0', 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/46882cce5e.js', [], '1.0.0', true);
    wp_enqueue_script('boikotha-custom-slick-slider-slick-jquery-form-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', [], '1.0.0', true);
    wp_enqueue_script('main-scrip-base-jquery-js', plugin_dir_url(__FILE__) . 'script.js', [], '1.0.0', true);
    //wp_enqueue_script('boikotha-elevatezoom-lense-skb-js', 'https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js', [], '1.1.6', true);

    if (is_single('product')) {
        global $product;

        if ($product) {
            wp_localize_script('pixel-digital-single-page-js', 'pixelDigitalAjax', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'post_id' => $product->get_id(),
            ]);
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_jquery_in_plugin');


// Add a custom widget to the widgets_init action hook.
function elementor_pixel_digital_widgets($widgets_manager)
{

    require_once(__DIR__ . '/widgets/product-slider/product-slider.php');
    require_once(__DIR__ . '/widgets/table/table.php');
    require_once(__DIR__ . '/widgets/breadcumbs.php');
    require_once(__DIR__ . '/widgets/feature-image-slider.php');
    require_once(__DIR__ . '/widgets/categories.php');
    require_once(__DIR__ . '/widgets/submenu.php');
    require_once(__DIR__ . '/widgets/product-grid/product-grid.php');



    $widgets_manager->register(new \Elementor_pixel_digital_product_slider());
    $widgets_manager->register(new \Elementor_pixel_digital_breadcumbs());
    $widgets_manager->register(new \Elementor_pixel_digital_single_page_table());
    $widgets_manager->register(new \Elementor_pixel_digital_single_page_feature_image_slider());
    $widgets_manager->register(new \Elementor_pixel_digital_single_page_category());
    $widgets_manager->register(new \Elementor_pixel_digital_product_grid());
    $widgets_manager->register(new \Elementor_pixel_digital_submenu());
}
add_action('elementor/widgets/register', 'elementor_pixel_digital_widgets');


// Activation Hook
register_activation_hook(__FILE__, 'pixel_digital_plugins_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'pixel_digital_plugins_deactivation_function');

// Activation function
function pixel_digital_plugins_activation_function()
{
    // Your activation code here
    // For example, create database tables or set default options
}

// Deactivation function
function pixel_digital_plugins_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}




function exclude_post_types_from_search($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        // Include only "medical-item" post type
        $query->set('post_type', 'medical-item');
    }
}
add_action('pre_get_posts', 'exclude_post_types_from_search');
