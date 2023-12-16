 
<?php
wp_head();
get_header();
$post_id = $_GET['post_id'];
$child = $_GET['child'];
$post_title = get_the_title($post_id);
$child_name = ucfirst($child);

?>
<body>
    <div class="mainbox">
        <div class="container containers">
            <div class="row">
             <div class="col-md-12 text-center">
                <h1 >
                    <?php echo $post_title ?>
               
                </h1>
                <h5>All <?php echo $child_name ?> OF <?php echo $post_title ?></h5>
             </div>
            </div>
        </div>
        <div class="container archives">
            <div class="d-flex flex-wrap">
        <?php
$args = array(
    'post_type' => 'marvel_characters',
    'category_name' => $child,
    'post_parent' => $post_id,
    'posts_per_page' => -1, // Set the number of posts to display, -1 for all
);

$posts = new WP_Query($args);

if ($posts->have_posts()) {
    while ($posts->have_posts()) {
        $posts->the_post(); ?>
        <div class="col-md-3 text-center">
        <div>
       <?php // Display thumbnail
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', ['class' => '', 'alt' => get_the_title()]); // You can change the thumbnail size if needed
        } else {
            echo '<img src="https://marvellegends.co.uk/wp-content/uploads/2023/12/image_not_available.jpg" alt="">';
        }
        // Display post title
        echo '<h3><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h3>';
        ?>
           
        </div>
    </div> 
    <?php
           
    }
} else {
    echo 'No posts found.';
}

wp_reset_postdata(); // Reset the query
?>
    
            </div>
            
        </div>
    </div>
</body>

<?php
wp_footer();
get_footer();
?>