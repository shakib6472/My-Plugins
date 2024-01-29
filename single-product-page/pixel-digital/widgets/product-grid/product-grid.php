<?php 

class Elementor_pixel_digital_product_grid extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'product-grid';
    }

    public function get_title()
    {
        return esc_html__('Boikotha Prouct Grid', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'eicon-grid';
    }


    protected function register_controls()
    {
        //adding Controls

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'pixel-digital'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->end_controls_section();
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['slider', 'product'];
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        // Set the query args
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
        );
       
        // Check if $recent_sale is true, then add meta query for recently sold product


        // Add author filter if provided
        if (is_single()) {
            $writes_id =  get_the_ID();
        }
        if (isset($writes_id)) {
            $args['meta_query'][] = array(
                'key'     => '_book_author_id',
                'value'   => $writes_id,
                'compare' => '=',
            );
        }


        // Add more filters as needed for languageIds, discountRange, and ratings

        $product = new WP_Query($args);
?>

        <div class="container">
            <div class="row">
                <?php
                if ($product->have_posts()) {
                    while ($product->have_posts()) {
                        $product->the_post();
                        $product_id = get_the_ID();
                        $product_title = get_the_title();
                        $description = get_the_content(); // Change to get_the_content() for description
                        $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
                        $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);
                        $discount_percentage = ($regular_price && $sale_price) ? ceil(($regular_price - $sale_price) / $regular_price * 100) : 0;
                        $product_url = get_permalink();

                        // Get custom field data
                        $isbn = get_field('isbn', get_the_ID());
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        if (empty($image_url)) {
                            $image_url = 'https://muktadhara.ubbl.org/wp-content/uploads/2024/01/MUKTADHARA-1.png';
                        }
                        $author_id = get_field('_book_author_id', get_the_ID());

                        if ($author_id) {
                            // Get the author title and meta value
                            $author_title = get_the_title($author_id);
                            $author_english_name = get_post_meta($author_id, 'english_name', true);
                            $author_url = get_permalink($author_id);
                        } else {
                            $author_title = 'No Author Found';
                            $author_english_name = 'No Author Found';
                            $author_url = '#';
                        }
                ?>
                        <div class="col-md-3" style="background-color: white">
                            <div class="product_single" style="height: auto;">
                                <div class="product_thumb">
                                    <a href="<?php echo esc_url($product_url); ?>">
                                        <img data-src="<?php echo esc_url($image_url); ?>" alt="" loading="lazy" src="<?php echo esc_url($image_url); ?>" class="gm-loaded gm-observing gm-observing-cb">
                                    </a>
                                    <div class="on-hover-details d-flex justify-content-center align-items-center ">
                                        <div class="buy_btn d-flex justify-content-center "><a href="<?php echo esc_url($product_url); ?>">বিস্তারিত</a></div>
                                    </div>
                                    <?php if (!empty($sale_price)) { ?>
                                        <div class="ds_info"><span><?php echo esc_html($discount_percentage); ?>% ছাড়</span></div>
                                    <?php }
                                    ?>
                                </div>
                                <div class="product_info">
                                    <div class="product_content_same_height_last_sold">
                                        <a href="<?php echo esc_url($product_url); ?>">
                                            <h2><?php echo esc_html($product_title); ?></h2>
                                        </a>
                                        <h3><a href="<?php echo $author_url;  ?>"><?php echo esc_html($author_title); ?></a></h3>
                                        <h4>
                                            <?php if (!empty($sale_price)) { ?>
                                                <span class="price_1"><?php echo esc_html($sale_price); ?> টাকা</span>

                                                <span class="price_2"><?php echo esc_html($regular_price); ?> টাকা</span>
                                            <?php } else {
                                            ?>
                                                <span class="price_1"><?php echo esc_html($regular_price); ?> টাকা</span>
                                            <?php

                                            } ?>
                                        </h4>
                                    </div>
                                    <div class="product">
                                        <div class="wd-add-btn wd-add-btn-replace">

                                            <a href="?add-to-cart=<?php echo $product_id ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart add-to-cart-loop" data-product_id="<?php echo $product_id ?>" data-product_sku="978-9-35-040562-8" aria-label="Add to cart: “<?php echo $product_title ?>”" aria-describedby="" rel="nofollow" style="font-family: SolaimanLipi;"><span style="font-family: SolaimanLipi;">কার্টে যোগ করুন</span></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo 'No products found.';
                }
                ?>
            </div>
        </div>

<?php
        // Close the render function
    }
}



?>