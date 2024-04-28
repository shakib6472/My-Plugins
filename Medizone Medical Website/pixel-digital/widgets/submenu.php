<?php

use ElementorPro\Modules\ThemeBuilder\Conditions\Singular;

class Elementor_pixel_digital_submenu extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'submenu';
    }

    public function get_title()
    {
        return esc_html__('Medizone Submenu', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'fas fa-lines-leaning';
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

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Content', 'pixel-digital'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
        return ['menu', 'submenu'];
    }

    protected function render()
    {
?>

        <script src='https://code.jquery.com/jquery-3.7.1.min.js' integrity='sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=' crossorigin='anonymous'></script>

        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <style>
            .container.product-menu-holder {
                height: 530px;
            }

            .container .row .nava {
                list-style: none;
                list-style-type: none;
                padding-bottom: 20px;
                border-right: 1px solid #f4f4f4;
                border-left: 1px solid #f4f4f4;
                border-bottom: 1px solid #f4f4f4;

            }

            .container .row .nava::-webkit-scrollbar {
                width: 2px;
                /* Adjust this value to change the width */
                height: 5px;
                /* Adjust this value to change the height */
            }

            .container .row .nava::-webkit-scrollbar-thumb {
                background-color: #999;
                /* Change this value to adjust the color */
            }

            .container .row ul {
                list-style: none;
                list-style-type: none;
                margin: 0;
                padding: 0;
            }

            .container .row ul li {
                list-style: none;
                list-style-type: none;
                margin: 0;
                padding: 0;
                transition: all 0.6s;
            }

            .nava ul li.nav1 {
                padding: 10px 20px 10px 10px;
                border-bottom: 1px solid #fafafa;
                transition: all 0.6s;
                position: relative;
                color: #000;

            }

            .nava ul li.nav1.active {
                transition: all 0.6s;
                background-color: #015BA6;
                color: #fafafa;
            }

            .nava ul li.nav1.active a {
                padding: 10px 20px 10px 10px;
                color: #fafafa;
            }

            .nava ul li.nav1 ul li.active {
                transition: all 0.6s;
                background-color: #015BA6;
                color: #fafafa;
            }

            .nava ul li.nav1 ul li ul li.active {
                transition: all 0.6s;
                background-color: transparent;
            }

            .nava ul li.nav1 ul {
                position: absolute;
                border-right: 1px solid #f4f4f4;
                border-left: 1px solid #f4f4f4;
                left: 100%;
                top: 0;
                width: 100%;
                transition: all 0.6s;

            }

            .nava ul li:nth-child(2) ul {
                top: -100%;
            }

            .nava ul li:nth-child(2) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(3) ul {
                top: -200%;
            }

            .nava ul li:nth-child(3) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(4) ul {
                top: -300%;
            }

            .nava ul li:nth-child(4) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(5) ul {
                top: -400%;
            }

            .nava ul li:nth-child(5) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(6) ul {
                top: -500%;
            }

            .nava ul li:nth-child(6) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(7) ul {
                top: -600%;
            }

            .nava ul li:nth-child(7) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(8) ul {
                top: -700%;
            }

            .nava ul li:nth-child(9) ul {
                top: -800%;
            }

            .nava ul li:nth-child(10) ul {
                top: -900%;
            }

            .nava ul li:nth-child(11) ul {
                top: -1000%;
            }

            .nava ul li:nth-child(12) ul {
                top: -1100%;
            }

            .nava ul li:nth-child(8) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(9) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(10) ul ul {
                top: 0%;
            }

            .nava ul li:nth-child(11) ul ul {
                top: -0%;
            }

            .nava ul li:nth-child(12) ul ul {
                top: -0%;
            }


            .nava ul li.nav1 ul li ul {
                position: absolute;
                border-right: none;
                border-left: none;
                border-bottom: none;
                padding: 0;
                left: 100%;
                top: 0;
                transition: all 0.6s;

            }

            .nava ul li.nav1 ul li {
                margin: 0;
                padding: 0;
                transition: all 0.6s;
                padding: 10px 20px 10px 10px;
                border-bottom: 1px solid #fafafa;
                transition: all 0.6s;
                color: #030303;

            }

            .nava ul li.nav1 ul li ul li {
                margin: 0;
                padding: 0;
                transition: all 0.6s;
                padding: 0;
                border-bottom: none;
                border-left: none;
                border-left: none;
            }



            .gridbox {
                width: 250%;
                height: 400px;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                grid-template-rows: repeat(2, 1fr);
                grid-column-gap: 8px;
                grid-row-gap: 8px;

            }

            .gridbox .p-box1 {
                padding: 10px;
                border-radius: 9px;
                border: 1px solid #f4f4f4;
            }

            .gridbox .p-box1 a {
                color: #000;
                text-decoration: none;
                text-align: center;
                transition: all 0.4s;
            }

            .gridbox .p-box1 a img {
                transition: all 0.4s;
            }

            .gridbox .p-box1 a img:hover {
                scale: 1.1;
            }

            .gridbox .p-box1 .title {
                padding: 20px 0 0 0;
                color: #000;
                text-decoration: none;
                text-align: center;
                transition: all 0.3s;
            }

            .gridbox .p-box1 a .title:hover {
                scale: 1.1;
                color: #0ea9cf;
                text-decoration: none;
                text-align: center;
            }

            .gridbox .p-box1 a img {
                max-width: 100%;
            }

            .nava ul li.nav1 ul {
                display: none;
            }

            .nava ul li.nav1 ul.active {
                display: block;
            }

            .nava ul li.nav1 ul.active li ul {
                display: none;
            }

            .nava ul li.nav1 ul.active li.active ul {
                display: block;
            }

            .nava ul li.nav1 ul {
                display: none;
            }

            .nava ul li.nav1 ul li ul {
                display: none;

            }
        </style>
        </head>

        <body>

            <div class="container product-menu-holder">
                <div class="row">
                    <div class="col-xl-3 col-md-3 ">
                        <div class="nava">
                            <ul>
                                <?php


                                $taxonomy = 'medical-item-category';

                                // Get parent categories
                                // Fetch terms without any sorting
                                $parent_categories = get_terms(array(
                                    'taxonomy' => 'medical-item-category',
                                    'parent' => 0, // This fetches only top-level terms
                                    'hide_empty' => false,
                                ));

                                // Define a custom function to compare terms by creation date
                                function compare_terms_by_date($a, $b)
                                {
                                    // Use term_id for comparison since it corresponds to creation date
                                    return $a->term_id - $b->term_id;
                                }

                                // Sort the terms array by creation date
                                usort($parent_categories, 'compare_terms_by_date');


                                $nav1 = 1;
                                $nav2 = 1;
                                // Loop through parent categories
                                foreach ($parent_categories as $parent_category) {

                                ?>
                                    <!-- First Main category -->


                                    <li class="nav1 <?php if (1 == $nav1) {
                                                        echo 'active';
                                                    } ?> "> <a href="<?php echo get_term_link($parent_category); ?>"> <?php echo $parent_category->name; ?> </a>

                                        <ul class="<?php if (1 == $nav1) {
                                                        echo 'active';
                                                    } ?>">
                                            <?php
                                            // Get subcategories of current parent
                                            $subcategories = get_terms(array(
                                                'taxonomy' => 'medical-item-category',
                                                'parent' => $parent_category->term_id, // Fetch subcategories of current parent
                                                'hide_empty' => false,
                                            ));

                                             // Sort the terms array by creation date
                                usort($subcategories, 'compare_terms_by_date');

                                            // Loop through subcategories
                                            foreach ($subcategories as $subcategory) {

                                                // echo '<pre>';
                                                // print_r($subcategory);
                                                // echo '</pre>';
                                            ?>
                                                <li class="nav2  <?php if (1 == $nav2) {
                                                                        echo 'active';
                                                                    } ?> "> <?php echo $subcategory->name ?>

                                                <!-- </li> -->
                                                <ul class="">
                                                    <li class="nav3">
                                                        <div class="gridbox">
                                                            <?php

                                                            $args = array(
                                                                'post_type' => 'medical-item', // Post-type key
                                                                'posts_per_page' => -1, // -1 retrieves all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'medical-item-category',
                                                                        'field' => 'slug',
                                                                        'terms' => $subcategory->slug, // Slug of the specific term
                                                                    ),
                                                                ),
                                                            );

                                                            $query = new WP_Query($args);

                                                            if ($query->have_posts()) {
                                                                while ($query->have_posts()) {
                                                                    $query->the_post();

                                                                    $post_id = get_the_ID();
                                                                    $post_title = get_the_title($post_id);
                                                                    $url = get_permalink($post_id);
                                                                    $featureiamges = get_post_meta($post_id, 'image1', true);
                                                                    $image_url = wp_get_attachment_url($featureiamges); 
                                                                    
                                                            ?>

                                                                    <div class="p-box1 d-flex align-items-center justify-content-center">
                                                                        <a class="animate-5 main-pro-con" href="<?php echo $url; ?>">
                                                                            <div class="img modal-open">
                                                                                <img class="animate-5" src="<?php echo $image_url; ?>" alt="<?php echo $post_title; ?>">
                                                                            </div>
                                                                            <div class="space animate-5 title"><?php echo $post_title; ?></div>
                                                                        </a>
                                                                    </div>
                                                            <?php

                                                                }

                                                                // Restore original post data
                                                                wp_reset_postdata();
                                                            } else {
                                                                // No posts found
                                                                echo 'No Medical Items found';
                                                            }
                                                            ?>
                                                        </div>
                                                    </li>
                                                </ul>

                                    </li>
                                <?php
                                                $nav2++;
                                            }

                                ?>
                            </ul>

                            </li>

                        <?php
                                    $nav1++;
                                }

                        ?>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>





            <script>
                jQuery(document).ready(function($) {


                    $('.nav1').hover(function() {
                        console.log('object');
                        $('.nav1').removeClass('active');
                        $('ul').removeClass('active');
                        $(this).addClass('active');
                        $(this).find('ul').addClass('active');

                    })
                    $('.nav1 a').mouseover(function() {
                        $(this).find('ul:first-child li:first-child').addClass('active'); // Add active class to the first li under the first ul

                    })
                    $('.nav2').hover(function() {
                        $('.nav2').removeClass('active');
                        $('.nav2 ul').removeClass('active');
                        $('.nav2 ul li').removeClass('active');
                        $(this).find('ul').addClass('active');
                        $(this).find('ul li').addClass('active');
                        $(this).addClass('active');
                    })

                });
            </script>


    <?php
    }
}



    ?>