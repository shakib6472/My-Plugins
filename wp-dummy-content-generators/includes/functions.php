<?php
add_action('admin_menu', 'wp_dummy_content_generatorDashboard');
function wp_dummy_content_generatorDashboard(){
    add_menu_page( 'wp_dummy_content_generator dashboard', 'Dummy Content Generator', 'manage_options', 'wp_dummy_content_generator-dashboard', 'wp_dummy_content_generatorMainDashboard','dashicons-database-view',58);
    add_submenu_page ( 'wp_dummy_content_generator-dashboard', 'Generate Users', 'Generate Users', 'read', 'wp_dummy_content_generator-users', 'wp_dummy_content_generatorUsers');
    add_submenu_page ( 'wp_dummy_content_generator-dashboard', 'Generate Posts', 'Generate Posts', 'read', 'wp_dummy_content_generator-posts', 'wp_dummy_content_generatorPosts');
    add_submenu_page ( 'wp_dummy_content_generator-dashboard', 'Generate Products', 'Generate Products', 'read', 'wp_dummy_content_generator-products', 'wp_dummy_content_generatorProducts');
    add_submenu_page ( 'wp_dummy_content_generator-dashboard', 'Manage Thumbnails', 'Manage Thumbnails', 'read', 'wp_dummy_content_generator-thumbnails', 'wp_dummy_content_generatorThumbnails');
}
function wp_dummy_content_generatorMainDashboard(){
    include( WP_PLUGIN_DIR.'/'.plugin_dir_path(wp_dummy_content_generator_PLUGIN_BASE_URL) . 'admin/template/wp_dummy_content_generator-dashboard.php');
}

add_action('admin_bar_menu', 'wp_dummy_content_generator_add_toolbar_items', 100);
function wp_dummy_content_generator_add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'wp_dummy_content_generatorManageDummyData',
        // 'title' => 'Manage dummy data',
        'title' => '<span class="ab-icon dashicons dashicons-hammer"></span>' . __( 'Manage dummy data' ),
        'href'  => 'javascript:void(0)',
        'meta'  => array(
            'title' => __('Manage dummy data'),            
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wp_dummy_content_generatorDeleteUsers',
        'parent' => 'wp_dummy_content_generatorManageDummyData',
        'title' => 'Delete Dummy Users',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Users generated by WP Dummy Content Generator '),
            'class' => 'wp_dummy_content_generatorDeleteUsers wp_dummy_content_generatorDataCleaner'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wp_dummy_content_generatorDeletePosts',
        'parent' => 'wp_dummy_content_generatorManageDummyData',
        'title' => 'Delete Dummy Posts',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Posts generated by WP Dummy Content Generator '),
            'class' => 'wp_dummy_content_generatorDeletePosts wp_dummy_content_generatorDataCleaner'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wp_dummy_content_generatorDeleteProducts',
        'parent' => 'wp_dummy_content_generatorManageDummyData',
        'title' => 'Delete Dummy Products',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Products generated by WP Dummy Content Generator '),
            'class' => 'wp_dummy_content_generatorDeleteProducts wp_dummy_content_generatorDataCleaner'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wp_dummy_content_generatorDeleteThumbnails',
        'parent' => 'wp_dummy_content_generatorManageDummyData',
        'title' => 'Delete Dummy Thumbnails',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Thumbnails generated by WP Dummy Content Generator '),
            'class' => 'wp_dummy_content_generatorDeleteThumbnails wp_dummy_content_generatorDataCleaner'
        ),
    ));
}

function wp_dummy_content_generatorRandomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d H:i:s')
{
    $fMin = strtotime($sStartDate);
    $fMax = strtotime($sEndDate);
    $fVal = mt_rand($fMin, $fMax);
    return date($sFormat, $fVal);
}