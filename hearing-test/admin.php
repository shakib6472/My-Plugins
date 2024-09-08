<?php 

// Add Admin Menu
function ht_setup_menu() {
    add_menu_page(
        'HT Setup',            // Page title
        'HT Setup',            // Menu title
        'manage_options',      // Capability
        'ht-setup',            // Menu slug
        'ht_setup_page',       // Function to display the page
        'dashicons-admin-generic', // Icon
        100                     // Position
    );
}
add_action('admin_menu', 'ht_setup_menu');

// Display the settings page
function ht_setup_page() {
    ?>
    <div class="wrap">
        <h1>HT Setup</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ht_setup_options');
            do_settings_sections('ht-setup');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings, sections, and fields
function ht_setup_settings() {
    register_setting('ht_setup_options', 'ht_setup_options', 'sanitize_ht_setup_options');

    add_settings_section(
        'ht_colors_section', // Section ID
        'Color Settings',    // Section Title
        null,                // Callback
        'ht-setup'           // Page
    );

    add_settings_field(
        'green_color',
        'Green Color',
        'ht_color_picker',
        'ht-setup',
        'ht_colors_section',
        array('label_for' => 'green_color')
    );

    add_settings_field(
        'blue_color',
        'Blue Color',
        'ht_color_picker',
        'ht-setup',
        'ht_colors_section',
        array('label_for' => 'blue_color')
    );

    add_settings_section(
        'ht_fonts_section',  // Section ID
        'Font Settings',     // Section Title
        null,                // Callback
        'ht-setup'           // Page
    );

    add_settings_field(
        'font_family',
        'Font Family',
        'ht_font_picker',
        'ht-setup',
        'ht_fonts_section',
        array('label_for' => 'font_family')
    );
}
add_action('admin_init', 'ht_setup_settings');

// Color Picker Callback
function ht_color_picker($args) {
    $options = get_option('ht_setup_options');
    $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
    echo '<input type="color" id="' . esc_attr($args['label_for']) . '" name="ht_setup_options[' . esc_attr($args['label_for']) . ']" value="' . $value . '" class="my-color-field" />';
}

// Google Font Picker Callback
function ht_font_picker($args) {
    $options = get_option('ht_setup_options');
    $value = isset($options[$args['label_for']]) ? esc_attr($options[$args['label_for']]) : '';
    ?>
    <select id="<?php echo esc_attr($args['label_for']); ?>" name="ht_setup_options[<?php echo esc_attr($args['label_for']); ?>]">
        <option value="">Select Font</option>
        <?php
        // You can manually add the most common Google Fonts here
        $google_fonts = array(
            'Arial, sans-serif' => 'Arial',
            'Roboto, sans-serif' => 'Roboto',
            'Open Sans, sans-serif' => 'Open Sans',
            'Lato, sans-serif' => 'Lato',
            'Montserrat, sans-serif' => 'Montserrat',
            'Oswald, sans-serif' => 'Oswald',
            'Raleway, sans-serif' => 'Raleway',
            'Poppins, sans-serif' => 'Poppins',
            'Merriweather, serif' => 'Merriweather',
            'PT Sans, sans-serif' => 'PT Sans',
            'Ubuntu, sans-serif' => 'Ubuntu',
            'Nunito, sans-serif' => 'Nunito',
            'Roboto Condensed, sans-serif' => 'Roboto Condensed',
            'Playfair Display, serif' => 'Playfair Display',
            'Work Sans, sans-serif' => 'Work Sans',
            'Rubik, sans-serif' => 'Rubik',
            'Quicksand, sans-serif' => 'Quicksand',
            'Lora, serif' => 'Lora',
            'Mukta, sans-serif' => 'Mukta',
            'Fira Sans, sans-serif' => 'Fira Sans',
            'Inter, sans-serif' => 'Inter',
            'Barlow, sans-serif' => 'Barlow',
            'Josefin Sans, sans-serif' => 'Josefin Sans',
            'Hind, sans-serif' => 'Hind',
            'Oxygen, sans-serif' => 'Oxygen',
            'Anton, sans-serif' => 'Anton',
            'Cabin, sans-serif' => 'Cabin',
            'Crimson Text, serif' => 'Crimson Text',
            'Dosis, sans-serif' => 'Dosis',
            'Titillium Web, sans-serif' => 'Titillium Web',
            'Manrope, sans-serif' => 'Manrope',
            'Bebas Neue, cursive' => 'Bebas Neue',
            'Heebo, sans-serif' => 'Heebo',
            'Arvo, serif' => 'Arvo',
            'Teko, sans-serif' => 'Teko',
            'Space Mono, monospace' => 'Space Mono',
            'Overpass, sans-serif' => 'Overpass',
            'Karla, sans-serif' => 'Karla',
            'Archivo, sans-serif' => 'Archivo',
            'Asap, sans-serif' => 'Asap',
            'Exo 2, sans-serif' => 'Exo 2',
            'Exo, sans-serif' => 'Exo',
            'Zilla Slab, serif' => 'Zilla Slab',
            'Noto Sans, sans-serif' => 'Noto Sans',
            'Jost, sans-serif' => 'Jost',
            'Varela Round, sans-serif' => 'Varela Round',
            'Fjalla One, sans-serif' => 'Fjalla One',
            'Bitter, serif' => 'Bitter',
            'Catamaran, sans-serif' => 'Catamaran',
            'Cairo, sans-serif' => 'Cairo',
            'Nanum Gothic, sans-serif' => 'Nanum Gothic',
            'Assistant, sans-serif' => 'Assistant',
            'Cormorant Garamond, serif' => 'Cormorant Garamond',
            'Baloo 2, cursive' => 'Baloo 2',
            'Noto Serif, serif' => 'Noto Serif',
            'Ubuntu Condensed, sans-serif' => 'Ubuntu Condensed',
            'Inconsolata, monospace' => 'Inconsolata',
            'Kaushan Script, cursive' => 'Kaushan Script',
            'Muli, sans-serif' => 'Muli',
            'Amatic SC, cursive' => 'Amatic SC',
            'Slabo 27px, serif' => 'Slabo 27px',
            'Permanent Marker, cursive' => 'Permanent Marker',
            'Pacifico, cursive' => 'Pacifico',
            'Righteous, cursive' => 'Righteous',
            'Rokkitt, serif' => 'Rokkitt',
            'Sigmar One, cursive' => 'Sigmar One',
            'Lobster, cursive' => 'Lobster',
            'Cinzel, serif' => 'Cinzel',
            'Dancing Script, cursive' => 'Dancing Script',
            'Shadows Into Light, cursive' => 'Shadows Into Light',
            'Maven Pro, sans-serif' => 'Maven Pro',
            'Alfa Slab One, cursive' => 'Alfa Slab One',
            'Spectral, serif' => 'Spectral',
            'Crete Round, serif' => 'Crete Round',
            'Bangers, cursive' => 'Bangers',
            'Kalam, cursive' => 'Kalam',
            'Cookie, cursive' => 'Cookie',
            'Satisfy, cursive' => 'Satisfy',
            'Caveat, cursive' => 'Caveat',
            'Covered By Your Grace, cursive' => 'Covered By Your Grace',
            'Sarabun, sans-serif' => 'Sarabun',
            'Courgette, cursive' => 'Courgette',
            'Yellowtail, cursive' => 'Yellowtail',
            'Lobster Two, cursive' => 'Lobster Two',
            'Comic Neue, cursive' => 'Comic Neue',
            'Parisienne, cursive' => 'Parisienne',
            'Gloria Hallelujah, cursive' => 'Gloria Hallelujah',
            'Indie Flower, cursive' => 'Indie Flower',
            'Satisfy, cursive' => 'Satisfy',
            'Architects Daughter, cursive' => 'Architects Daughter',
            'Kalam, cursive' => 'Kalam',
            'Special Elite, cursive' => 'Special Elite',
            'Shadows Into Light Two, cursive' => 'Shadows Into Light Two',
            'Patrick Hand, cursive' => 'Patrick Hand',
            'Homemade Apple, cursive' => 'Homemade Apple',
            'Just Another Hand, cursive' => 'Just Another Hand',
            'Reenie Beanie, cursive' => 'Reenie Beanie',
        );

        foreach ($google_fonts as $font_value => $font_name) {
            echo '<option value="' . esc_attr($font_value) . '" ' . selected($value, $font_value, false) . '>' . esc_html($font_name) . '</option>';
        }
        ?>
    </select>
    <?php
}

// Sanitize the input
function sanitize_ht_setup_options($input) {
    $sanitized = array();
    if (isset($input['green_color'])) {
        $sanitized['green_color'] = sanitize_hex_color($input['green_color']);
    }
    if (isset($input['blue_color'])) {
        $sanitized['blue_color'] = sanitize_hex_color($input['blue_color']);
    }
    if (isset($input['font_family'])) {
        $sanitized['font_family'] = sanitize_text_field($input['font_family']);
    }
    return $sanitized;
}

// Enqueue the color picker and Google Fonts
function ht_enqueue_color_picker($hook_suffix) {
    if ('toplevel_page_ht-setup' !== $hook_suffix) {
        return;
    }
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('ht-color-picker', plugins_url('ht-color-picker.js', __FILE__), array('wp-color-picker'), false, true);

    // Load Google Fonts dynamically based on the selected font
    $options = get_option('ht_setup_options');
    if (!empty($options['font_family'])) {
        $font_family = explode(',', $options['font_family'])[0];
        wp_enqueue_style('ht-google-font', 'https://fonts.googleapis.com/css?family=' . urlencode($font_family));
    }
}
add_action('admin_enqueue_scripts', 'ht_enqueue_color_picker');
