<?php

// function jam3ah_enqueue_scripts_function() { 
//     wp_enqueue_style("dashboard_css",plugin_dir_url( __FILE__ ) . '../assetes/css/dashboard.css', array(), false
//     ,'all');
//     wp_enqueue_script('jquery'); 
//     wp_enqueue_script('jam3ah_main_js', plugin_dir_url( __FILE__ ) . '../assetes/js/main.js', array('jquery'), '1.0.0', true); 
//     $datas = array(
//         'url' => admin_url('admin-ajax.php'),
//         'homeUrl' => home_url('/'),
//     );

//     wp_localize_script('jam3ah_main_js', 'adminUrl', $datas);

//     if(is_singular('book') || is_singular('digital-note')) {

//     wp_enqueue_script('jam3ah_single_js', plugin_dir_url( __FILE__ ) . '../assetes/js/single.js', array('jquery'), '1.0.0', true); 
//         $post_author_id = get_post_field('post_author', get_the_ID());
//     wp_localize_script('jam3ah_single_js', 'postId', $post_author_id);

//     }
// } 

// add_action("wp_enqueue_scripts", "jam3ah_enqueue_scripts_function");

