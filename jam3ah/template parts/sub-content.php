
<?php 
// Get the current URL
$current_url = $_SERVER['REQUEST_URI'];

// Check if the URL contains "/en"
if (strpos($current_url, "/en") !== false) {
    // the Code for only English Language
 $en_language = true;
    
} else {
    // The URL does not contain "/en", so you can handle it differently
    // For example:
    $en_language = false ;
}
?>

<?php 
// Get the author's ID
$author_id = get_current_user_id();

// Function to get the total view count for a specific author
function get_total_view_count_for_author($author_id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';

    $total_view_count = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT totalView FROM $table_name WHERE authorID = %d",
            $author_id
        )
    );

    // Return the total view count
    return $total_view_count;
}
// Function to get the total CLick count for a specific author
function get_total_Click_count_for_author($author_id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'authordetails';

    $total_Click_count = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT totalClick FROM $table_name WHERE authorID = %d",
            $author_id
        )
    );

    // Return the total Click count
    return $total_Click_count;
}



$total_view =  get_total_view_count_for_author($author_id);
$total_click = get_total_Click_count_for_author($author_id);
function get_author_post_count_for_books($author_id) {
    $args = array(
        'author' => $author_id,
        'post_type' => 'book',  // Custom post type "book"
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    $author_books = new WP_Query($args);
    return $author_books->found_posts;
}

$book_post_count = get_author_post_count_for_books($author_id);

if($book_post_count){
    $total_book = $book_post_count;
} else {
    $total_book = 0;
}

?>



<div class="learn-press-subtab-content">
    <div class="learn-press-profile-course__statistic">
        <div id="dashboard-statistic">
            <div class="dashboard-statistic__row">
                <div class="statistic-box" title="Total Course">
                    <p class="statistic-box__text"><?php echo ($en_language !== false) ? 'Total Books' : 'مجموع الكتب '; ?> </p>
                    <span class="statistic-box__number"><?php echo $total_book ?> </span>
                </div>
                <div class="statistic-box" title="Published Course">
                    <p class="statistic-box__text"> <?php echo ($en_language !== false) ? ' Total View' : 'إجمالي العرض'; ?> </p>
                    <span class="statistic-box__number"><?php echo $total_view ?></span>
                </div>
                <div class="statistic-box" title="Pending Course">
                    <p class="statistic-box__text"><?php echo ($en_language !== false) ? 'Total go to WhatsApp' : 'إجمالي الذهاب إلى WhatsApp'; ?></p>
                    <span class="statistic-box__number"><?php echo $total_click ?></span>
                </div>
            </div>
        </div>
    </div>
</div>