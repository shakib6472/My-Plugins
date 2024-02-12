<?php

class Elementor_skb_image_on_hover extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'image_on_hover';
    }

    public function get_title()
    {
        return esc_html__('EX Image', 'shakib-helper');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }
    protected function register_controls()
    {

        //adding Controls

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'shakib-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image_on_hover_elements',
            [
                'label' => esc_html__('Lists', 'shakib-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'titel',
                        'label' => esc_html__('List Name', 'shakib-helper'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Title', 'shakib-helper'),
                        'label_block' => true,
                        'responsive' => true, // Add responsive parameter


                    ],  


                    [
                        'name' => 'link',
                        'label' => esc_html__('Link', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => ['url', 'is_external', 'nofollow'],
                        'default' => [],
                        'label_block' => true,
                        'responsive' => true, // Add responsive parameter
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'shakib-helper'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'responsive' => true, // Add responsive parameter
                    ],
                    [
                        'name' => 'list_color',
                        'label' => esc_html__('Color', 'shakib-helper'),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'responsive' => true, // Add responsive parameter

                    ],
                    [
                        'name' => 'height',
                        'label' => esc_html__('Height', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 10000000,
                        'step' => 1,
                        'default' => 400,
                        'responsive' => true, // Add responsive parameter

                    ],
                    [
                        'name' => 'width',
                        'label' => esc_html__('Width', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 10000000,
                        'step' => 1,
                        'default' => 400,
                        'responsive' => true, // Add responsive parameter

                    ],
                    [
                        'name' => 'tranlatex',
                        'label' => esc_html__('TranslateX', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 10000000,
                        'step' => 1,
                        'default' => 400,
                        'responsive' => true, // Add responsive parameter

                    ],
                    [
                        'name' => 'tranlatey',
                        'label' => esc_html__('TranlateY', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 10000000,
                        'step' => 1,
                        'default' => 400,
                        'responsive' => true, // Add responsive parameter

                    ],

                ],
                'default' => [
                    [
                        'titel' => esc_html__('ক্যারিয়ার সাকসেস', 'shakib-helper'),
                        'link' => '#',
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ]
                ],

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
        return ['hover', 'image'];
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();



?>

        <style>

        </style>


        <div class="jgb_posts-grid-builder-container">

            <div class="jgb_grid-builder jgb_grid-builder-posts">
                <div class="jgb_grid-container">
                    <?php
                    // Loop through each category

                    if ($settings['image_on_hover_elements']) {
                        foreach ($settings['image_on_hover_elements'] as $item) {
                            $item_titel = $item['titel'];
                            $item_link = $item['link']['url'];
                            $item_image = $item['image']['url'];
                            $item_list_color = $item['list_color'];
                            $item_height = $item['height'];
                            $item_width = $item['width'];
                            $item_tranlatex = $item['tranlatex'];
                            $item_tranlatey = $item['tranlatey'];
                    ?>
                            <!-- <a href="<?php // echo $item['link']['url']; 
                                            ?>" class="btn btn-category"> <span><?php //echo $item['titel']; 
                                                                                ?></span> </a> -->


                            <div class="jgb_grid-box" style="width: <?php echo $item_width;  ?>px; height: <?php echo $item_height;  ?>px; transform: translate(<?php echo $item_tranlatex;  ?>px, <?php echo $item_tranlatey;  ?>px);">
                                <div class="jgb_item-container">
                                    <div class="jgb_item jgb_item-content-overlay" style="background: <?php echo $item_list_color; ?>;"><a href="<?php echo $item_link;  ?>" class="jgb_item-permalink 22222" style="background: <?php echo $item_list_color; ?>;">
                                            <div class="pgb_item-thumb" style="background-image: url('<?php echo $item_image; ?>');"></div>
                                            <div class="jgb_item-body" style="background: <?php echo $item_list_color; ?>;"><!---->
                                                <div class="jgb_item-title"><?php echo $item_titel; ?></div> <!----> <!----> <!---->
                                            </div>
                                        </a></div>
                                </div>
                            </div>


                    <?php


                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php
    }
}




?>