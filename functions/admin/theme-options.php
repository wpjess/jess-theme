function theme_options_menu() {
    add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme-options', 'theme_options_page');
}
add_action( 'admin_menu', 'theme_options_menu' );

// Create the options page
function theme_options_page() {
    ?>
    <div class="wrap">
        <h2>Theme Options</h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'theme_options' ); ?>
            <?php do_settings_sections( 'theme_options' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}



// Callback function for the "general" section
function general_section_callback() {
    echo '<p>General settings for your theme</p>';
}

// Callback function for the "site_title" field
function site_title_callback() {
    $options = get_option( 'theme_options' );
    echo '<input type="text" id="site_title" name="theme_options[site_title]" value="' . esc_attr( $options['site_title'] ) . '" />';
}

// Callback function for the "site_description" field
function site_description_callback() {
    $options = get_option( 'theme_options' );
    echo '<textarea id="site_description" name="theme_options[site_description]" rows="5" cols="50">' . esc_textarea( $options['site_description'] ) . '</textarea>';
}

// Add fields to the "general" section including radio, checkbox, and select fields
function radio_field_callback() {
    $options = get_option( 'theme_options' );
    $selected_option = isset( $options['radio_field'] ) ? esc_attr( $options['radio_field'] ) : '';
    
    $choices = array(
        'option1' => 'Option 1',
        'option2' => 'Option 2',
        'option3' => 'Option 3'
    );
    
    foreach ($choices as $value => $label) {
        echo '<input type="radio" id="radio_' . $value . '" name="theme_options[radio_field]" value="' . $value . '" ' . checked( $selected_option, $value, false ) . ' />';
        echo '<label for="radio_' . $value . '">' . $label . '</label><br>';
    }
}

function checkbox_field_callback() {
    $options = get_option( 'theme_options' );
    $checked_options = isset( $options['checkbox_field'] ) ? $options['checkbox_field'] : array();
    
    $choices = array(
        'option1' => 'Option 1',
        'option2' => 'Option 2',
        'option3' => 'Option 3'
    );
    
    foreach ($choices as $value => $label) {
        echo '<input type="checkbox" id="checkbox_' . $value . '" name="theme_options[checkbox_field][' . $value . ']" value="1" ' . checked( in_array( $value, $checked_options ), true, false ) . ' />';
        echo '<label for="checkbox_' . $value . '">' . $label . '</label><br>';
    }
}

function select_field_callback() {
    $options = get_option( 'theme_options' );
    $selected_option = isset( $options['select_field'] ) ? esc_attr( $options['select_field'] ) : '';
    
    $choices = array(
        'option1' => 'Option 1',
        'option2' => 'Option 2',
        'option3' => 'Option 3'
    );
    
    echo '<select id="select_field" name="theme_options[select_field]">';
    foreach ($choices as $value => $label) {
        echo '<option value="' . $value . '" ' . selected( $selected_option, $value, false ) . '>' . $label . '</option>';
    }
    echo '</select>';
}


// Callback function for the file upload field with preview
function file_upload_callback() {
    $options = get_option( 'theme_options' );
    $file_url = isset( $options['file_upload'] ) ? esc_url( $options['file_upload'] ) : '';
    echo '<input type="text" id="file_upload" name="theme_options[file_upload]" value="' . $file_url . '" />';
    echo '<input type="button" class="button button-secondary" value="Upload File" id="upload_button">';
    echo '<span class="description">Upload your file here.</span>';
    echo '<br>';
    echo '<img id="file_upload_preview" src="' . esc_url( $file_url ) . '" style="max-width: 200px; max-height: 200px;">';
}


// Sanitize and validate options
function theme_options_validate( $input ) {
    $valid = array();
    $valid['site_title'] = sanitize_text_field( $input['site_title'] );
    $valid['site_description'] = sanitize_text_field( $input['site_description'] );

    // Handle file upload
    $valid['file_upload'] = ( !empty( $input['file_upload'] ) ) ? esc_url_raw( $input['file_upload'] ) : '';
    
    return $valid;
}

// Enqueue scripts for media uploader
function theme_options_enqueue_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'custom-theme-options', get_template_directory_uri() . '/functions/admin/js/custom-theme-options.js', array( 'jquery' ), '1.0', true );
}
add_action( 'admin_enqueue_scripts', 'theme_options_enqueue_scripts' );

// Add settings fields for radio, checkbox, and select fields
function theme_options_init() {
    // Register a new setting for "theme_options" page
    register_setting( 'theme_options', 'theme_options', 'theme_options_validate' );

    // Add a section to the "theme_options" page
    add_settings_section( 'general_section', 'General Options', 'general_section_callback', 'theme_options' );

    // Add fields to the "general" section
    add_settings_field( 'site_title', 'Site Title', 'site_title_callback', 'theme_options', 'general_section' );
    add_settings_field( 'site_description', 'Site Description', 'site_description_callback', 'theme_options', 'general_section' );
    add_settings_field( 'file_upload', 'File Upload', 'file_upload_callback', 'theme_options', 'general_section' );

    add_settings_field( 'radio_field', 'Radio Field', 'radio_field_callback', 'theme_options', 'general_section' );
    add_settings_field( 'checkbox_field', 'Checkbox Field', 'checkbox_field_callback', 'theme_options', 'general_section' );
    add_settings_field( 'select_field', 'Select Field', 'select_field_callback', 'theme_options', 'general_section' );
}
add_action( 'admin_init', 'theme_options_init' );