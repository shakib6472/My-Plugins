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

<div class="books-content content active">
    <div class="row">
        <div class="col">
    <h3 class=" p-4 text-center">My Books</h3>
            <?php

            $query = new WP_Query(
                array(
                    'author' => $user_id,
                    'post_type' => 'book',
                    'post_per_page' => 100,
                    'post_status' => 'publish'
                )
            );

            if ($query->have_posts()) { ?>
                <table class="table">
                    <tr>
                        <th width="70%"><?php echo ($en_language !== false) ? 'Books Name' : 'اسم الكتاب'; ?></th>
                        <th width="30%"><?php echo ($en_language !== false) ? 'Action' : 'فعل'; ?></th>
                    </tr>

                    <?php
                    while ($query->have_posts()) {
                        $query->the_post(); ?>

                        <tr>
                            <td class="text-left justify-content-center ali">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php echo get_the_title(); ?>
                                </a>
                            </td>
                            <td>
                                <a href='<?php echo esc_url(home_url('/edit')) ?>?id=<?php echo get_the_ID(); ?>&action=edit'
                                    class="edit"><?php echo ($en_language !== false) ? 'Edit' : 'يحرر'; ?></a>
                                <a href='#' post-id="<?php echo get_the_ID(); ?>" class='delete'><?php echo ($en_language !== false) ? 'Delete' : 'يمسح'; ?></a>
                            </td>
                        </tr>

                    <?php }
                    wp_reset_postdata(); // Restore original post data
            } else {
                echo '<h5> You Didn\'t Publish any Books Yet </h5>';
            }
            ?>
            </table>
            <?php
            echo paginate_links(
                array(
                    'base' => str_replace( 9999999, '%#%', esc_url( get_pagenum_link( 99999999 ) ) ),
                    'format' => '?paged=%#%',
                    'type'   => 'list',
                    'current' => max( 1, get_query_var('paged') ),
                    'total'   => $query->max_num_pages,
                    'prev_text'   => ($en_language !== false) ? 'Previous' : 'سابق',
                    'next_text'   => ($en_language !== false) ? 'Next' : 'التالي'
                ));

            ?>
        </div>

    </div>
</div>