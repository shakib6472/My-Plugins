<?php 


// Activation function
function bba_activation_function() {
    global $wpdb;
    // Define the table name with the WordPress prefix
    $table_name = $wpdb->prefix . 'bba_course_lookup';
    $sql = "CREATE TABLE $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        course_id bigint(20) NOT NULL,
        product_id bigint(20) NOT NULL,
         subscription TINYINT(1) NOT NULL DEFAULT 0,
        membership_id bigint(20) NOT NULL,
        PRIMARY KEY (id)
    );";

    // Include the WordPress upgrade script
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    // Create the table
    dbDelta($sql);
    error_log('Database Created');
}
// Deactivation function
function bba_deactivation_function()
{
    // Your deactivation code here
    // For example, delete database tables or clean up options
}
// Activation Hook

