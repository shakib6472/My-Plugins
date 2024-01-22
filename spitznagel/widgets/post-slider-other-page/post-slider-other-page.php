<?php
class Elementor_spitznagel_post_slider_other_page extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'post-slider-other-page';
    } 

    public function get_title()
    {
        return esc_html__('Post SLider Other Page', 'spitznagel');
    }

    public function get_icon()
    {
        return 'eicon-slider-album';
    }
    protected function _register_controls()
    {
        //Add the Status control.
        // Get product categories

        //adding css & js
         wp_enqueue_style( 'spitznagel_post-slider-other-page_css', plugin_dir_url( __FILE__ ) . 'post-slider-other-page.css', [], '1.0.0', 'all' );
        // wp_enqueue_script( 'remal-product-grid-script', plugin_dir_url( __FILE__ ) . 'search-tutor.js', [ 'jquery' ], '1.0.0', true );
        // //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['post', 'slider', 'other'];
    }

    protected function render()
    {
  

?> 
<!-- Slider Box Upper part -->
<div class="slider-box">
        <div class="arrow left"></div>
        <div class="slider-container">
<?php 

    $args = array(
        'post_type' => 'lagerlogistik', // Replace with your custom post type key
        'posts_per_page' => -1, // Set to -1 to retrieve all posts
    );

    $all_other_posts = new WP_Query($args);

    if ($all_other_posts->have_posts()) {
        while ($all_other_posts->have_posts()) {
            $all_other_posts->the_post();
    // Get post title
    $post_title = get_the_title();
    
    // Get custom field value with a specific meta key
    $description = get_post_meta(get_the_ID(), 'lagerlogistik', true);
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

 ?> 
                
                <div class="slider-item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image-box">
                                <img src="<?php echo $featured_image_url; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="headline">
                                <h3><?php echo $post_title; ?></h3>
                            </div>
                            <div class="informations">
                                <div class="list">
                                    
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
       <?php 
  wp_reset_postdata(); // Reset Post Data


        }
    }

    

  
    
?>           
    </div>
    <div class="arrow right"></div>
</div> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function () {
            var slideIndex = 0;

            // Function to show the current slide
            function showSlide() {
                var translateValue = -slideIndex * 100 + '%';
                $('.slider-container').css('transform', 'translateX(' + translateValue + ')');
            }

            // Next slide
            $('.arrow.right').click(function () {
                slideIndex = (slideIndex + 1) % $('.slider-item').length;
                showSlide();
            });

            // Previous slide
            $('.arrow.left').click(function () {
                slideIndex = (slideIndex - 1 + $('.slider-item').length) % $('.slider-item').length;
                showSlide();
            });
        });
    </script>
 <?php 
    }
}