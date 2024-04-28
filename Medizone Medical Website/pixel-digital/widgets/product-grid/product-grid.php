<?php

use ElementorPro\Modules\ThemeBuilder\Conditions\Singular;

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
            'post_type'      => 'medical-item',
            'posts_per_page' => 4,
            'post__in'       => array(727, 733, 290, 236)
        );

        $product = new WP_Query($args);
?>

        <div class="container">
            <div class="row">
                <?php
                if ($product->have_posts()) {
                    while ($product->have_posts()) {
                        $product->the_post();
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
                        <div class="sm-items col-6">
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
                                                <img src="<?php echo $image_url; ?>" alt="">
                                            </div>

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