<?php

use ParagonIE\Sodium\Core\Curve25519\H;

class Elementor_pixel_digital_single_page_category extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'category';
    }

    public function get_title()
    {
        return esc_html__('Category', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'fas fa-paw';
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
        return ['category'];
    }

    protected function render()
    {
        // Start the render function

        $post_id = get_the_ID();
        $post_categories = get_the_terms($post_id, 'medical-item-category');
        
        // Output Categories
        if ($post_categories) {
            echo '<strong>Categories: </strong>';
            $category_count = count($post_categories);
            $i = 0;
            foreach ($post_categories as $category) {
                echo $category->name;
                // Add comma if it's not the last category
                echo ($i < $category_count - 1) ? ', ' : '';
                $i++;
            }
        }
        


        // Close the render function
    }
}
