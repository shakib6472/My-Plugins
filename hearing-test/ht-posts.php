<?php
class Elementor_hearing_test_posts extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'ht-posts';
    }

    public function get_title()
    {
        return esc_html__('HT Posts', 'hearing_test');
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
        $paged = isset($_GET['pac']) ? intval($_GET['pac']) : 1;

        // Query arguments
        $args = array(
            'post_type'      => 'hearing-test',
            'posts_per_page' => 1,
            'paged'          => $paged,
        );

        // Query the posts
        $query = new WP_Query($args);

        // Check if there are posts
        if ($query->have_posts()) {
            while ($query->have_posts()) {

                $post_id = get_the_ID();
                $post_title = get_the_title($post_id);
                $post_thumbnail_id = get_post_thumbnail_id($post_id);
                $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                $custom_field_value = get_post_meta($post_id, 'custom_field_key', true);
                $query->the_post();
                $post_id = get_the_ID();
                $post_title = get_the_title($post_id);
                $audio_id = get_post_meta($post_id, 'uplaod_audio_file', true);
                $question_lebel = get_post_meta($post_id, 'question_lebel', true);
                $audio_url = wp_get_attachment_url($audio_id);
                $post_number = ($paged - 1) * 1 + $query->current_post + 1;

        ?>

                <!-- Main HTML -->
                <script src='https://kit.fontawesome.com/46882cce5e.js' crossorigin='anonymous'></script>
                <div class="container d-flex justify-content-center align-items-center flex-column">
                    <!-- Loader -->
                    <div class="loader-box">
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

                    <!-- Loader -->
                    <!-- First Row -->
                    <div class="row monitization-mode w-100 align-items-center">
                        <div class="d-flex align-items-center gap-3  w-50">

                            <div class="monitization d-flex gap-3">
                                <p class="m-0">Memorization</p>
                                <p class="m-0"><?php echo $post_title; ?></p>
                            </div>

                        </div>
                        <div class="points d-flex align-items-center justify-content-end gap-3 w-50">
                            <div class="labels ht-post">
                                <div class="custom-dropdown">
                                    <button class="dropdown-toggle">
                                        <i class="fas fa-bookmark" data-value="1" data-postid="<?php echo $post_id; ?>"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item option-1" data-value="1">
                                            <i class="fas fa-bookmark option-1" data-value="1" data-postid="<?php echo $post_id; ?>"></i>
                                        </li>
                                        <li class="dropdown-item option-2" data-value="2">
                                            <i class="fas fa-bookmark option-2" data-value="2" data-postid="<?php echo $post_id; ?>"></i>
                                        </li>
                                        <li class="dropdown-item option-3" data-value="3">
                                            <i class="fas fa-bookmark option-3" data-value="3" data-postid="<?php echo $post_id; ?>"></i>
                                        </li>
                                        <li class="dropdown-item option-4" data-value="4">
                                            <i class="fas fa-bookmark option-4" data-value="4" data-postid="<?php echo $post_id; ?>"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <p class="total-points m-0">Your Total Point: <span class="total-point">50</span></p> -->
                            <div class="btn btn-primary how-many-time-taseted">Tested( 9 )</div>
                            <!-- <p class="this-points m-0">This Question point: <span class="this-point">5</span></p> -->
                        </div>
                    </div>
                    <!-- Second Row Audio-->
                    <div class="row w-100 mt-3">
                        <div class="form-control">
                            <div class="p-0 w-100">
                                <audio class="w-100 position-relative" controls autoplay src="<?php echo $audio_url; ?>"></audio>
                            </div>
                        </div>
                    </div>
                    <!-- Third Row Answer Row -->
                    <div class="row mt-3 w-100 ">
                        <div class="answer-box p-2 d-flex form-control">
                            <input type="text" class="w-100 answer-input" placeholder="Write What You hear">
                            <input type="submit" class="answer submit" value="Submit" data-postid="<?php echo $post_id; ?>">
                        </div>
                        <p class="result"></p>
                        <p class="right-answer m-0"></p>
                        <p class="error text-danger m-0"></p>
                    </div>

                    <div class="row mt-3 w-100 d-flex flex-colum justify-content-between">
                        <div class="all w-50"> <a href="<?php echo home_url('all-questions/'); ?>">
                                <div class="btn btn-success">All Questions List</div>
                            </a></div>

                        <div class="noll w-50 text-end">
                            <?php // Display current post number and total posts
                            echo '<p class="d-inline" >Question ' . $post_number . ' of ' . $query->found_posts . '</p>'; ?>
                    <?php
                }

                // Pagination
                echo '<div class="pagination d-flex justify-content-end">';
                if ($paged > 1) {
                    echo '<a class="btn btn-primary me-3" href="' . esc_url(add_query_arg('pac', $paged - 1)) . '">Previous</a>';
                }
                if ($paged < $query->max_num_pages) {
                    echo '<a class="btn btn-primary" href="' . esc_url(add_query_arg('pac', $paged + 1)) . '">Next</a>';
                }
                echo '</div>';

                // Reset post data
                wp_reset_postdata();
            } else {
                echo '<p>No posts found.</p>';
            }
                    ?>

                        </div>
                    </div>

            <?php
        }
    }
