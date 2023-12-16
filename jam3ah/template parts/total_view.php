<?php


function update_total_view_for_author($author_id, $new_total_view)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';

    $wpdb->update(
        $table_name,
        array('totalView' => $new_total_view),
        array('authorID' => $author_id)
    );
}



function update_total_click_for_author($author_id, $new_total_click)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';

    $wpdb->update(
        $table_name,
        array('totalClick' => $new_total_click),
        array('authorID' => $author_id)
    );
}




// function total_view_counting_function_jam3ah()
// {
//     // Check if it's a single page of the custom post type
//     if (is_singular('book') || is_singular('digital-note')) {
//         // Get the author ID 
//         $author_id = get_post_field('post_author', get_the_ID());
//         // Get Total View ID 
//         $total_view = $wpdb->get_var(
//             $wpdb->prepare(
//                 "SELECT totalView FROM $table_name WHERE authorID = %d",
//                 $author_id
//             )
//         );
//         $total_view++;

//         // Example usage: Update totalClick for authorID 123 to 50
//         update_total_view_for_author($author_id,  $total_view);

//     }
// }

// add_action('init', 'total_view_counting_function_jam3ah');

function total_view_book()
{
    $post_author_id = $_POST['postid'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';
    $total_view = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT totalView FROM $table_name WHERE authorID = %d",
            $post_author_id
        )
    );
    $total_view++;
    update_total_view_for_author($post_author_id ,  $total_view);


    wp_die();

}


add_action('wp_ajax_total_view_book', 'total_view_book');
add_action('wp_ajax_nopriv_total_view_book', 'total_view_book');




function total_click_book()
{
    $post_author_id = $_POST['postid'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';
    $total_click = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT totalClick FROM $table_name WHERE authorID = %d",
            $post_author_id
        )
    );
    $total_click++;
    update_total_click_for_author($post_author_id ,  $total_click);


    wp_die();

}

add_action('wp_ajax_total_click_book', 'total_click_book');
add_action('wp_ajax_nopriv_total_click_book', 'total_click_book');