<?php
class Elementor_renu_search_tutor extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'search_tutor';
    } 

    public function get_title()
    {
        return esc_html__('Renu Tutor Search', 'renuaddons');
    }

    public function get_icon()
    {
        return 'eicon-search';
    }
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'renuaddons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        //Add the Status control.
        $this->add_control(
            'product_status',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Product Status', 'renuaddons'),
                'options' => [
                    'publish' => esc_html__('Publish', 'renuaddons'),
                    'draft' => esc_html__('Draft', 'renuaddons'),
                    'private' => esc_html__('Private', 'renuaddons'),
                ],
                'default' => 'publish',
            ]
        );
        // Get product categories

        //adding css & js
         wp_enqueue_style( 'remal-product-grid-styles', plugin_dir_url( __FILE__ ) . 'search-tutor.css', [], '1.0.0', 'all' );
        // wp_enqueue_script( 'remal-product-grid-script', plugin_dir_url( __FILE__ ) . 'search-tutor.js', [ 'jquery' ], '1.0.0', true );
        // //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['search', 'tutor', 'result'];
    }

    protected function render()
    {
        if(isset( $_GET['searching'])){
        $searched_subject = $_GET['searching'];
        } else {
            $searched_subject = 'all';
        }
        // Query arguments
$args = array(
    'post_type' => 'tutor', // Post type is 'teacher'
    'tax_query' => array(
        array(
            'taxonomy' => 'subject', // Taxonomy is 'subject'
            'field' => 'slug',
            'terms' => $searched_subject // Category term is 'english'
        )
    )
);

// Get All posts
$teacher_query = new WP_Query($args);

?> <div class="container">
<div class="row">
<div class="col-md-8">
    <h5>The Available teachers for <?php echo $searched_subject ?></h5>
    <?php 
// Check if there are posts
if ($teacher_query->have_posts()) {
    while ($teacher_query->have_posts()) {
        $teacher_query->the_post();
// Get post title
$post_title = get_the_title();

// Get custom field value with a specific meta key
$my_subjects = get_post_meta(get_the_ID(), 'my_subjects', true);
$biography = get_post_meta(get_the_ID(), 'biography', true);
$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$post_url = get_permalink();

       //Display the main Design
       ?> 
                <div class="tutor-search-row">
                    <div class="row">
                        <div class="col-sm-2 col-xs-3">
                            <a href="/academic-tutoring/tutor/brooke%20b--9460090?s=economics"><img
                                    src="<?php echo $featured_image_url; ?>"
                                    class="tutor-profile-img img-responsive"
                                    alt="<?php echo $post_title . ' | ' . $my_subjects. ' | ' . $biography; ?>"> </a>
                        </div>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-8">
                                    <p class="tutor-name"><a
                                            href="#"><?php echo $post_title; ?></a></p>
                                </div>

                            </div>
                            <p class="subjects"><?php echo $my_subjects; ?></p>
                            <p class="education"><?php echo $biography; ?></p>
                            
                        </div>
                        <div class="col-sm-3">
                            <p class="hidden-xs">
                                <a class="btn btn-primary btn-block"
                                    href="<?php echo $post_url; ?>">VIEW PROFILE</a>
                            </p>

                            <!-- <p class="is-offline">
                                <i class="fa fa-check-circle"></i>&nbsp;<strong>Offline<span class="hidden-xs">
                                        now!</span></strong>
                            </p> -->
                        </div>
                    </div>
                </div>

       
       <?php 

    }
    wp_reset_postdata(); // Reset Post Data
} else {
    // No posts found
    echo 'No teachers found';
}
    
?>           
    </div>

</div> 
</div> 
 <?php 
    }
}