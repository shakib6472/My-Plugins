<?php

function enqueue_plugin_styles()
{

    wp_enqueue_script('jquery');
    wp_enqueue_script('plugin-scripts-custom', plugin_dir_url(__FILE__) . '/script.js', array('jquery'), '1.0', true);
    wp_enqueue_style('plugin-styles-custom', plugin_dir_url(__FILE__) . '/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_plugin_styles');




function enqueue_admin_scripts()
{
    wp_enqueue_media(); // Enqueue media scripts explicitly
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-admin-script', plugin_dir_url(__FILE__) . '/scripts.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');
function enqueue_plugin_admin_scripts($hook)
{
    // Enqueue scripts and styles only on the plugin settings page
    if ($hook == 'your-plugin-settings-page') {
        wp_enqueue_media(); // Enqueue media scripts explicitly
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-admin-script', plugin_dir_url(__FILE__) . '/scripts.js', array('jquery'), '1.0', true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_plugin_admin_scripts');




// Add menu item to the admin panel
function readermap_theme_menu()
{
    add_menu_page(
        'Reader Camp Settings',
        'Front Page Settings',
        'manage_options',
        'readercamp-theme-settings',
        'readercamp_theme_page',
        'dashicons-admin-generic', // Icon (Optional)
        30 // Position in the menu
    );
}
add_action('admin_menu', 'readermap_theme_menu');

// Create the page content for the admin menu
function readercamp_theme_page()
{
    ?>
    <div class="wrap">
        <h1>Reader Camp Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('readercamp-theme-settings');
            do_settings_sections('readercamp-theme-settings');
            do_settings_sections('readercamp-image-section-settings');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}

// Register settings and fields
function readercamp_theme_settings()
{
    register_setting('readercamp-theme-settings', 'page_titel_input');
    register_setting('readercamp-theme-settings', 'make_profile');
    register_setting('readercamp-theme-settings', 'favorite_frame');
    register_setting('readercamp-theme-settings', 'give_photo');
    register_setting('readercamp-theme-settings', 'choose_frame');
    register_setting('readercamp-theme-settings', 'cover_image_t');
    register_setting('readercamp-theme-settings', 'favorite_cover');
    register_setting('readercamp-theme-settings', 'wish_card');
    register_setting('readercamp-theme-settings', 'wish_upload');
    register_setting('readercamp-theme-settings', 'copyright');
    register_setting('readercamp-theme-settings', 'left_top_icon');
    register_setting('readercamp-theme-settings', 'right_logo');
    register_setting('readercamp-theme-settings', 'option_1');
    register_setting('readercamp-theme-settings', 'option_2');
    register_setting('readercamp-theme-settings', 'right_logo');
    register_setting('readercamp-theme-settings', 'cover_1');
    register_setting('readercamp-theme-settings', 'cover_2');
    register_setting('readercamp-theme-settings', 'last_frame');
    register_setting('readercamp-theme-settings', 'footer_logo');
    // Adding a Section For Texts 
    add_settings_section('readercamp-section-settings', 'Front Page Texts Settings', 'readercamp_settings_section_callback', 'readercamp-theme-settings');
    // Fields for Page titel
    add_settings_field('custom-text-input-1', 'Page Titel', 'page_titel_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for Profile Make
    add_settings_field('make_profile', 'Profile Make', 'make_profile_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for favorite_frame
    add_settings_field('favorite_frame', 'Favorite Frame', 'favorite_frame_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for give_photo
    add_settings_field('give_photo', 'Give Photo', 'give_photo_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for choose_frame
    add_settings_field('choose_frame', 'Choose Frame', 'choose_frame_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for Cover Image Text
    add_settings_field('cover_image_t', 'Cover Image Text', 'cover_image_t_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for Favorite Cover
    add_settings_field('favorite_cover', 'Favorite Cover', 'favorite_cover_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for Wish Card
    add_settings_field('wish_card', 'Wish Card', 'wish_card_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for Wish Upload text
    add_settings_field('wish_upload', 'Wish Upload text', 'wish_upload_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');
    // Fields for Copyright Textarea
    add_settings_field('copyright', 'Copyright Textarea', 'copyright_input_callback', 'readercamp-theme-settings', 'readercamp-section-settings');

    // Adding a Section For Texts 
    add_settings_section('readercamp-image-section-settings', 'Front Page Image Settings', 'readercamp_settings_section_callback', 'readercamp-theme-settings');
    // Left Top Icon
    add_settings_field('left_top_icon', 'Left Top Icon', 'left_top_icon_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    // Right Logo
    add_settings_field('right_logo', 'Right Logo', 'right_logo_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    // Option 1
    add_settings_field('option_1', 'Option 1', 'option_1_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    //Option 2
    add_settings_field('option_2', 'Option 2', 'option_2_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    // Cover 1
    add_settings_field('cover_1', 'cover 1', 'cover_1_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    //Cover 2
    add_settings_field('cover_2', 'cover 2', 'cover_2_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    //last_frame
    add_settings_field('last_frame', 'last_frame', 'last_frame_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
    //Footer Logo
    add_settings_field('footer_logo', 'footer_logo', 'footer_logo_callback', 'readercamp-theme-settings', 'readercamp-image-section-settings');
}
add_action('admin_init', 'readercamp_theme_settings');


//callbacks for Image Settings

//Footer Logo
function footer_logo_callback()
{
    $value = get_option('footer_logo');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="footer_logo" id="footer_logo" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}
//last_frame
function last_frame_callback()
{
    $value = get_option('last_frame');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="last_frame" id="last_frame" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}
//Cover 2
function cover_2_callback()
{
    $value = get_option('cover_2');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="cover_2" id="cover_2" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}
//Cover 1
function cover_1_callback()
{
    $value = get_option('cover_1');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="cover_1" id="cover_1" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}

//Option 2
function option_2_callback()
{
    $value = get_option('option_2');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="option_2" id="option_2" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}
//Option 1
function option_1_callback()
{
    $value = get_option('option_1');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="option_1" id="option_1" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}
//Right Logo
function right_logo_callback()
{
    $value = get_option('right_logo');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="right_logo" id="right_logo" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}
//Left Top Icon
function left_top_icon_callback()
{
    $value = get_option('left_top_icon');
    echo $value;
    ?>
    <div class="image-preview-container">
        <img src="<?php echo esc_url($value); ?>" style="max-width: 100%;" />
        <input type="text" name="left_top_icon" id="left_top_icon" value="<?php echo esc_attr($value); ?>" />
        <input type="button" class="upload_image_button" value="Upload Image" />
        <input type="button" class="remove_image_button" value="Remove Image" />
    </div>
    <?php
}




// Callbacks for text settings fields {
//Copyright Textarea

function copyright_input_callback()
{
    $value = get_option('copyright');
    ?>
    <textarea name="copyright" id="copyright" cols="110" rows="4"> <?php echo esc_attr($value); ?> </textarea>
    <!-- <input type='text' name='copyright' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" /> -->
    <p class="description">Hint: কপিরাইট © প্রথম আলো ডিজিটাল প্রগতি ইনস্যুরেন্স ভবন, ২০-২১ কারওয়ান বাজার, ঢাকা ১২১৫। ফোন:
        ৮১৮০০৭৮-৮১ </p>
    <?php
}
//Wish Upload text
function wish_upload_input_callback()
{
    $value = get_option('wish_upload');
    ?>
    <input type='text' name='wish_upload' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: আপনার ছবি আপলোড করে, নাম এবং শুভেচ্ছাবার্তা লিখে ছবিটি ডাউনলোড করে শেয়ার করুন। </p>
    <?php
}
//Wish Card
function wish_card_input_callback()
{
    $value = get_option('wish_card');
    ?>
    <input type='text' name='wish_card' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: প্রথম আলোকে জানাতে পারেন আপনার শুভেচ্ছা-কথা </p>
    <?php
}
//Favorite Cover
function favorite_cover_input_callback()
{
    $value = get_option('favorite_cover');
    ?>
    <input type='text' name='favorite_cover' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: পছন্দের কাভারে পরিবর্তন করুন আপনার ফেসবুকের কাভার ছবি </p>
    <?php
}
//Page Title
function page_titel_input_callback()
{
    $value = get_option('page_titel_input');
    ?>
    <input type="text" name="page_titel_input" value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: The Page Titel</p>
    <?php
}
// Make Profile
function make_profile_input_callback()
{
    $value = get_option('make_profile');
    ?>
    <input type='text' name='make_profile' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: আপনার প্রোফাইল তৈরি করুন </p>
    <?php
}
//favorite Frame
function favorite_frame_input_callback()
{
    $value = get_option('favorite_frame');
    ?>
    <input type='text' name='favorite_frame' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: পছন্দের ফ্রেমে পরিবর্তন করুন আপনার ফেসবুক প্রোফাইল ছবি </p>
    <?php
}
//Give Photo
function give_photo_input_callback()
{
    $value = get_option('give_photo');
    ?>
    <input type='text' name='give_photo' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: আপনার ছবি দিন </p>
    <?php
}
//Choose Frame
function choose_frame_input_callback()
{
    $value = get_option('choose_frame');
    ?>
    <input type='text' name='choose_frame' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: ফ্রেম পছন্দ করুন </p>
    <?php
}
//Cover Image Text
function cover_image_t_input_callback()
{
    $value = get_option('cover_image_t');
    ?>
    <input type='text' name='cover_image_t' value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: কাভার ছবি ডাউনলোড </p>
    <?php
}
//end }




function readercamp_settings_section_callback()
{
}
