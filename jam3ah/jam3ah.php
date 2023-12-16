<?php
/*
 * Plugin Name:       Jam3ah Core
 * Plugin URI:        
 * Description:       This is the core Plugin of this website. 
 * Version:           1.0.19
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shakib Shown
 * Author URI:        
 * Text Domain:       jam3ah
 * Domain Path:       /languages
 */


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

define('JAM3AHPATH', plugin_dir_path(__FILE__));


header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// ... other headers and image serving logic


// Create the "authordetails" table on plugin activation
function create_author_details_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        authorID INT(11) NOT NULL,
        totalView INT(11) DEFAULT 0,
        totalClick INT(11) DEFAULT 0,
        PRIMARY KEY (authorID)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'create_author_details_table');


require_once(JAM3AHPATH . 'template parts/enqueue.php');
require_once(JAM3AHPATH . 'template parts/delete.php');
require_once(JAM3AHPATH . 'template parts/update.php');
require_once(JAM3AHPATH . 'template parts/add_new_post.php');
require_once(JAM3AHPATH . 'template parts/total_view.php');
require_once(JAM3AHPATH . 'template parts/add_to_cart.php');
require_once(JAM3AHPATH . 'template parts/user_registration.php');
require_once(JAM3AHPATH . 'template parts/add_xustomized_product.php');
require_once(JAM3AHPATH . 'shortcodes/sellar-dashboard.php');
require_once(JAM3AHPATH . 'shortcodes/edit.php');
require_once(JAM3AHPATH . 'shortcodes/thankyou.php');
require_once(JAM3AHPATH . 'shortcodes/wantabook.php');


//enque all CSS & JS

function jam3ah_enqueue_scripts_function()
{
    wp_enqueue_style("dashboard_css", plugins_url('assetes/css/dashboard.css', __FILE__), array(), '1.0.0', 'all');
    wp_enqueue_style("font-ws-icnos-skb", 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('jam3ah_skb_main_js', plugins_url('/assetes/js/skbmain.js', __FILE__), array('jquery'), '1.0.0', true);


    $datas = array(
        'url' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url('/'),
    );

    wp_localize_script('jam3ah_skb_main_js', 'adminUrl', $datas);

    if (is_singular('book') || is_singular('digital-note')) {
        wp_enqueue_script('jam3ah_single_js', plugins_url('assetes/js/single.js', __FILE__), array('jquery'), '1.0.0', true);
        $post_author_id = get_post_field('post_author', get_the_ID());
        wp_localize_script('jam3ah_single_js', 'postId', $post_author_id);
    }

    

}

add_action("wp_enqueue_scripts", "jam3ah_enqueue_scripts_function");


function enqueue_custom_styles_based_on_role() {
    $current_user = wp_get_current_user();
    if (in_array('tutor_instructor', $current_user->roles) && !current_user_can('administrator')) {
        wp_enqueue_style('tutor_instructor_styles', plugins_url('assetes/css/custom-role-styles.css', __FILE__));
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_styles_based_on_role');



//Define Single Product Page

// Hook into template redirect
add_action('template_redirect', 'custom_specific_product_template');

function custom_specific_product_template() {
    $product_id = 16036; //for test 15495 , Actual 16036

    if (is_singular('product') && (get_the_ID() == $product_id)) {
        // Check if your plugin's custom single product template exists
        $plugin_template = plugin_dir_path(__FILE__) . 'template parts/bags-product-custom.php';

        if (file_exists($plugin_template)) {
            // Assign the custom template to the specific product
            include $plugin_template;
            exit;
        }
    }
}




function set_static_address_lines_on_order_creation($order) {
    $user_id = get_current_user_id();
    // Replace the billing address with static lines
    
    $area =  get_user_meta($user_id, 'area', true) ;
    $block =  get_user_meta($user_id, 'block', true) ;
    $house =  get_user_meta($user_id, 'house', true) ;
    $floor =  get_user_meta($user_id, 'floor', true) ;
    $jaddah =  get_user_meta($user_id, 'jaddah', true) ;
    $street =  get_user_meta($user_id, 'street', true) ;
    $others = 'Others';
    $othres2 = ('others2');
    
    $details =  "Area: " . $area . ", " . "Block: " . $block .", " . "Street: " . $street .", " . "House: " . $house .", " . "Floor: " . $floor.", " . "others: " . $others.", " . "Others2: " . $othres2;

    // Set billing address lines
    $order->set_billing_address_1($details);

    // Set shipping address lines
    $order->set_shipping_address_1($details);
}


add_action('woocommerce_checkout_create_order', 'set_static_address_lines_on_order_creation');
