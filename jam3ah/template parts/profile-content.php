
<?php 
// Get the current URL
$current_url = $_SERVER['REQUEST_URI'];

// Check if the URL contains "/en"
if (strpos($current_url, "/en") !== false) {
    // the Code for only English Language
 $en_language = true;
    
} else {
    // The URL does not contain "/en", so you can handle it differently
    // For example:
    $en_language = false ;
}
?>

<div class="my-profile-content content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="Headering-part ">
                    <h3><?php echo ($en_language !== false) ? 'Edit My Profile' : 'تعديل ملفي الشخصي '; ?></h3>
                </div>
                <div class="tutor-dashboard-content-inner">
                    <div class="tutor-mb-32">
                        <?php

                        $user = wp_get_current_user();

                        // Prepare profile pic.
                        $profile_placeholder = apply_filters('tutor_login_default_avatar', tutor()->url . 'assets/images/profile-photo.png');
                        $profile_photo_src   = $profile_placeholder;
                        $profile_photo_id    = get_user_meta($user->ID, '_tutor_profile_photo', true);
                        if ($profile_photo_id) {
                            $url                                 = wp_get_attachment_image_url($profile_photo_id, 'full');
                            !empty($url) ? $profile_photo_src = $url : 0;
                        }

                        // Prepare cover photo.
                        $cover_placeholder = tutor()->url . 'assets/images/cover-photo.jpg';
                        $cover_photo_src   = $cover_placeholder;
                        $cover_photo_id    = get_user_meta($user->ID, '_tutor_cover_photo', true);
                        if ($cover_photo_id) {
                            $url                               = wp_get_attachment_image_url($cover_photo_id, 'full');
                            !empty($url) ? $cover_photo_src = $url : 0;
                        }

                        // Prepare display name.
                        $public_display                     = array();
                        $public_display['display_nickname'] = $user->nickname;
                        $public_display['display_username'] = $user->user_login;

                        if (!empty($user->first_name)) {
                            $public_display['display_firstname'] = $user->first_name;
                        }

                        if (!empty($user->last_name)) {
                            $public_display['display_lastname'] = $user->last_name;
                        }

                        if (!empty($user->first_name) && !empty($user->last_name)) {
                            $public_display['display_firstlast'] = $user->first_name . ' ' . $user->last_name;
                            $public_display['display_lastfirst'] = $user->last_name . ' ' . $user->first_name;
                        }

                        if (!in_array($user->display_name, $public_display)) { // Only add this if it isn't duplicated elsewhere.
                            $public_display = array('display_displayname' => $user->display_name) + $public_display;
                        }

                        $public_display = array_map('trim', $public_display);
                        $public_display = array_unique($public_display);
                        $max_filesize   = floatval(ini_get('upload_max_filesize')) * (1024 * 1024);
                        ?>

                        <div class="tutor-dashboard-setting-profile tutor-dashboard-content-inner">

                            <?php do_action('tutor_profile_edit_form_before'); ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <?php
                                $error_list = apply_filters('tutor_profile_edit_validation_errors', array());
                                if (is_array($error_list) && count($error_list)) {
                                    echo '<div class="tutor-alert-warning tutor-mb-12"><ul class="tutor-required-fields">';
                                    foreach ($error_list as $error_key => $error_value) {
                                        echo '<li>' . esc_html($error_value) . '</li>';
                                    }
                                    echo '</ul></div>';
                                }
                                ?>

                                <?php do_action('tutor_profile_edit_input_before'); ?>

                                <div class="tutor-row">
                                    <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                        <label class="tutor-form-label tutor-color-secondary">
                                            <?php esc_html_e('First Name', 'tutor'); ?>
                                        </label>
                                        <input class="tutor-form-control" type="text" name="first_name" value="<?php echo esc_attr($user->first_name); ?>" placeholder="<?php esc_attr_e('First Name', 'tutor'); ?>">
                                    </div>

                                    <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                        <label class="tutor-form-label tutor-color-secondary">
                                            <?php esc_html_e('Last Name', 'tutor'); ?>
                                        </label>
                                        <input class="tutor-form-control" type="text" name="last_name" value="<?php echo esc_attr($user->last_name); ?>" placeholder="<?php esc_attr_e('Last Name', 'tutor'); ?>">
                                    </div>
                                </div>

                                <div class="tutor-row">
                                    <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                        <label class="tutor-form-label tutor-color-secondary">
                                            <?php esc_html_e('User Name', 'tutor'); ?>
                                        </label>
                                        <input class="tutor-form-control" type="text" disabled="disabled" value="<?php echo esc_attr($user->user_login); ?>">
                                    </div>

                                    <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                        <label class="tutor-form-label tutor-color-secondary">
                                            <?php esc_html_e('WhatsApp Number', 'jam3ah'); ?>
                                        </label>
                                        <input class="tutor-form-control" type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" name="phone_number" value="<?php echo esc_html(filter_var(get_user_meta($user->ID, 'phone_number', true), FILTER_SANITIZE_NUMBER_INT)); ?>" placeholder="<?php esc_attr_e('WhatsApp Number', 'jam3ah'); ?>">
                                    </div>
                                </div>
                                <div class="tutor-row">
                                    <div class="tutor-col-12 tutor-mb-32">
                                        <label class="tutor-form-label tutor-color-secondary">
                                            <?php esc_html_e('Bio', 'jam3ah'); ?>
                                        </label>
                                        <?php
                                        $profile_bio = get_user_meta($user->ID, '_tutor_profile_bio', true);
                                        wp_editor($profile_bio, 'tutor_profile_bio', tutor_utils()->get_profile_bio_editor_config());
                                        ?>
                                    </div>
                                </div>

                                <div class="tutor-row">
                                    <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
                                        <label class="tutor-form-label tutor-color-secondary">
                                            <?php esc_html_e('Display name publicly as', 'jam3ah'); ?>

                                        </label>
                                        <select class="tutor-form-select" name="display_name">
                                            <?php
                                            foreach ($public_display as $_id => $item) {
                                            ?>
                                                <option <?php selected($user->display_name, $item); ?>><?php echo esc_html($item); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="tutor-fs-7 tutor-color-secondary tutor-mt-12">
                                            <?php esc_html_e('The display name is shown in all public fields, such as the author name, instructor name, student name, and name that will be printed on the certificate.', 'jam3ah'); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php do_action('tutor_profile_edit_input_after', $user); ?>

                                <div class="tutor-row">
                                    <div class="tutor-col-12">
                                        <button type="submit" class="tutor-btn tutor-btn-primary tutor-profile-settings-save">
                                            <?php esc_html_e('Update Profile', 'jam3ah'); ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <?php do_action('tutor_profile_edit_form_after'); ?>
                        </div>
                        <style>
                            .tutor-form-control.invalid {
                                border-color: red;
                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>