<?php
/*
 * Plugin Name:       Inda's Helper
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

require_once(plugin_dir_path(__FILE__) . '/admin.php');
// require_once(plugin_dir_path(__FILE__) . 'ajax.php');






// // Add a custom widget to the widgets_init action hook.
// function elementor_form_addons_adding($widgets_manager)
// {

//     require_once(__DIR__ . '/widget/form.php');


//     $widgets_manager->register(new \Elementor_form_finder());

// }
// add_action('elementor/widgets/register', 'elementor_form_addons_adding');


// Activation Hook
register_activation_hook(__FILE__, 'shakib_helper_plugin_activation_function');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'shakib_helper_plugin_deactivation_function');

// Activation function
function shakib_helper_plugin_activation_function()
{
    // Your activation code here
    global $wpdb;

    $table_name = $wpdb->prefix . 'code_data';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        code varchar(255) NOT NULL,
        username varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        purchasedate varchar(255) NOT NULL,
        book tinyint(1) NOT NULL DEFAULT 0,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    for ($i = 330; $i < 580; $i++) {

        // Prepare data to be inserted
        $data = array(
            'id' => $i,
            'code' => 'INDAH-' . $i,
            'username' => 'Not Purchased Yet',
            'email' => 'Not Purchased Yet',
            'purchasedate' => 'Not Purchased Yet',
            // Add more columns and values as needed
        );
        $result = $wpdb->insert($table_name, $data);
    }
}


// Deactivation function
function shakib_helper_plugin_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}






function send_custom_email_on_order_completion($order_id)
{
    // Get the order object
    $order = wc_get_order($order_id);

    // Get customer email
    $email = $order->get_billing_email();
    $first_name = $order->get_billing_first_name();
    $last_name = $order->get_billing_last_name();

    // Concatenate first name and last name to get the full name
    $name = $first_name . ' ' . $last_name;

    $email = $order->get_billing_email();

    // Check if the order contains a specific product ID
    //$product_id_to_check = 28; // Test for Localhost Site
    $product_id_to_check = 27314; // Original for Live site



    global $wpdb;
    $code = '';

    $table_name = $wpdb->prefix . 'code_data';

    // Select all data from the custom database table
    $query = "SELECT * FROM $table_name";

    // Retrieve the results
    $results = $wpdb->get_results($query, ARRAY_A);

    // Check if there are any results
    if ($results) {
        // Loop through each row of the results
        foreach ($results as $row) {
            if ($row['book'] == 0) {
                $code = $row['code'];
                $id = $row['id'];

                // Do rest of the Works
                $product_ids = array();
                foreach ($order->get_items() as $item_id => $item) {
                    $product_ids[] = $item->get_product_id();
                }

                if (in_array($product_id_to_check, $product_ids)) {
                    // Set email subject and content
                    $subject = 'Congratulation - Thanks For Subscining';
                    // Set HTML content
                    $html_template = '
                    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
</head>

<body style="font-family: Arial, sans-serif; text-align: center;">
    <div class="box" style="font-family: Arial, sans-serif; text-align: center;">

        <div style=" text-align: center; width: 100%;">

            <img style="width: 450px; text-align: center;"
                src="https://indahisland.com/wp-content/uploads/Copy-of-Social-Content-11_page-0001-3.jpg" alt="">
        </div>

        <p style="margin-top: -60px; margin-bottom: 20px;">Your membership number is <strong>'. $code .'</strong></p>

        <div style=" text-align: center;width: 100%;display: flex;flex-direction: row;justify-content: center;align-items: center; padding: 20px 0;">
        <div style="text-align: center;display: flex;flex-wrap: wrap;justify-content: center;flex-direction: column;align-items: center;">
            <a href="https://drive.google.com/file/d/1rCV7K3qeqYWp9tIbh7PNkA6L0WPCMrTD/view?usp=sharing">
                <div class="button" style="padding: 20px;background-color: #90DEEC;border-radius: 9px;color: black;width: 250px;text-decoration: none;; ">Download your trade handbook
                    </div>
            </a>
            <p>(This handbook will be updated weekly with more exciting offers)</p>
        </div>
        </div>

            <a href="https://youtu.be/Fa4mADgyHfU" target="_blank">
                <img src="https://indahisland.com/wp-content/uploads/Simple-Photocentric-Potrait-Minimalism-Your-Story.png"
                    alt="Video Thumbnail"
                    style="width: 350px; height: 200px; object-fit: cover; border-radius: 13px; object-position: center center;">
            </a>
    </div>

    <div style=" text-align: center;width: 100%;display: flex;flex-direction: row;justify-content: center;align-items: center; padding: 20px 0;"></div>
    <p style="margin-top: 20px;">(Please contact us at <a href="mailto:pr@indahisland.com">pr@indahisland.com</a> should
        you have any questions)</p>
    <p style="margin-top: -10px;">Purchase your 2 for 1 <strong><a
                href="https://indahisland.com/masterclass/">MASTERCLASS</a></strong> </p>

            </div>
</body>

</html>
            ';

                    // Set headers to send HTML email
                    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Indah Island <admin@indahisland.com>');

                    // Send the email
                    wp_mail($email, $subject, $html_template, $headers);

                    $data = array(
                        'code' => $code,
                        'username' => $name,
                        'email' => $email,
                        'purchasedate' => date("Y-m-d H:i:s"),
                        'book' => 1,
                        // Add more columns and values as needed
                    );

                    $where = array(
                        'id' => $id
                    );

                    $result = $wpdb->update($table_name, $data, $where);
                }

                //Stop the loop
                break;
            }
        }
    }
}

// Hook into the WooCommerce order completion action
add_action('woocommerce_order_status_completed', 'send_custom_email_on_order_completion');




// Function to update order status when product with ID 123 is purchased
function update_order_status_on_product_purchase($order_id)
{
    // Get the order object
    $order = wc_get_order($order_id);

    // Check if order exists and is not already completed
    if (!$order || $order->has_status('completed')) {
        return;
    }

    // Check if the order contains the product with ID 123
    //$product_id = 28; // Test for Localhost Site
    $product_id = 27314; // Original for Live site

    $product_found = false;
    foreach ($order->get_items() as $item) {
        if ($item->get_product_id() == $product_id) {
            $product_found = true;
            break;
        }
    }

    // If the product is found, mark the order as completed
    if ($product_found) {
  // Mark the order as completed
              $order->update_status('completed');
        
       
    }
}

// Hook into WooCommerce order status change event with increased priority
add_action('woocommerce_order_status_changed', 'update_order_status_on_product_purchase', -99, 3);
// Function to disable sending order-related emails

