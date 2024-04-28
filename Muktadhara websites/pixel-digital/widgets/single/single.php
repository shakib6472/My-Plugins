<?php
class Elementor_pixel_digital_product_single_page extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'product_single_page';
    }

    public function get_title()
    {
        return esc_html__('Single Page Pixel Digital', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'eicon-page';
    }
    protected function register_controls()
    {
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['single', 'page'];
    }

    protected function render()
    {

        global $product;

        // Get product data
        $product_title = $product->get_title();
        $short_description = $product->get_short_description();
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $discount_percentage = 0;
        $image_url = get_the_post_thumbnail_url($product->get_id(), 'full');
        // Calculate discount percentage
        if ($sale_price && $regular_price) {
            $discount_percentage = ceil(($regular_price - $sale_price) / $regular_price * 100);
        }

        // Get custom field data
        $isbn = get_field('isbn', $product->get_id());
        $release_year = get_field('release_year', $product->get_id());
        $edition = get_field('edition', $product->get_id());
        $cover_type = get_field('cover_type', $product->get_id());
        $number_of_pages = get_field('number_of_pages', $product->get_id());
        $country = get_field('country', $product->get_id());
        $language = get_field('language', $product->get_id());
        $publisher = get_field('publisher', $product->get_id());
        $writes_id = get_field('_book_author_id', $product->get_id());
        if ($writes_id) {
            $writes_title = get_the_title($writes_id);
            $writes_english_name = get_post_meta($writes_id, 'english_name', true);
            $writes_url = get_permalink($writes_id);
            $writes_description = get_post_meta($writes_id, 'description', true);
            $writes_featured_image = get_the_post_thumbnail_url($writes_id, 'full');
            if ($writes_featured_image) {
            } else {
                $writes_featured_image = "https://prothoma.gumlet.io/placeholderImages/place_holder_writer.jpg?w=1200&amp;dpr=0.7";
            }
        }
        $publisher_id = get_field('_book_publisher_id', $product->get_id());
        if ($publisher_id) {
            $publisher_title = get_the_title($publisher_id);
            $publisher_url = get_permalink($publisher_id);
        } else {
            $publisher_title = 'No Publisher';
            $publisher_url = '#';
        }

        //echo $settings['customer-selected-panel'];

        // Get the product categories
        $categories = get_the_terms($product->get_id(), 'product_cat');

        // Output the product categories

?>
        <!-- Design Start From here -->

        <div class="content">
            <div class="content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo home_url(); ?>">হোম</a></li>
                                <li class="active"><?php echo $product_title ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="detail-slider">
                                <div class="" id="main-slider">


                                    <div class="product-image" aria-hidden="false" tabindex="-1" role="option" aria-describedby=" 00">
                                        <img class="main_img gm-loaded gm-observing gm-observing-cb" data-src="" alt="<?php echo $product_title ?>" loading="lazy" src="<?php echo $image_url ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="one-four-block">
                                <div class="product-title">
                                    <h1><?php echo $product_title ?></h1>
                                    <h3><span>লেখক:</span> <a class="link-to" href="<?php echo $writes_url;  ?> "><?php echo $writes_title; ?></a> </h3>
                                    <?php if ($categories && !is_wp_error($categories)) {
                                        echo '<h4>বিষয়: ';
                                        foreach ($categories as $category) {
                                            echo '<a class="link-to" href="' . esc_url(get_term_link($category->term_id, 'product_cat')) . '">' . esc_html($category->name) . '</a>';
                                            if ($category !== end($categories)) {
                                                echo ', ';
                                            }
                                        }
                                        echo '</h4>';
                                    } ?>
                                </div>
                                <div class="product-price">
                                    <?php if ($sale_price) { ?>
                                        <span class="sale-price"><?php echo wc_price($sale_price); ?></span>
                                        <span class="offer" style="color: #ed1c24;"><?php echo $discount_percentage . '% ছাড়' ?></span>
                                        <span class="regular-price"><?php echo wc_price($regular_price); ?></span>
                                    <?php } else {
                                    ?>
                                        <span class="sale-price"><?php echo wc_price($regular_price); ?></span>
                                    <?php
                                    } ?>
                                </div>
                                <div class="right-bottom">
                                    <div class="short_desc">
                                        <p><?php echo $short_description ?></p>
                                    </div>
                                    <div class="pdf_link_block">
                                    </div>
                                    <div class="add-cart custom_cart">


                                        <form class="cart" action="<?php echo get_permalink() ?>" method="post" enctype="multipart/form-data">
                                            <div class="quantity">
                                                <input type="button" value="-" class="minus">

                                                <label class="screen-reader-text" for="quantity_65b244e410874">বাংলার পটের দুর্গা quantity</label>
                                                <input type="number" id="quantity_65b244e410874" class="input-text qty text" value="1" aria-label="Product quantity" min="1" max="" name="quantity" step="1" placeholder="" inputmode="numeric" autocomplete="off">

                                                <input type="button" value="+" class="plus">

                                            </div>

                                            <button type="submit" name="add-to-cart" value="16277" class="single_add_to_cart_button button alt added">Add to cart</button><a href="http://localhost/muktodhara/cart/" class="added_to_cart wc-forward" title="View cart">View cart</a>

                                            <button id="wd-add-to-cart" type="submit" name="wd-add-to-cart" value="16277" class="wd-buy-now-btn button alt">
                                                Buy now </button>
                                        </form>
                                    </div>

                                    <span class="pull-left stock"></span>
                                    <div class="wd-wishlist-btn wd-action-btn wd-style-text wd-wishlist-icon">
                                        <a class="" href="<?php echo home_url('/wishlist') ?>" data-key="025bfcf352" data-product-id="<?php echo $product->get_id(); ?>" rel="nofollow" data-added-text="Browse Wishlist" style="font-family: SolaimanLipi;" class="pull-right wishlist addToWishListButton">
                                            <span style="font-family: SolaimanLipi;">পছন্দের তালিকায়
                                                রাখুন</span>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-bottom details_content_section_mid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section_tittle_row">
                                <h2>বইয়ের বিবরণ</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="details_tab_section">
                                <div class="tab_block">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active tab-details"><a href="#PRODUCT_SPECS" aria-controls="PRODUCT_SPECS" role="tab" data-toggle="tab">বিস্তারিত</a>
                                        </li>
                                        <li role="presentation" class=" tab-details"><a href="#tab_Author" aria-controls="tab_Author" role="tab" data-toggle="tab">লেখক</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="PRODUCT_SPECS">
                                            <div class="product-desc">
                                                <div class="brand-info">
                                                </div>
                                                <div class="product-bottom">
                                                    <ul class="specification">
                                                        <li><span>শিরোনাম</span> <span class="right bangla_fn"><?php echo $product_title ?></span>
                                                        </li>
                                                        <li><span>লেখক</span> <span class="right bangla_fn"><a class="link-to" href="<?php echo $writes_url; ?>"><?php echo $writes_title; ?></a> </span></li>
                                                        <li>
                                                            <span>প্রকাশক</span>
                                                            <span class="right bangla_fn">
                                                                <a class="link-to" href="<?php echo $publisher_url; ?>"><?php echo $publisher_title; ?></a>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span>আইএসবিএন</span>
                                                            <span class="right bangla_fn"><?php echo $isbn ?></span>
                                                        </li>
                                                        <li>
                                                            <span>প্রকাশের সাল</span>
                                                            <span class="right bangla_fn"><?php echo $release_year ?></span>
                                                        </li>
                                                        <li><span>মুদ্রণ</span> <span class="right"><?php echo $edition ?></span></li>
                                                        <li><span>বাঁধাই</span> <span class="right bangla_fn"><?php echo $cover_type ?></span></li>
                                                        <li>
                                                            <span>পৃষ্ঠা সংখ্যা</span>
                                                            <span class="right bangla_fn"><?php echo $number_of_pages ?></span>
                                                        </li>
                                                        <li><span>দেশ</span> <span class="right bangla_fn"><?php echo $country ?></span>
                                                        </li>
                                                        <li>
                                                            <span>ভাষা</span>
                                                            <span class="right bangla_fn"><?php echo $language ?> </span>
                                                        </li>
                                                    </ul>
                                                    <p>আলোর উৎস কিংবা ডিভাইসের কারণে বইয়ের প্রকৃত রং কিংবা পরিধি
                                                        ভিন্ন হতে পারে।</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="tab_Author">
                                            <div class="coment_single_block">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img data-src="" alt="" loading="lazy" src="<?php echo $writes_featured_image ?>" class="gm-loaded gm-observing gm-observing-cb">
                                                    </div>
                                                    <div class="media-body">
                                                        <h3><a class="link-to" href="<?php echo $writes_url; ?>"><?php echo $writes_title; ?></a></h3>
                                                        <p> <?php echo $writes_description; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php


                    // Assuming $product_id is the ID of the product you want to get ratings for
                    $product_id = get_the_ID(); // You can replace this with the actual ID of your product

                    // Get the average rating
                    $average_rating = get_post_meta($product_id, '_wc_average_rating', true);

                    // Get the total number of ratings
                    $total_ratings = get_post_meta($product_id, '_wc_review_count', true);

                    // Get the distribution of ratings
                    $ratings_distribution = get_post_meta($product_id, '_wc_rating_counts', true);

                    // If there are no reviews, set ratings to 0
                    if (!$total_ratings) {
                        $total_ratings = 0;
                        $ratings_distribution = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);
                    }

                    $rating5start = $ratings_distribution['5'];
                    $rating4start = $ratings_distribution['4'];
                    $rating3start = $ratings_distribution['3'];
                    $rating2start = $ratings_distribution['2'];
                    $rating1start = $ratings_distribution['1'];

                    // Get product rating data (replace these with your actual rating data retrieval logic)
                    $productRating = $average_rating;
                    $ratingsCount = [
                        5 => $ratings_distribution['5'], // Number of 5-star ratings
                        4 => $ratings_distribution['4'],  // Number of 4-star ratings
                        3 => $ratings_distribution['3'],  // Number of 3-star ratings
                        2 => $ratings_distribution['2'],  // Number of 2-star ratings
                        1 => $ratings_distribution['1']   // Number of 1-star ratings
                    ];

                    // Calculate the total number of reviews
                    $totalReviews = array_sum($ratingsCount);
                    ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="rating_tittle">রেটিং সমুহ</div>
                            <div class="rating_section">
                                <div class="rt_block_1">
                                    <div class="rating_top_bar">
                                        <i class="fa fa-star star5"></i><span><?php echo $productRating; ?>(<?php echo $totalReviews; ?>)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating_details">
                                <ul>
                                    <?php for ($i = 5; $i >= 1; $i--) : ?>
                                        <li>
                                            <div class="dt_rt_sc hidden-md hidden-sm hidden-lg"><?php echo $i; ?></div>
                                            <div class="dt_rating_left hidden-xs">
                                                <?php for ($j = 1; $j <= $i; $j++) : ?>
                                                    <i class="fa fa-star star5"></i>
                                                <?php endfor; ?>
                                            </div>
                                            <div class="dt_rt_counter">(<?php echo isset($ratingsCount[$i]) ? $ratingsCount[$i] : 0; ?>)</div>
                                            <div class="rt_status">
                                                <div class="rt_status_grey"></div>
                                                <div class="rt_status_yellow sts_<?php echo $i; ?>" style="width: <?php if (0 !== $ratingsCount[$i]) {
                                                                                                                        # code...
                                                                                                                        echo ($ratingsCount[$i] / $totalReviews) * 100;
                                                                                                                    } else {
                                                                                                                        echo 0;
                                                                                                                    } ?>%;"></div>
                                            </div>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                $('.tab_block ul li.tab-details').click(function(e) {
                    e.preventDefault();

                    // Remove 'active' class from all list items and tab panes
                    $('.tab_block ul li.tab-details').removeClass('active');
                    $('.tab-pane').removeClass('active');

                    // Get the value of 'aria-controls' attribute from the clicked tab
                    var tabName = $(this).find('a').attr('aria-controls');

                    // Add 'active' class to the clicked list item and corresponding tab pane
                    $(this).addClass('active');
                    $('#' + tabName).addClass('active');
                });

                $(".main_img.gm-loaded.gm-observing.gm-observing-cb").ezPlus({
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 500,
                    lensFadeIn: 500,
                    lensFadeOut: 500
                });


            });
        </script>
<?php
    }
}
