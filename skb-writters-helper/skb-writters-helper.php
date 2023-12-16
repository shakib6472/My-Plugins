<?php 
/**
 * Plugin Name: SKB Writer Helper Plugin
 * Plugin URI:  https://www.facebook.com/shakib6472
 * Description: This Plugin is just for a helping hand of the main website
 * Author:      Shakib Shown
 * Author URI:  https://www.facebook.com/shakib6472
 * Version:     1.0.0
 * Developer:   Shakib Shown
 * Text Domain: skb-writters-helper
 * Elementor tested up to: 3.17.1
 */

 // Add Shortcode
 require_once(plugin_dir_path(__FILE__) . 'shorts/2post.php');
 require_once(plugin_dir_path(__FILE__) . 'shorts/4post.php');
 require_once(plugin_dir_path(__FILE__) . 'shorts/allpost.php');
 require_once(plugin_dir_path(__FILE__) . 'shorts/bookdetails.php');


function enqueue_custom_plugin_styles() {
    wp_enqueue_style( 'custom-plugin-style', plugin_dir_url( __FILE__ ) . 'style.css' );
    wp_enqueue_script('skb-cutom-plugin-scripts', plugin_dir_url(__FILE__) . 'scripts.js', array(), true);
    wp_enqueue_style( 'custom-plugin-bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_plugin_styles' );


