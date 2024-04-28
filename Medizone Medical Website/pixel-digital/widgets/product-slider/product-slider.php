<?php
class Elementor_pixel_digital_product_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'product-slider';
    }

    public function get_title()
    {
        return esc_html__('Boikotha Prouct Slider', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'eicon-slide';
    }


    protected function register_controls()
    {
        //adding Controls

        // Function to get product categories as options


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


        // Add more filters as needed for languageIds, discountRange, and ratings
?>

        <div class="container">
            <div class="row category-slider">
                <?php

                $args = array(
                    'post_type' => 'medical-item', // Post-type key
                    'posts_per_page' => 4, // -1 retrieves all posts
                    'post__in'       => array(727, 733, 290, 236),
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        // Your loop content goes here
                        
                        $post_id = get_the_ID();
                        $post_title = get_the_title($post_id);
                        $short_description = get_post_meta($post_id, 'short_description', true);
                        $featureiamges = get_post_meta($post_id, 'image1', true);
                        if ($featureiamges) {
                            $image_url = wp_get_attachment_url($featureiamges);
                        } else {
                            $image_url = '#';
                        }
                        $post_url = get_permalink();

                        // Other post data can be retrieved using functions like the_content(), the_excerpt(), etc.
                        // Place your cursor here after pressing Tab to move inside the loop
                ?>
                        <div class="items">
                            <a href="<?php echo $post_url; ?>">
                                <div class="mainbox">
                                    <div class="upper text-center">
                                        <h3><?php echo $post_title; ?></h3>
                                        <h6>
                                            <?php echo (implode(' ', array_slice(str_word_count($short_description, 2), 0, 10)) . (str_word_count($short_description) > 10 ? '...' : '')); ?>
                                        </h6>
                                    </div>
                                    <div class="box">
                                        <div class="image">
                                            <div class="img"> 
                                                 <img src="<?php echo $image_url; ?>" alt=""></div>

                                    </div>
                                </div>
                                <!-- <div class="action">
                        <a href="#"><button class="btn">Read More..</button></a>
                        
                    </div> -->
                        </div>
                        </a>
            </div>
    <?php
                    }
                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    // No posts found
                    echo 'No posts found';
                }

    ?>
        </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
                $('.category-slider').slick({
                    centerMode: true,
                    centerPadding: '1px',
                    slidesToShow: 3,
                    autoplay: false,
                    autoplaySpeed: 1500,
                    infinite: true,
                    adaptiveHeight: true,
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        </script>

<?php
        // Close the render function
    }
}



?>