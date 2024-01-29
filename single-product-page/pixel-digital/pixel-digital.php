<?php /*
 * Plugin Name:       Pixel Digital Helper
 * Plugin URI:        https://pixelsdigital.net/
 * Description:       This is the pixel-digital websites Custom Plugin. All features are came from here.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pixel Digital
 * Author URI:        https://pixelsdigital.net/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pixel-digital
 * Domain Path:       /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$plugin_url = plugin_dir_path( __FILE__ );



function enqueue_jquery_in_plugin() {
   
    // //Adding Css & JS
    wp_enqueue_style('pixel-digital-Styles_sk-single-page-css', plugin_dir_url(__FILE__) . 'style.css', [], '1.0.0', 'all');
    wp_enqueue_style('pixel-digital-single-page-css', plugin_dir_url(__FILE__) . '/widgets/single/single.css', [], '1.0.0', 'all');
    wp_enqueue_style('pixel-digital-single-page-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', [], '1.0.0', 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/46882cce5e.js', [], '1.0.0', true);
    wp_enqueue_script('boikotha-custom-slick-slider-slick-jquery-form-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', [], '1.0.0', true);
    wp_enqueue_script('pixel-digital-single-page-js', plugin_dir_url(__FILE__) . '/widgets/single/single.js', ['jquery'], '1.0.0', true);
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
function elementor_pixel_digital_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/single/single.php' );
	require_once( __DIR__ . '/widgets/product-slider/product-slider.php' );
	require_once( __DIR__ . '/widgets/product-grid/product-grid.php' );


	$widgets_manager->register( new \Elementor_pixel_digital_product_single_page() );
	$widgets_manager->register( new \Elementor_pixel_digital_product_slider() );
	$widgets_manager->register( new \Elementor_pixel_digital_product_grid() );

}
add_action( 'elementor/widgets/register', 'elementor_pixel_digital_widgets' );


 // Activation Hook
register_activation_hook(__FILE__, 'pixel_digital_plugins_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'pixel_digital_plugins_deactivation_function');

// Activation function
function pixel_digital_plugins_activation_function() {
    // Your activation code here
    // For example, create database tables or set default options
}

// Deactivation function
function pixel_digital_plugins_deactivation_function() {
    // Your deactivation code here
    // For example, delete database tables or clean up options
}


//==========================================================
// Add Meta box with Publisher Name - From Book Publisher ID
//===========================================================
// Add Meta box with Authors Name From Book Authors Post Type
//==========================================================
function add_product_pixel_digital_meta_box() {
    add_meta_box(
        'author_meta_box',
        'Book Author',
        'display_author_meta_box',
        'product',
        'side',
        'default'
    );
    add_meta_box(
        'publisher_meta_box',
        'Book Publisher',
        'display_book_publisher_meta_box',
        'product',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_product_pixel_digital_meta_box');


// Display the content of the meta box
function display_author_meta_box($post) {
    // Get the current author ID if it's already set
    $author_id = get_post_meta($post->ID, '_book_author_id', true);

    // Query to get the authors from the 'book-author' post type // Corrected from 'author' to 'book-author'
    $authors = get_posts(array(
        'post_type' => 'book-author',
        'posts_per_page' => -1,
    ));

    // Display a dropdown with the list of authors
    echo '<label for="book_author_id">Select Book Author:</label>'; // Corrected from 'author_id' to 'book_author_id'
    echo '<select name="book_author_id" id="book_author_id">'; // Corrected from 'author_id' to 'book_author_id'
    echo '<option value="">Select an author</option>';
    foreach ($authors as $author) {
        echo '<option value="' . esc_attr($author->ID) . '" ' . selected($author->ID, $author_id, false) . '>' . esc_html($author->post_title) . '</option>';
    }
    echo '</select>';
}


//==========================================================
// Add Meta box with Publisher Name - From Book Publisher ID
//==========================================================


// Display the content of the meta box
function display_book_publisher_meta_box($post) {
    // Get the current publisher ID if it's already set // Corrected comment from 'author' to 'publisher'
    $publisher_id = get_post_meta($post->ID, '_book_publisher_id', true);

    // Query to get the publishers from the 'book-publisher' post type // Corrected from 'author' to 'book-publisher'
    $publishers = get_posts(array(
        'post_type' => 'book-publisher',
        'posts_per_page' => -1,
    ));

    // Display a dropdown with the list of publishers // Corrected comment from 'author' to 'publisher'
    echo '<label for="book_publisher_id">Select Book Publisher:</label>'; // Corrected from 'author_id' to 'book_publisher_id'
    echo '<select name="book_publisher_id" id="book_publisher_id">'; // Corrected from 'author_id' to 'book_publisher_id'
    echo '<option value="">Select a publisher</option>';
    foreach ($publishers as $publisher) {
        echo '<option value="' . esc_attr($publisher->ID) . '" ' . selected($publisher->ID, $publisher_id, false) . '>' . esc_html($publisher->post_title) . '</option>';
    }
    echo '</select>';
}



//==========================================================
// Save the selected author ID & Publisher ID as post meta
//==========================================================
// 
function save_author_meta_box($post_id) {
    if (isset($_POST['book_author_id'])) {
        update_post_meta($post_id, '_book_author_id', sanitize_text_field($_POST['book_author_id'])); // Corrected from 'author_id' to 'book_author_id'
    }
    if (isset($_POST['book_publisher_id'])) {
        update_post_meta($post_id, '_book_publisher_id', sanitize_text_field($_POST['book_publisher_id'])); // Corrected from 'author_id' to 'book_publisher_id'
    }
}
add_action('save_post_product', 'save_author_meta_box');

// Remove all functions hooked to woocommerce_shop_loop




// remove_all_actions('woocommerce_shop_loop');

// function skb_adding_loop_or_something_inshop_page() {

// echo 'HI My name is shakib I can do this easlily for what i want to told you Are you okay??';
// }

// add_action('woocommerce_shop_loop','skb_adding_loop_or_something_inshop_page');
