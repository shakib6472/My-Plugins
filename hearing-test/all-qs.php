<?php
class Elementor_hearing_test_all_posts extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'ht-all-posts';
    }

    public function get_title()
    {
        return esc_html__('HT All Posts', 'hearing_test');
    }

    public function get_icon()
    {
        return 'eicon-custom';
    }

    protected function _register_controls()
    {
        // Register widget controls if needed
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hearing-test', 'posts', 'pagination'];
    }

    protected function render()
    {


        
        $options = get_option('ht_setup_options');

        $green_color = isset($options['green_color']) ? esc_attr($options['green_color']) : '#dcfce7'; // Default green
        $blue_color = isset($options['blue_color']) ? esc_attr($options['blue_color']) : '#0000FF'; // Default blue
        $font_family = isset($options['font_family']) ? esc_attr($options['font_family']) : 'Arial, sans-serif';



?>

        <style>
            body .monitization-mode .monitization p {
                background-color: <?php echo $green_color; ?>;
            }

            body .btn-success,
            body .answer-box .submit {
                background-color: <?php echo $green_color; ?>;
            }

            body .btn-primary {
                background-color: <?php echo $blue_color; ?>;
            }

            .container.d-flex.justify-content-center.align-items-center.flex-column {
                font-family: <?php echo $font_family;?>;
            }
        </style>


        <?php



        // Get the current page from query string or default to 1
        $paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;

        // Query arguments
        $args = array(
            'post_type'      => 'hearing-test',
            'posts_per_page' => -1,
            'paged'          => $paged,
        );

        // Query the posts
        $query = new WP_Query($args);
?> 
<div class="container">

<div class="loader-box" style="visibility: hidden;">
                        <div class="lds-grid">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>



<div class="row m-3">
    <div class="filter d-flex align-items-center justify-content-center gap-3">
        <p class="m-0">Filter With Lebel</p>
        <div class="points d-flex align-items-center justify-content-end gap-3">
                            <div class="labels all-posts">
                                <div class="custom-dropdown">
                                    <button class="dropdown-toggle">
                                        <i class="fas fa-bookmark" data-value="1" ></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item option-1" data-value="1">
                                            <i class="fas fa-bookmark option-1" data-value="1" ></i>
                                        </li>
                                        <li class="dropdown-item option-2" data-value="2">
                                            <i class="fas fa-bookmark option-2" data-value="2" ></i>
                                        </li>
                                        <li class="dropdown-item option-3" data-value="3">
                                            <i class="fas fa-bookmark option-3" data-value="3" ></i>
                                        </li>
                                        <li class="dropdown-item option-4" data-value="4">
                                            <i class="fas fa-bookmark option-4" data-value="4" ></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- <p class="this-points m-0">This Question point: <span class="this-point">5</span></p> -->
                        </div>
    </div>
</div>
<div class="posts">



<?php 
        // Check if there are posts
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $post_id = get_the_ID();
                $post_title = get_the_title($post_id);

?>


                <div class="form-control mb-2 d-flex flex-row justify-content-between align-items-center">
                    <div class="p mb-0"><?php echo $post_title; ?></div>
                    <div class="p mb-0">
                        <a href="<?php the_permalink($post_id); ?>">
                            <div class="btn btn-success">
                                Practice This
                            </div>
                        </a>
                    </div>
                </div>

        <?php

            }
            // Reset post data
            wp_reset_postdata();
        } else {
            echo '<p>No Questions found.</p>';
        }
        ?>

        </div>
        </div>

<?php
    }
}
