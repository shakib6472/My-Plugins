<?php
class Elementor_boikkotha_custom_slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom-slider';
    }

    public function get_title()
    {
        return esc_html__('Custom Boikoktha Slider', 'boikotha');
    }

    public function get_icon()
    {
        return 'eicon-slide';
    }
    protected function register_controls()
    {
        //Adding Css & JS
        wp_enqueue_style('boikotha-custom-slider-form-css', plugin_dir_url(__FILE__) . 'custom-slider.css', [], '1.0.0', 'all');
        wp_enqueue_style('boikotha-custom-slider-form-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', [], '1.0.0', 'all');
        wp_enqueue_script('jquery');
        wp_enqueue_script('boikotha-custom-slider-slick-jquery-form-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', [], '1.0.0', true);
        wp_enqueue_script('boikotha-custom-slider-form-js', plugin_dir_url(__FILE__) . 'custom-slider.js', [], '1.0.0', true);
        //adding Controls

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'boikotha'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'slide_elements',
			[
				'label' => esc_html__( 'Slide Elements', 'boikotha' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'titel',
						'label' => esc_html__( 'Category Name', 'boikotha' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'All' , 'boikotha' ),
						'label_block' => true,
                    ],
					[   
                        'name' => 'image',
						'label' => esc_html__( 'Choose Image', 'textdomain' ),
				        'type' => \Elementor\Controls_Manager::MEDIA,
				        'default' => [
					    'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                    ],
                    [   
                        'name' => 'link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => [ 'url', 'is_external', 'nofollow' ],
                        'default' => [   ],
                        'label_block' => true,
                    ]
				],
				'default' => [
				],

			]
		);

        $this->end_controls_section();
    }

    public function get_categories()
    {
        return ['boikotha'];
    }

    public function get_keywords()
    {
        return ['slider', 'custom'];
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();



?>
        <div class="container">
            <div class="row category-slider  clearance-bestselling-category__list ">
                <?php
                // Loop through each category

                if ( $settings['slide_elements'] ) {
                    foreach (  $settings['slide_elements'] as $item ) {

                        ?>
<div class="clearance-bestselling-category__list__item" style="width: 187px;" tabindex="" data-slick-index="0" aria-hidden="true">
                        <a class="clearance-bestselling-category__list__item__card" href="<?php  echo $item['undefined']['url']; ?>" tabindex="">
                            <img src="<?php  echo $item['image']['url']; ?>" alt="">
                            <div class="info">
                                <p class="title"><?php  echo $item['titel']; ?></p>
                            </div>
                        </a>
                    </div>
                        
                        <?php

                        
                    }
                    
                }
            



                ?>
            </div>
        </div>
        <script>
            $('.category-slider').slick({
        lazyLoad: 'ondemand',
        slidesToShow: 6,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
        </script>
<?php
    }
}



?>