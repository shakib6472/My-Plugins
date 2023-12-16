<?php 



function marvel_shakib_plugin_menu()
{
    add_menu_page(
        'Charecter Settings',
        'Charecter Settings',
        'manage_options',
        'marvel_shakib_plugin_settings',
        'marvel_shakib_plugin_page',
        'dashicons-admin-generic', // Icon (Optional)
        30 // Position in the menu
    );
}
add_action('admin_menu', 'marvel_shakib_plugin_menu');

// Create the page content for the admin menu
function marvel_shakib_plugin_page()
{
    ?>
    <div class="wrap">
        <h1>Charecter Settings</h1>
        <form id="readercamp-settings-form" method="post" action="options.php">
            <?php
            settings_fields('marvel_shakib_plugin_settings');
            do_settings_sections('marvel_shakib_plugin_settings'); ?>
            <!-- <div class="marvel_shakib_plugin_settings">
                save changes
</div> -->
<?php submit_button('Save Settings', 'primary', 'save-settings-btn'); ?>
        </form>
    </div>

    <?php
}

// Register settings and fields
function marvel_shakib_plugin_settings()
{
    register_setting('marvel_shakib_plugin_settings', 'carecter_number');
    register_setting('marvel_shakib_plugin_settings', 'carecter_limit');

    // Adding a Section For Texts 
    add_settings_section('marvel-shakib-plugin-settings', 'Charecter Settings', 'readercamp_settings_section_callback', 'marvel_shakib_plugin_settings');
    // Fields for Page titel
    add_settings_field('skb-input-offset', 'Offset Setting', 'carecter_number_callback', 'marvel_shakib_plugin_settings', 'marvel-shakib-plugin-settings');
    add_settings_field('skb-input-limit', 'Limit Settings', 'carecter_limit_callback', 'marvel_shakib_plugin_settings', 'marvel-shakib-plugin-settings');
    // Fields for Profile Make
}
add_action('admin_init', 'marvel_shakib_plugin_settings');


//callbacks for Image Settings
function carecter_number_callback()
{
    $value = get_option('carecter_number');
    ?>
    <input type="text" name="carecter_number" id="offset-settings" value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: 1</p>
    <?php
}
function carecter_limit_callback()
{
    $value = get_option('carecter_limit');
    ?>
    <input type="text" name="carecter_limit" id="limit-settings" value="<?php echo esc_attr($value); ?>" style="
            width: 80%;" />
    <p class="description">Hint: 5</p>
    <?php
}
//end }




function readercamp_settings_section_callback()
{
}



function marvel_custom_activate()
{
    // Trigger our function that registers the custom post type plugin.
    marvel_shakib_plugin_menu();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'marvel_custom_activate');

