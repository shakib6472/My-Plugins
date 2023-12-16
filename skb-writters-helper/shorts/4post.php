<?php 

function skb_blog_post_4_row_shortcode() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $posts_query = new WP_Query($args);

    if ($posts_query->have_posts()) {
        $output = '<div class="bookbox">
        <div class="container">
            <div class="row">';
        while ($posts_query->have_posts()) {
            $posts_query->the_post();
            $post_titel = get_the_title();
            $link = get_permalink(get_the_ID());
            $rating = get_post_meta(get_the_ID(),'book_rating', true);
            $categories = get_the_category(); // Returns an array of categories
            if ($categories) {
                foreach ($categories as $category) {
                    $category_link = get_category_link($category);
                    $catego =  $category->name;
                    break;
                }
            }
            if (has_post_thumbnail()) {
                // Get the ID of the featured image
                $thumbnail_id = get_post_thumbnail_id();
                
                // Get the URL of the featured image
                $image_url = wp_get_attachment_image_src($thumbnail_id, 'full');
            
                // $image_url is an array containing the URL at index 0
                if ($image_url) {
                    $image_url = $image_url[0]; // Retrieve the URL from the array
                }
            } else {
                $image_url = 'https://templatekit.jegtheme.com/litza/wp-content/uploads/sites/379/2023/05/book-2.jpg';
            }


            $output .= '<div class="col-md-3">
            <div class="book-preview">
                <div class="rating">
                    <div class="row justify-content-between ">
                        <div class="col-7"></div>
                        <div class="col-5">
                            <p class="mb-0 text-center">'. $rating .' <i class="fas fa-star"></i></p>
                        </div>

                    </div>
                </div>
                <div class="image">
                    <img decoding="async"
                        src="' . $image_url . '">
                        <div class="view-button">
                            <div class="button-box icon-position-before">
                                <div class="button-wrapper"><a href="'. $link  .'"><i aria-hidden="true" class="fas fa-eye"></i> View
                                        Detail</a></div>
                            </div>
                        </div>
                    </div>
               
                <div class="details">
                    <div class="category">
                    <a href="'. $category_link  .'"><h4>'. $catego .'</h4> </a>
                    </div>
                    <div class="title">
                       <a href="'. $link  .'"> <h2>'. $post_titel .'</h2> </a>
                    </div>
                </div>
            </div>
        </div>';
        }
        $output .= '</div>
        </div>
        </div>';

        /* Restore original Post Data */
        wp_reset_postdata();

        return $output;
    } else {
        return 'No posts found';
    }
}
add_shortcode('skb_blog_post_4_row', 'skb_blog_post_4_row_shortcode');