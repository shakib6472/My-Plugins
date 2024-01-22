<?php /*
 * Plugin Name:       Elementor Custom Slider
 * Plugin URI:        https://facebook.com/shakib6472/
 * Description:       This is the Custom Slider Plugin for Elementor
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        https://facebook.com/shakib6472/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       skbeleslider
 * Domain Path:       /languages
 */

 if (!defined('ABSPATH')) die();
 function elementor_boikotha_widgets( $widgets_manager ) {

	require_once( __DIR__ . 'custom-slider.php' );

	$widgets_manager->register( new \Elementor_boikkotha_custom_slider() );

}

add_action( 'elementor/widgets/register', 'elementor_boikotha_widgets' );