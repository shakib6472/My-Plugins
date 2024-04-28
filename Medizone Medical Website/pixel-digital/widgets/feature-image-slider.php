<?php
class Elementor_pixel_digital_single_page_feature_image_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'feature-image';
    }

    public function get_title()
    {
        return esc_html__('Feature Image', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'fas fa-images';
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
        return ['image', 'slider', 'feature'];
    }

    protected function render()
    {
        // Start the render function

                $post_id = get_the_ID();

                # code...
                $featureiamges = get_post_meta($post_id, 'image1', true);
                if ($featureiamges) {
                    $image_url = wp_get_attachment_url($featureiamges);
                ?> <div class="box">
                        <div class="image-item d-flex align-items-center justify-content-center">
                            <img src="<?php echo $image_url; ?>" class="" alt="">
                        </div>
                    </div>

                <?php  } ?>

<?php

        // Close the render function
    }
}
