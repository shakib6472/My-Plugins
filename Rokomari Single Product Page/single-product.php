<?php get_header(); ?>
<?php
$post_id = get_the_ID();
$product_id = get_the_ID();
$post_title = get_the_title($post_id);
$post_thumbnail_id = get_post_thumbnail_id($post_id);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
$paper_type = get_post_meta($post_id, 'paper_type', true);
$summmury = get_post_meta($post_id, 'summmury', true);
$isbn = get_post_meta($post_id, 'isbn', true);
$edition = get_post_meta($post_id, 'edition', true);
$number_of_pages = get_post_meta($post_id, 'number_of_pages', true);
$country = get_post_meta($post_id, 'country', true);
$language = get_post_meta($post_id, 'language', true);
$language = get_post_meta($post_id, 'language', true);
$writes_Id = get_post_meta($post_id, '_book_author_id', true);
$publisher_Id = get_post_meta($post_id, '_book_publisher_id', true);


// //for testing Adding review
// $user_id = get_current_user_id(); // Assuming users must be logged in to leave a review
// $user_name = get_user_meta($user_id, 'display_name', true);
// $user_email = get_the_author_meta('user_email', $user_id);
// $review_content = 'এটি একটি 5 স্টার রেটিং a';
// $review_rating = 5;


// $commentdata = array(
//   'comment_post_ID' => $product_id,
//   'comment_author' => $user_name,
//   'comment_author_email' => $user_email,
//   'comment_content' => $review_content,
//   'comment_type' => '',
//   'comment_parent' => 0,
//   'user_id' => $user_id,
//   'comment_author_url' => '#',
// );
// $comment_id = wp_new_comment($commentdata);
// add_comment_meta($comment_id, 'rating', $review_rating);



//Writes Details
if ($writes_Id) {
  $writer_id = $writes_Id;
  $writer_title = get_the_title($writer_id);
  $writer_thumbnail_id = get_post_thumbnail_id($writer_id);
  $writer_thumbnail_url = wp_get_attachment_url($writer_thumbnail_id);
  $english_name = get_post_meta($writer_id, 'english_name', true);
  $description = get_post_meta($writer_id, 'description', true);
  $total_follower = get_post_meta($writer_id, 'total_follower', true);
  $writers_url = get_permalink($writer_id);
} else {
  $writer_title = 'No Author';
  $writer_thumbnail_url = '#';
  $english_name = '';
  $description = '';
  $total_follower = '';
  $writers_url = '#';
}
//publisher_Id Details
if ($publisher_Id) {
  $publisher_id = $publisher_Id;
  $publisher_title = get_the_title($publisher_id);
  $publisher_thumbnail_id = get_post_thumbnail_id($publisher_id);
  $publisher_thumbnail_url = wp_get_attachment_url($publisher_thumbnail_id);
  $english_name = get_post_meta($publisher_id, 'english_name', true);
  $publishers_url = get_permalink($publisher_id);
} else {
  $publisher_title = 'No Author';
  $publisher_thumbnail_url = '#';
  $english_name = '';
  $publishers_url = '#';
}


$product = wc_get_product($product_id);
$average_rating = get_post_meta($product_id, '_wc_average_rating', true);
$rating_count   = get_post_meta($product_id, '_wc_review_count', true);

$post_categories = wp_get_post_terms($post_id, 'product_cat');
// Get the tags for the product
$product_tags = wp_get_post_terms($product_id, 'product_tag');
// Output Categories


?>

<div class="container">
  <div class="lookInsideDiv" style="display: none">
    <div class="exitBtn"><i class="ion-close-round"></i></div>
    <div class="pagesArea">
      <ul class="list-unstyled pages">
        <li>
          <img alt="Look inside image 1" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/a54c1d9b1_213376-1.jpg" />
        </li>
        <li>
          <img alt="Look inside image 2" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/d522188db_213376-2.jpg" />
        </li>
        <li>
          <img alt="Look inside image 3" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/58f6bc406_213376-3.jpg" />
        </li>
        <li>
          <img alt="Look inside image 4" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/a3e6078b5_213376-4.jpg" />
        </li>
        <li>
          <img alt="Look inside image 5" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/c2f86727d_213376-5.jpg" />
        </li>
        <li>
          <img alt="Look inside image 6" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/02eb3e0a5_213376-6.jpg" />
        </li>
        <li>
          <img alt="Look inside image 7" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/1f3175e97_213376-7.jpg" />
        </li>
        <li>
          <img alt="Look inside image 8" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/ddd89631c_213376-8.jpg" />
        </li>
        <li>
          <img alt="Look inside image 9" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/cb8193419_213376-9.jpg" />
        </li>
        <li>
          <img alt="Look inside image 10" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/442c8f55e_213376-10.jpg" />
        </li>
        <li>
          <img alt="Look inside image 11" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/d95372941_213376-11.jpg" />
        </li>
        <li>
          <img alt="Look inside image 12" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/3c06cb69f_213376-12.jpg" />
        </li>
        <li>
          <img alt="Look inside image 13" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/b41a68421_213376-13.jpg" />
        </li>
        <li>
          <img alt="Look inside image 14" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/4d2170e70_213376-14.jpg" />
        </li>
        <li>
          <img alt="Look inside image 15" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/c6316fef1_213376-15.jpg" />
        </li>
        <li>
          <img alt="Look inside image 16" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/4e076cd8c_213376-16.jpg" />
        </li>
        <li>
          <img alt="Look inside image 17" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/d0d8b441b_213376-17.jpg" />
        </li>
        <li>
          <img alt="Look inside image 18" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/7831b244a_213376-18.jpg" />
        </li>
        <li>
          <img alt="Look inside image 19" class="lookInsideImg" src="https://s3-ap-southeast-1.amazonaws.com/rokomari110/LookInside20190827/1f58f582b_213376-19.jpg" />
        </li>
      </ul>
    </div>
  </div>
  <section id="details-page">
    <input type="hidden" id="js--author-id" value="<?php echo $writer_id; ?>" />
    <input type="hidden" id="js--no-of-rating" value="2720" />
    <input type="hidden" id="js--no-of-review" value="1685" />
    <input type="hidden" value="book" id="js--aff-productType" />
    <div class="row">
      <div class="offset-2 col-8">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="js--message">
          <strong><i class="ion-information-circled"></i></strong>
          <p id="js--message-text"></p>
          <button type="button" class="js--message-close close" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      </div>
    </div>
    <section class="details-book-section d-flex align-items-base">
      <div class="details-book-main-info-wrapper">
        <div class="row no-gutters">
          <div class="col-5 details-book-main-img-container">
            <div class="row no-gutters details-book-main-img-wrapper">
              <div class="js--look-inside look-inside-wrapper">
                <div class="look-inside-img"></div>
                <div class="look-inside-bg"></div>
                <img class="look-inside" src="<?php echo $post_thumbnail_url ?>" alt="<?php echo $post_title ?>" />
              </div>
            </div>
            <div class="row no-gutters bookshelf-actions">
              <div class="d-none" id="js--bookShelf-action-section">
                <button class="btn bookshelf-actions__selected js--bookshelf-options-btn">
                  <i class="ion-android-create"></i>
                  <span id="bookshelf-actions__selected--title">Read</span>
                </button>
              </div>
              <div class="" id="js--want-to-read-section">
                <div class="bookshelf-actions__unselected">
                  <!-- <button
                        type="button"
                        class="btn main-action-btn"
                        id="js--bookshelf-primary-btn"
                        data-status-value="WANT_TO_READ"
                      >
                        Want to read
                      </button> -->
                  <i class="ion-chevron-down js--bookshelf-options-btn"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col details-book-main-info align-self-center">
            <div class="details-book-main-info__header">
              <h1><?php echo $post_title; ?> <span>(<?php echo $paper_type; ?>)</span></h1>
              <div class="sub-title">
                <h2></h2>
              </div>
              <input type="hidden" id="js--product-id" value="<?php echo $post_id; ?>" />
              <input type="hidden" id="js--product-name" value="<?php echo $post_title; ?>" />
              <input type="hidden" id="js--product-img" value="ef11c6ea1_213376.jpg" />
            </div>
            <div class="details-book-main-info__content">
              <p class="details-book-info__content-author">
                <span class="pr-1">by</span>
                <a href="<?php echo $writers_url; ?>"> <?php echo $writer_title; ?> </a>
              </p>
              <div class="details-book-info__content-category align-items-center">
                <p class="pr-1 font-weight-bold">Category:</p>
                <!-- <p class="best-seller-badge">
                  <span>#3 Best Seller</span> in
                </p> -->
                <style>
                  .catebox .cate-items-box .category-tag__item {
                    background-color: #f8fcff;
                    border: 1px solid #d4e5f6;
                    border-radius: 4px;
                    color: #48494d;
                    font-size: 13px;
                    padding: 7.25px 12px;
                    margin: 3px;
                  }

                  .catebox .cate-items-box a.category-tag__item:hover {
                    background-color: #7fc8ff;
                    color: #fff !important;
                  }
                </style>
                <?php if ($post_categories) {
                ?> <div class="catebox">
                    <div class="cate-items-box">
                      <?php
                      foreach ($post_categories as $category) { ?>
                        <a href="<?php echo get_term_link($category) ?>" class="btn category-tag__item"> <?php echo $category->name ?></a>
                      <?php }
                      ?>

                    </div>
                  </div>
                <?php
                } ?>

              </div>
              <div class="details-book-info__content-quantity d-none">
                <button class="btn js-minus-btn">
                  <i class="ion-ios-minus-empty"></i>
                </button>
                <input type="text" class="form-control js-quantity-input" value="1" id="js--details-quantity" readonly="" />
                <button class="btn js-plus-btn">
                  <i class="ion-ios-plus-empty"></i>
                </button>
              </div>
              <div class="details-book-info__content-rating">
                <?php
                if ($average_rating && $rating_count) {
                  echo 'Average Rating: ' . $average_rating . '<br>';

                  // Output stars
                  $rounded_rating = round($average_rating);

                  for ($i = 0; $i < 5; $i++) {
                    if ($average_rating >= $i + 1) { // Check if the current star should be a full star 3.43 >= 4 
                      if ($i + 1 <= $average_rating && $i + 1 == $average_rating) { // Check if the current star should be a half star
                        // Output full star
                        echo '<i class="fa fa-star"></i>';
                      } else if ($i + 1 <= $average_rating && $i + 1 > $average_rating - 0.20) { // Check if the current star should be a half star
                        // Output half star
                        echo '<i class="fa fa-star-half-alt"></i>';
                      } else {
                        // Output full star
                        echo '<i class="fa fa-star"></i>';
                      }
                    } else if ($average_rating > $i) {
                      // Output regular star
                      echo '<i class="fa fa-star-half-alt"></i>';
                    } else {
                      // Output regular star
                      echo '<i class="far fa-star"></i>';
                    }
                  }


                  echo  '   ' . $rating_count . ' Ratings |';
                ?>
                  <span class="ml-2">
                    <?php echo $rating_count; ?> Reviews</span>
                <?php
                } else {
                  echo 'No ratings or reviews yet.';
                } ?>
              </div>

              <div class="details-book-info__content-book-price">
                <style>
                  strike.sell-price.cross-price {
                    color: #d1d1d1;
                    margin-right: 14px;
                    font-size: 65% !important;
                  }
                </style>

                <?php if ($product) {
                  $regular_price = $product->get_regular_price();
                  $sale_price = $product->get_sale_price();

                  if ($sale_price) { ?>
                    <div class="price d-flex align-items-center">
                      <strike class="sell-price cross-price"> TK. <?php echo $regular_price; ?> </strike>
                      <span class="sell-price"> TK. <?php echo $sale_price; ?> </span>
                    </div>
                  <?php
                  } else {
                  ?> <span class="sell-price"> TK. <?php echo $sale_price; ?> </span> <?php
                                                                                    }
                                                                                  } ?>



              </div>

              <div class="d-block">
                <?php
                if ($product->is_in_stock()) {
                  $stock_quantity = $product->get_stock_quantity();
                  if ($stock_quantity > 0) {

                    // Get stock quantity
                ?>
                    <figure class="stock-available">
                      <img class="img-fluid" src="https://www.rokomari.com/static/200/images/svg/in-stock(mini).svg" alt="in-stock icon" />
                      <?php echo  'In Stock (' . $stock_quantity . ' copies available)'; ?>
                    </figure>
              </div>
            <?php

                  } else { ?>
              <figure class="stock-available">
                <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Flat_cross_icon.svg/512px-Flat_cross_icon.svg.png?20170316053531" alt="in-stock icon" />
                <?php echo  'Out Of Stock'; ?>
              </figure>
            <?php

                  }
                } else { ?>
            <figure class="stock-available">
              <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Flat_cross_icon.svg/512px-Flat_cross_icon.svg.png?20170316053531" alt="in-stock icon" />
              <?php echo  'Out Of Stock'; ?>
            </figure>
          <?php
                }
          ?>


          <div class="offer-content mt-3">
            <div class="d-flex mt-1">
              <img src="https://www.rokomari.com/static/200/images/tag-icon.png" alt="tag_icon" height="12px" />
              <p class="ml-2">
                <?php $value = get_option('product_promotion_1');

                echo $value;

                ?>
              </p>
            </div>
            <div class="d-flex mt-1">
              <img src="https://www.rokomari.com/static/200/images/tag-icon.png" alt="tag_icon" height="12px" />
              <p class="ml-2">
                <?php $value = get_option('product_promotion_2');

                echo $value;

                ?>
              </p>
            </div>
          </div>
            </div>
            <div class="details-btn">
              <div class="row no-gutters">
                <div class="col" id="js--details-btn-area">
                  <!-- <a onclick="gtag('event', 'click_look_inside', {'product_id': 213376});ga('send', 'event', 'Detail', 'Click', 'Details-Click_on_Look_Inside_Button-Click');" class="btn details-look-btn js--look-inside">
                    একটু পড়ে দেখুন
                  </a> -->
                  <a product-id="<?php echo $product_id; ?>" class="btn details-cart-btn small-cart-button js--add-to-cart js--add-to-cart-desc">
                    <img id="js--add-to-cart-icon" src="https://www.rokomari.com/static/200/images/svg/cart-mini.svg" alt="cart mini icon" />
                    <span id="js--add-to-cart-button">Add to Cart</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="share-info">
              <div class="d-flex align-items-center">
                <!-- <div class="details-book-info__wishlist">
                  <div class="wishlist-dropdown">
                    <ul class="position-relative">
                      <li>
                        <a id="js--save-to-booklist" class="">
                          <span class="ion-ios-heart-outline mr-2"></span>
                          Add to Booklist </a><input type="hidden" id="js--product-id" value="213376" />
                        <ul id="js--save-to-booklist--item"></ul>
                      </li>
                    </ul>
                  </div>
                </div> -->
                <div class="d-flex share-link">
                  <button type="button" class="btn btn-share pl-0" data-toggle="dropdown">
                    <i class="ion-android-share-alt"></i>
                    <span>Share This Book</span>
                  </button>
                  <ul class="dropdown-menu text-center">
                    <a href="" class="facebook" data-js="facebook-share">
                      <i class="ion-social-facebook"></i>
                    </a>
                    <a href="" class="twitter" data-js="twitter-share">
                      <i class="ion-social-twitter"></i>
                    </a>
                    <a href="" class="linkedin" data-js="linkedin-share">
                      <i class="ion-social-linkedin"></i>
                    </a>
                    <a href="" class="instagram" data-js="instagram-share">
                      <i class="ion-social-instagram"></i>
                    </a>
                    <a href="" class="whatsapp" data-js="whatsapp-share">
                      <i class="ion-social-whatsapp"></i>
                    </a>
                    <a href="" class="messenger" data-js="messenger-share">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                        <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"></path>
                      </svg>
                    </a>
                  </ul>
                </div>
              </div>
            </div>
            <div class="service-info">
              <div class="service-info__item">
                <img src="https://www.rokomari.com/static/200/images/svg/icons/rok-icon-happy-return.svg" alt="happy return icon" />
                <p>7 Days Happy Return</p>
              </div>
              <div class="service-info__item">
                <img src="https://www.rokomari.com/static/200/images/svg/icons/rok-icon-cod.svg" alt="cash on delivery icon" />
                <p>Cash On Delivery</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar-info">
        <div class="sponsor-wrapper">
          <h5 class="sponsor-wrapper__title">Related Products</h5>
          <div class="sponsor-wrapper__list">
            <div id="js--sponsored-carousel" class="carousel slide product-carousel" data-ride="carousel" data-interval="false" data-wrap="false">
              <div class="carousel-inner">
                <div class="carousel-item active">

                  <?php
                  $category_slugs = array();
                  if ($post_categories) {
                    foreach ($post_categories as $category) {
                      $category_slugs[] = $category->slug; // Add each category slug to the array
                    }
                  }

                  $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 4,
                    'tax_query'      => array(
                      array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $category_slugs, // Use the array of category slugs here
                        'operator' => 'IN',
                      ),
                    ),
                  );
                  $products = new WP_Query($args);


                  if ($products->have_posts()) {
                    while ($products->have_posts()) {
                      $products->the_post();
                      $product_id = get_the_ID();
                      $post_title = get_the_title($post_id);
                      $post_thumbnail_id = get_post_thumbnail_id($post_id);
                      $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                      $writes_Id = get_post_meta($post_id, '_book_author_id', true);
                      $post_url = get_permalink($product_id);
                      $average_rating = get_post_meta($product_id, '_wc_average_rating', true);
                      $rating_count   = get_post_meta($product_id, '_wc_review_count', true);
                      $regular_price = $product->get_regular_price();
                      $sale_price = $product->get_sale_price();
                      //Writes Details
                      if ($writes_Id) {
                        $writer_id = $writes_Id;
                        $writer_title = get_the_title($writer_id);
                      } else {
                        $writer_title = 'No Author';
                      }

                  ?>
                      <a class="product-item" href="<?php echo $post_url ?>">
                        <img src="<?php echo $post_thumbnail_url ?>" class="product-item__image" alt="<?php $post_title . ' ' . $writer_title; ?> image" />
                        <div class="product-item__info">
                          <p class="product-name text-truncate">
                            <?php echo $post_title; ?>
                          </p>
                          <p class="product-author text-truncate"><?php echo $writer_title; ?></p>
                          <p class="product-rating"> <?php
                                                      for ($i = 0; $i < 5; $i++) {
                                                        if ($average_rating >= $i + 1) { // Check if the current star should be a full star 3.43 >= 4 
                                                          if ($i + 1 <= $average_rating && $i + 1 == $average_rating) { // Check if the current star should be a half star
                                                            // Output full star
                                                            echo '<i class="fa fa-star"></i>';
                                                          } else if ($i + 1 <= $average_rating && $i + 1 > $average_rating - 0.20) { // Check if the current star should be a half star
                                                            // Output half star
                                                            echo '<i class="fa fa-star-half-alt"></i>';
                                                          } else {
                                                            // Output full star
                                                            echo '<i class="fa fa-star"></i>';
                                                          }
                                                        } else if ($average_rating > $i) {
                                                          // Output regular star
                                                          echo '<i class="fa fa-star-half-alt"></i>';
                                                        } else {
                                                          // Output regular star
                                                          echo '<i class="far fa-star"></i>';
                                                        }
                                                      } ?>
                            <span class="text-secondary">(<?php echo $rating_count; ?>)</span>
                          </p>
                          <?php
                          if ($sale_price) { ?>
                            <span class="sell-price"> TK. <?php echo $sale_price; ?> </span>
                          <?php
                          } else {
                          ?> <span class="sell-price"> TK. <?php echo $regular_price; ?> </span>
                          <?php }  ?>
                        </div>
                      </a>
                  <?php
                    }
                  } else {
                    echo 'No products found';
                  }

                  wp_reset_postdata();


                  ?>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <a href="<?php echo get_option('product_promotion_image_3_url'); ?>">
      <img src="<?php echo get_option('product_promotion_image_3'); ?>" class="w-100" alt="Mega Details msg image" />
    </a>
    <section class="frequent-buy">
      <h2 class="title mb-4 font-weight-bold">
        Frequently Bought Together
      </h2>
      <div class="frequent-buy__content d-flex align-items-start">
        <div class="product text-center">

          <a href="#">
            <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php $post_title; ?> image" />
            <p class="book-name text-truncate"><?php echo $post_title; ?></p>
          </a>
          <p class="price"><span class="selling"> TK. <?php
                                                      if ($product) {
                                                        $regular_price = $product->get_regular_price();
                                                        $sale_price = $product->get_sale_price();
                                                        if ($sale_price) {
                                                          echo $sale_price;
                                                        } else {
                                                          echo $regular_price;
                                                        }
                                                      } ?>
            </span></p>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input js--checked-frequent-product" data-mrp="<?php if ($sale_price) {
                                                                                                          echo $sale_price;
                                                                                                        } else {
                                                                                                          echo 0;
                                                                                                        } ?>" data-price="<?php if ($sale_price) {
                                                                                                                            echo $sale_price;
                                                                                                                          } else {
                                                                                                                            echo $regular_price;
                                                                                                                          } ?>" data-save="0" id="<?php echo $product_id; ?>" checked="" />
            <label class="custom-control-label" for="213376"></label>
          </div>
        </div>

        <?php



        $args = array(
          'post_type'      => 'product',
          'posts_per_page' => 2,
          'orderby'        => 'rand',
          'post__not_in'   => array($product_id), // Exclude the specified product ID
        );

        $products = new WP_Query($args);



        // Usage


        // Output the product IDs or perform further operations with them
        if ($products->have_posts()) {
          while ($products->have_posts()) {
            $products->the_post();
            $product_id = get_the_ID();
            $post_title = get_the_title($post_id);
            $post_thumbnail_id = get_post_thumbnail_id($post_id);
            $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
            $writes_Id = get_post_meta($post_id, '_book_author_id', true);
            $post_url = get_permalink($product_id);
            $average_rating = get_post_meta($product_id, '_wc_average_rating', true);
            $rating_count   = get_post_meta($product_id, '_wc_review_count', true);
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
            if ($sale_price) {
              $data_save = $regular_price - $sale_price;
            }
            //Writes Details
            if ($writes_Id) {
              $writer_id = $writes_Id;
              $writer_title = get_the_title($writer_id);
            } else {
              $writer_title = 'No Author';
            }

        ?>


            <img src="https://www.rokomari.com/static/200/images/plus.png" alt="plus icon" class="plus" />
            <div class="product text-center">
              <a href="<?php echo $post_url; ?>">
                <img src="<?php echo $post_thumbnail_url ?>" alt="<?php echo $post_title; ?> image" />
                <p class="book-name text-truncate"><?php echo $post_title; ?></p>
              </a>
              <?php
              if ($sale_price) { ?>
                <span class="price" data-price="<?php echo $sale_price; ?>"> TK. <?php echo $sale_price; ?> </span>
              <?php
              } else {
              ?> <span class="price" data-price="<?php echo $regular_price; ?>"> TK. <?php echo $regular_price; ?> </span>
              <?php }  ?>
              <div class="custom-control custom-checkbox">
                <?php
                if ($sale_price) { ?>

                  <input type="checkbox" class="custom-control-input js--checked-frequent-product" data-mrp="<?php echo $sale_price; ?>" data-price="<?php echo $sale_price; ?>" data-save="<?php echo $data_save; ?>" data-id="<?php echo $product_id; ?>" checked="" />

                <?php
                } else {
                ?>
                  <input type="checkbox" class="custom-control-input js--checked-frequent-product" data-mrp="<?php echo $regular_price; ?>" data-price="<?php echo $regular_price; ?>" data-save="0" data-id="<?php echo $product_id; ?>" checked="" />

                <?php }  ?>



                <label class="custom-control-label" for="230783"></label>
              </div>
            </div>




        <?php
          }
        }








        ?>

        <!-- <img src="https://www.rokomari.com/static/200/images/plus.png" alt="plus icon" class="plus" />
        <div class="product text-center">
          <a href="/book/287484">
            <img src="https://ds.rokomari.store/rokomari110/ProductNew20190903/260X372/Reflections_From_Surah_Yusuf-Dr_Mizanur_Rahman_Azhari-f4430-287484.png" alt="রিফ্লেকশন ফ্রম সূরা ইউসুফ image" />
            <p class="book-name text-truncate">রিফ্লেকশন ফ্রম সূরা ইউসুফ</p>
          </a>
          <p class="price"><span class="selling">TK. 190</span></p>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input js--checked-frequent-product" data-mrp="190" data-price="190" data-save="0" id="287484" checked="" />
            <label class="custom-control-label" for="287484"></label>
          </div>
        </div> -->
        <img src="https://www.rokomari.com/static/200/images/equal.png" alt="equal icon" class="equal" />
        <div class="purchase-info text-center">
          <h5 class="amount mb-0">
            Total Amount:
            <span class="font-weight-bold d-inline-block">TK.
              <span id="js--frequently-buy-total-price">780</span></span>
          </h5>
          <p class="save-info">
            Save TK. <span id="js--frequently-buy-total-save">0</span>
          </p>
        </div>
        <div class="d-flex flex-column align-items-center">
          <button type="button" id="js--submit-add-all-to-cart" class="btn btn-frequent-buy d-flex align-items-center">
            <img src="https://www.rokomari.com/static/200/images/svg/cart-mini-primary.svg" alt="cart mini icon" class="mr-2" />
            <p>Add All to Cart</p>
          </button>
          <p class="fqbuy-response mt-2" id="js--fqbuy-response"></p>
        </div>
      </div>
    </section>
    <div class="rok-adservx-zone" zone-id="64ec479b3c6cb5b4ddc8db6a" data-ext="&amp;categoryId=30&amp;categoryId=40&amp;categoryId=81&amp;categoryId=391&amp;categoryId=2573&amp;categoryId=2589&amp;productId=book/213376&amp;authorId=81400&amp;publisherId=5351" page-name="BOOK_DETAILS_DESKTOP" loaded="true"></div>
    <section class="details-book-section-summery mb-3" id="summary">
      <div class="details-book-additional-info">
        <div class="row">
          <div class="col">
            <div class="details-book-additional-info__header">
              <h2>Product Specification &amp; Summary</h2>
            </div>
            <div class="details-book-additional-info__content">
              <ul class="nav nav-tabs justify-content-start" id="book-additional" role="tablist">
                <li class="nav-item"></li>
                <li class="nav-item">
                  <a class="nav-link active show" id="book-additional-description-tab" data-toggle="tab" href="#book-additional-description" role="tab" aria-controls="profile" aria-selected="true">
                    Summary
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="book-additional-specification-tab" data-toggle="tab" href="#book-additional-specification" role="tab" aria-controls="home" aria-selected="false">
                    Specification
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="book-additional-author-tab" data-toggle="tab" href="#book-additional-author" role="tab" aria-controls="author" aria-selected="false">
                    Author
                  </a>
                </li>
              </ul>
              <div class="tab-content" id="book-additional-content">
                <div class="tab-pane fade active show" id="book-additional-description" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="details-book-additional-info__content-summery">
                    <div class="summary-description active" id="js--summary-description">
                      <?php echo $summmury; ?>
                    </div>
                    <button type="button" class="read-expander d-none" id="js--summary-read-expand">
                      Show More
                    </button>
                  </div>
                </div>
                <div class="tab-pane fade" id="book-additional-specification" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Title</td>
                        <td><?php echo $post_title; ?></td>
                      </tr>
                      <tr>
                        <td>Author</td>
                        <td class="author-link">
                          <a href="<?php echo $writers_url; ?>">
                            <?php echo $writer_title; ?>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>Publisher</td>
                        <td class="publisher-link">
                          <a href="<?php echo $publishers_url; ?>">
                            <?php echo $publisher_title; ?>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>ISBN</td>
                        <td><?php echo $isbn; ?></td>
                      </tr>
                      <tr>
                        <td>Edition</td>
                        <td><?php echo $edition; ?></td>
                      </tr>
                      <tr>
                        <td>Number of Pages</td>
                        <td><?php echo $number_of_pages; ?></td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td><?php echo $country; ?></td>
                      </tr>
                      <tr>
                        <td>Language</td>
                        <td><?php echo $language; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="book-additional-author" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="details-book-additional-info__content-summery">
                    <section class="details-book-author-info rm-shadow mb-0 pt-0">
                      <div class="details-book-author__content">
                        <div class="book-author__content-author">
                          <div class="row no-gutters">
                            <div class="col-2">
                              <img class="img-fluid rounded-circle" src="<?php echo $writer_thumbnail_url; ?>" alt="<?php echo $writer_title ?>" />
                              <div class="author-follow-wrapper">
                                <p class="text-author-follow mb-0">
                                  <span id="js--follower-count" class="text-dark font-weight-bold" data-count="<?php echo $total_follower; ?>"><?php echo $total_follower; ?></span><span id="js--follower-text" class="text-secondary ml-1">followers</span>
                                </p>
                                <button type="button" id="js--btn-details-follow-author" class="btn btn-follow-author" data-peopleid="81400">
                                  Follow
                                </button>
                              </div>
                            </div>
                            <div class="col author_des">
                              <p>
                                <a href="<?php echo $writers_url ?>"><?php echo $writer_title ?></a>
                              </p>
                              <div class="author-description-wrapper">
                                <div class="author-description" id="js--author-description">
                                  <?php echo $description ?>
                                </div>
                                <div class="read-more-overlay-wrapper">
                                  <div class="read-more-overlay"></div>
                                </div>
                              </div>
                              <div class="author-description--read-more">
                                <p class="js--author-description--read-more">
                                  Read More
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="js--message-incorrect-info">
          <strong><i class="ion-information-circled"></i></strong>
          <p id="js--incorrect-info-message-text"></p>
          <button type="button" class="js--message-close close" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div id="js--category-tag" class="category-tag d-flex">
          <?php if ($product_tags) {
            foreach ($product_tags as $tag) {
              $tag_link = get_term_link($tag);

          ?>
              <a href="<?php echo $tag_link; ?>" class="btn category-tag__item"> <?php echo esc_html($tag->name); ?> </a>
          <?php }
          } ?>

        </div>
        <div class="book-information-report-form-link">
          <p>
            <i class="ion-ios-information-outline"></i>
            <a href="#" id="js--show-hide-reporting">
              Report incorrect information
            </a>
          </p>
          <div id="js--report-writing">
            <form id="js--incorrect-reporting-form">
              <div class="form-group">
                <textarea class="form-control" rows="4" placeholder="How can we make this page or product information more meaningful?" id="js--incorrect-information"></textarea>
              </div>
              <button onclick="gtag('event', 'incorrect_info_submit', {content_type: 'Book',items:[{item_id:'rok_'+213376}]});ga('send', 'event', 'Detail', 'Click', 'Details-Submit_Incorrect_Information-Click');" type="button" class="btn book-information-report-submit-btn float-right" id="js--submit-incorrect-report">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="rokomari-features">
      <div class="d-flex justify-content-center align-items-center">
        <div class="item align-items-center d-flex">
          <img src="https://www.rokomari.com/static/200/images/svg/cod-small.svg" alt="cash" />
          <div class="content ml-3">
            <p class="text-uppercase">Cash on delivery</p>
            <p>Pay cash at your doorstep</p>
          </div>
        </div>
        <div class="item d-flex align-items-center ml-5">
          <img src="https://www.rokomari.com/static/200/images/svg/delivery_icon.svg" alt="service" />
          <div class="content ml-3">
            <p class="text-uppercase">Delivery</p>
            <p>All over Bangladesh</p>
          </div>
        </div>
        <div class="item d-flex align-items-center ml-5">
          <img src="https://www.rokomari.com/static/200/images/svg/happy-return-big.svg" alt="return" />
          <div class="content ml-3">
            <p class="text-uppercase">Happy return</p>
            <p>7 days return facility</p>
          </div>
        </div>
      </div>
    </section>
    <section class="rokomari-features">
      <?php


      // Assuming $product_id is the ID of the product you want to get ratings for
      $product_id = get_the_ID(); // You can replace this with the actual ID of your product

      // Get the average rating
      $average_rating = get_post_meta($product_id, '_wc_average_rating', true);

      // Get the total number of ratings
      $total_ratings = get_post_meta($product_id, '_wc_review_count', true);
      // If there are no reviews, set ratings to 0
      if (!$total_ratings) {
        $total_ratings = 0;
        $ratings_distribution = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);
      } else {
        // Query comments associated with the product post
        $args = array(
          'post_id' => $product_id,
          'status' => 'approve',
          'type' => 'comment', // Only retrieve comments
        );
        $comments = get_comments($args);
        // Initialize ratings distribution
        $ratings_distribution = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);

        // Calculate ratings distribution
        foreach ($comments as $comment) {
          $rating = get_comment_meta($comment->comment_ID, 'rating', true);
          $ratings_distribution[$rating]++;
        }
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

          <div class="rating-box d-flex">
            <div class="rating_tittle">Ratings</div>


            <?php if (is_user_logged_in()) {
            ?>
              <div class="rating_tittle text-right"><button class="btn btn-success review-button"> Leave a Review</button></div>
            <?php
            } else {
            ?> <div class="rating_tittle text-right"><a href="http://localhost/boikotha/sign-in/"><button class="btn btn-success login-button"> Sign In to Leave review</button></div></a>
            <?php
            } ?>
          </div>
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

    </section>
    <div class="overlay">
      <div class="review-rating-popup" id="js--review-rating-popup" style="display: none;"> <input type="hidden" id="js--current-path" value="details">
        <div class="review-rating-popup__header">
          <div class="d-flex align-items-center"> <img src="https://ds.rokomari.store/rokomari110/ProductNew20190903/130X186/7ab931545134_52704.gif" width="42px" alt="The Alchemist (About 65 Million Copies Sold)">
            <div class="ml-3">
              <h5 class="popup-title text-truncate"><?php echo $post_title; ?></h5>
              <p class="popup-subtitle">Rate this product</p>
            </div>
          </div> <button type="button" class="review-rating-popup__close" id="js--btn-close-review-rating-popup" data-target="#js--review-rating-popup" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        <div class="review-rating-popup__body">
          <div id="js--review-submit-container" class="review-wrapper__form">
            <form class="js--review-form">
              <p class="icon-star-wrapper w-100"> <span id="js--form-rating" class="icon-star">
                  <i class="ratings far fa-star" data-rating="1"></i>
                  <i class="ratings far fa-star" data-rating="2"></i>
                  <i class="ratings far fa-star" data-rating="3"></i>
                  <i class="ratings far fa-star" data-rating="4"></i>
                  <i class="ratings far fa-star" data-rating="5"></i>
                </span> </p>
              <div class="form-group position-relative"> <textarea class="form-control" id="js--review-writing" rows="3" placeholder="Describe your experience (optional)"></textarea>
                <p id="js--review-error" class="d-none text-danger mb-0"></p>
              </div>
              <!-- <div class="review-image-upload">
            <div class="review-image-selected" id="js--review-image-selected"></div>
            <div class="form-group text-center" id="js--review-img-input"> <label for="review-image-input" class="mb-0 d-flex align-items-center justify-content-center flex-column" id="review-image-upload-label"> <img src="/static/200/images/camera.png" alt="camera icon">
                <div class="d-flex">
                  <p>Upload Photo</p>
                  <p class="ml-1">(<span id="js--review-image-input-count">0</span>/5)</p>
                </div>
              </label> <input type="file" class="form-control d-none" name="" id="review-image-input" aria-describedby="helpId" placeholder="" multiple=""> </div>
          </div> -->
              <p id="js--rating-error" class="d-none text-danger mb-0"></p> <button onclick="gtag('event', 'product_review_submit', {content_type: 'Book',items:[{item_id:'rok_'+52704}]});ga('send', 'event', 'Detail', 'Click', 'Details-Submit_review_button-Click');" type="button" class="btn review-submit-btn active" id="js--review-submit"> Submit </button>
            </form>
          </div>
        </div>
      </div>

    </div>
    <section class="details-book-section-summery">
      <div class="review-wrapper">
        <?php
        $args = array(
          'post_id' => $product_id,
          'status' => 'approve',
          'type' => 'comment', // Only retrieve comments
        );
        $comments = get_comments($args);
        // Get the count of comments found
        $comments_count = count($comments); ?>
        <div class="rating_tittle">Reviews ( <?php echo $comments_count; ?> )</div>
        <div class="review-container js--ratings-review__content--review">
          <?php


          // $comments_query = new WP_Comment_Query;
          // $comments = $comments_query->query($args);

          foreach ($comments as $comment) {
            $rating = get_comment_meta($comment->comment_ID, 'rating', true);
            $comment_user_id = $comment->user_id;
            // Get user data
            $user_data = get_userdata($comment_user_id);
            if ($user_data) {
              // Get user display name
              $user_name = $user_data->display_name;
              // Get user profile picture
              $user_profile_picture = get_avatar_url($comment_user_id);
              if (empty($user_profile_picture)) {
                $user_profile_picture = 'https://www.rokomari.com/static/200/images/svg/user.svg';
              }
              // Output user name and profile picture
            }

          ?>
            <div class="review">
              <div class="user-info d-flex align-items-center">
                <img class="user-img" src="<?php echo $user_profile_picture; ?>" alt="user-img">

                <div class="info">
                  <div class="name-date">
                    <p class="d-inline-block name">By <span><?php echo $user_name; ?></span>, </p>
                    <p class="date d-inline-block"> <?php echo $comment->comment_date; ?></p>
                  </div>
                  <div class="rating-info d-flex align-items-center">
                    <div class="stars mr-2">
                      <?php
                      for ($i = 0; $i < 5; $i++) { ?>
                        <i class="fa<?php if ($i >= $rating) {
                                      echo 'r';
                                    } ?> fa-star"></i>
                      <?php
                      } ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="review-content">
                <p class="review-text js--review-content"> <?php echo $comment->comment_content; ?></p>
                <!-- <p class="read-expander js--review-read-expand">Read More</p> -->
                <div class="review-imgs js--review-img-container" data-username="<?php echo $user_name; ?>" data-date="<?php echo $comment->comment_date; ?>" data-rating="<?php echo $rating; ?>">
                </div>


              </div>
            </div>

          <?php
          }

          ?>

        </div>
      </div>
    </section>





    <?php get_footer(); ?>