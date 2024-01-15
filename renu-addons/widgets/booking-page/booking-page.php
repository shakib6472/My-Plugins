<?php
class Elementor_renu_booking_page extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'booking-page';
    }

    public function get_title()
    {
        return esc_html__('Renu Tutor Booking', 'renuaddons');
    }

    public function get_icon()
    {
        return 'dashicons-businessman';
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
        
        // Get product categories
        //adding css & js
         wp_enqueue_style( 'renu-tutor-booking-page-styles', plugin_dir_url( __FILE__ ) . 'booking-page.css', [], '1.0.0', 'all' );
        wp_enqueue_script( 'renu-tutor-booking-jquery-page-script', 'https://code.jquery.com/jquery-3.7.1.min.js', [ ], '1.0.0', true );
        wp_enqueue_script( 'renu-tutor-booking-jquery-loading-page-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70.0-2014.11.23/jquery.blockUI.min.js', [ ], '1.0.0', true );
        $ajaxurl = admin_url('admin-ajax.php');
        wp_enqueue_script( 'renu-tutor-booking-page-script', plugin_dir_url( __FILE__ ) . 'booking-page.js', [ 'jquery' ], '1.0.0', true );

wp_localize_script('renu-tutor-booking-page-script', 'ajaxurl', $ajaxurl);

        // //end Control
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['tutor', 'booking'];
    }

    protected function render()
    {
        $post_title = get_the_title();

        // Get custom field value with a specific meta key
        $my_subjects = get_post_meta(get_the_ID(), 'my_subjects', true);
        $biography = get_post_meta(get_the_ID(), 'biography', true);
        $career_experience = get_post_meta(get_the_ID(), 'career_experience', true);
        $i_love_tutoring_because = get_post_meta(get_the_ID(), 'i_love_tutoring_because', true);
        $other_interests = get_post_meta(get_the_ID(), 'other_interests', true);
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $post_url = get_permalink();
        // Check if the user is not logged in
        if (!is_user_logged_in()) {
            // Get the login URL
            $login_url = wp_login_url();

            // Redirect to the login page
            wp_redirect($login_url);
            exit;
        } else { ?>
        <!-- Design for booking form -->
        <div class="booking-form">
        <h2>Booking Form</h2>
        <form action="#" method="post" class="booking-form-renu">
            <div class="form-group">
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full_name" required value="<?php echo esc_attr(wp_get_current_user()->display_name); ?>">

            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'phone_number', true)); ?>">
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <select name="subject" id="subject" required>
                    
                </select>
               
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>

            <div class="form-group">
                
                <label>Hours:</label>
                <div class="hours">
                <?php
                // Loop through hours
                for ($i = 9; $i <= 21; $i++) {
                    $hour = sprintf("%02d", $i);
                    echo "<label><input type='radio' name='hours' value='$hour:00'> $hour:00 </label>";
                }
                ?>
                </div>
            </div>

            <div class="form-group">
                <label for="special-request">Question?</label>
                <textarea id="special-request" name="special_request" rows="4"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn">Pay & Book The Tutor</button>
            </div>
        </form>
    </div>
       <?php }
?> 
 
 <?php 
    }
}