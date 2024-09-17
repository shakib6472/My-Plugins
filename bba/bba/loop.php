<?php
class Elementor_bba_lesson_loop extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lessons_loop';
    }

    public function get_title()
    {
        return esc_html__('Lessons', 'spitznagel');
    }

    public function get_icon()
    {
        return 'fas fa-award';
    }
    protected function _register_controls()
    {

    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['certificate'];
    }

    protected function render()
    {
        ?>
        <div class="pre-loader">
            <div class="lds-hourglass"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    global $wpdb;

                    $current_user_id = get_current_user_id();
                    $id = get_the_ID();
                    $category_id = get_post_meta($id, 'category_id', true);
                    $course_id = get_post_meta($id, 'product_id', true);
                    if (!$current_user_id) {
                        ?>

                        <div class="non-purchase d-flex align-items-center justify-content-center flex-column">
                            <h3>
                                Please Purchase the course to see lessons
                            </h3>
                            <div class="btn btn-warning btn-learge new_enroll_now_button" data-id="<?php echo $course_id; ?>">
                                Enroll Now </div>
                        </div>

                        <?php
                    } else {
                        // Fetch all rows from the table for the current user
                        $results = $wpdb->get_results(
                            $wpdb->prepare(
                                "SELECT * FROM {$wpdb->prefix}bba_course_lookup WHERE user_id = %d AND product_id = %d",
                                $current_user_id,
                                $course_id
                            )
                        );

                        if (empty($results)) {
                            ?>

                            <div class="non-purchase d-flex align-items-center justify-content-center flex-column">
                                <h3>
                                    Please Purchase the course to see lessons
                                </h3>
                                <div class="btn btn-warning btn-learge new_enroll_now_button" data-id="<?php echo $course_id; ?>">
                                    Enroll Now </div>
                            </div>



                            <?php
                        } else {
                            ?>

                            <div class="gridbox">

                                <?php

                                $args = array(
                                    'post_type' => 'lesson', // Post-type key
                                    'posts_per_page' => -1, // -1 retrieves all posts
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'course',       // Taxonomy name
                                            'field' => 'term_id',       // Use term ID to filter
                                            'terms' => $category_id,    // Term ID variable
                                        ),
                                    ),
                                );


                                $query = new WP_Query($args);

                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $post_id = get_the_ID();
                                        $post_title = get_the_title($post_id);
                                        $post_thumbnail_id = get_post_thumbnail_id($post_id);
                                        $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                                        $very_short_description = get_post_meta($post_id, 'very_short_description', true);
                                        $parmalink = get_permalink($post_id);
                                        $short_description = get_post_meta($post_id, 'short_description', true);
                                        $short_description = get_post_meta($post_id, 'short_description', true);
                                        ?>
                                        <div class="item">
                                            <a href="<?php echo $parmalink; ?>">
                                            <div class="loop-main-container">
                                                <div class="loop-info" style="background-image:url(<?php echo $post_thumbnail_url ?>);">
                                                    <i class="fas fa-play loop-play-icon"></i>
                                                    <h2 class="loop-lesson"><?php echo $post_title; ?></h2>
                                                    <h2 class="loop-main-heading"><?php echo $very_short_description; ?></h2>
                                                </div>
                                                <p class="loop-pera"><?php echo $short_description; ?></p>
                                            </div>
                                            </a>
                                        </div><?php

                                    }

                                    // Restore original post data
                                    wp_reset_postdata();
                                } else {
                                    // No posts found
                                    echo 'No posts found';
                                }
                                ?>




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