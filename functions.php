<?php
///////////////////////////////////////////////////////////
////////////////  REGISTER SIDEBARS  //////////////////////
///////////////////////////////////////////////////////////


	 // First Widget Area
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Widget Area 1', // Rename This
		  'id' => 'blog-widgetized-sidebar',
          'before_widget' => '<div id="%1$s" class="sidebar-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 
	 

///////////////////////////////////////////////////////////////
////////////////////  REGISTER MENU   /////////////////////////
///////////////////////////////////////////////////////////////

register_nav_menus( array(
	'main_menu' => 'Main Menu',
) );

function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');




///////////////////////////////////////////////////////////////
////////////////////  REMOVE UL NAV MENU //////////////////////
///////////////////////////////////////////////////////////////
function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );


///////////////////////////////////////////////////////////////
///////  POST THUMBNAILS
///////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );
//add_image_size( 'feature-post', 302, 153, true );

// Include the theme options files
//require_once(TEMPLATEPATH . '/functions/custom-functions.php');

 //echo of_get_option('favicon'); 

// Include tabs widget
//require_once(TEMPLATEPATH . '/functions/widgets/tabs.php');
// Include social links widget
//require_once(TEMPLATEPATH . '/functions/widgets/social_links.php');

////////////////////////////////////////////////////////////////////////
//  	WEBSITE SCRIPTS
////////////////////////////////////////////////////////////////////////

function mmstudio_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// jQuery.
	wp_enqueue_script( 'all-init', '//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js', array( 'jquery' ), null, true );

	// Mobile Menu
	wp_enqueue_script( 'mobile-menu', $template_url . '/js/menu/jquery.dlmenu.js', array( 'jquery' ), null, true );

	
	
	// All init scripts
	wp_enqueue_script( 'script-init', $template_url . '/js/all.js', array( 'jquery' ), null, true );

	wp_enqueue_style( 'mobile-menu-style', $template_url . '/js/menu/jquery.sidr.light.css' );

	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'mmstudio_enqueue_scripts', 1 );


///////////////////////////////////////////////////////////////////////////
///////////////  FETCH THE CUSTOM META BOXES /////////////////
///////////////////////////////////////////////////////////////////////////


 // THE INIT FILES NEEDED TO START THE FIELDS
 
if ( file_exists(  __DIR__ . '/post-types/metabox/init.php' ) ) {
  require_once  __DIR__ . '/post-types/metabox/init.php';
} 
 
 
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );

function cmb2_sample_metaboxes() {
$prefix = '';

   require_once(TEMPLATEPATH . '/post-types/metabox/page-meta.php');
   require_once(TEMPLATEPATH . '/post-types/metabox/provider-meta.php');

}


///////////////////////////////////////////////////////////////
//////////////////////  SHORTCODES  / /////////////////////////
///////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/functions/shortcodes/shortcodes-init.php');	




///////////////////////////////////////////////////////////////
////////////////////  ADD POST TYPES  /////////////////////////
///////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/post-types/providers.php');


// Adding to the page.  Do this only once for all
add_action("admin_init", "admin_init");
 
// Add a new meta box line for each one
function admin_init(){
}

// Save the details only once.  Add update for each box
add_action('save_post', 'save_details');
function save_details(){
  global $post;
  
// added the next couple of lines because of the erasing autosave thing
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
return $post_id;
} else {
}
}

///// SEARCH BY TAXONOMY
function custom_search_filter($query) {
    if (is_search() && $query->is_main_query()) {
        // Check for selected taxonomy terms
        //$name = isset($_GET['name']) ? sanitize_text_field($_GET['name']) : '';
        $clinic = isset($_GET['clinic']) ? sanitize_text_field($_GET['clinic']) : '';
        $specialty = isset($_GET['specialty']) ? sanitize_text_field($_GET['specialty']) : '';

        // Modify the query to include tax_query for the selected terms
        if (!empty($clinic)) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'provider-clinic',
                    'field' => 'slug',
                    'terms' => $clinic,
                ),
            ));
        } elseif (!empty($specialty)) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'provider-specialty',
                    'field' => 'slug',
                    'terms' => $specialty,
                ),
            ));
        } 
    }
}

add_action('pre_get_posts', 'custom_search_filter');

/*
function custom_search_redirect() {
    if (is_search() && isset($_GET['name']) && !empty($_GET['name']) && !is_admin()) {
        // Redirect to the search results page
        wp_redirect(home_url('/search/') . '?s=' . urlencode($_GET['name']) . '&post_type=providers');
        exit();
    }
}

add_action('template_redirect', 'custom_search_redirect');
*/

// Redirect ALL search results to specific page
function custom_search_query($query) {
    if (!is_admin() && $query->is_main_query() && is_search()) {
        // Get the selected custom field value from the form
        $customFieldValue = sanitize_text_field($_GET['custom-field']); // Replace 'custom-field' with your actual field name

        if (!empty($customFieldValue)) {
            if ($customFieldValue !== 'all') {
                $query->set('meta_query', array(
                    array(
                        'key' => 'name', // Replace 'name' with your actual custom field name
                        'value' => $customFieldValue,
                        'compare' => '='
                    )
                ));
            } else {
                // Redirect to a specific page when 'All' is selected
                wp_redirect(home_url('/primecare-provider-database/all-physicians/ ')); 
                exit;
            }
        }
    }
}

add_action('pre_get_posts', 'custom_search_query');


// Order search results from A-Z
add_action( 'pre_get_posts', 'custom_order_search_results' );

function custom_order_search_results( $query ) {
    if ( $query->is_search() && $query->is_main_query() ) {
        $query->set( 'order', 'ASC' );
        $query->set( 'orderby', 'title' );
    }
}


////////////////////////////////////////////////////////////////////////
//  Remove Gutenberg Block Library CSS from loading on the frontend
////////////////////////////////////////////////////////////////////////
function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
 wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );



////////////////////////////////////////////////////////////////////////
//  Theme options
////////////////////////////////////////////////////////////////////////
// Add a menu item to the WordPress admin menu
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
    wp_enqueue_script( 'custom-theme-options', get_template_directory_uri() . '/js/custom-theme-options.js', array( 'jquery' ), '1.0', true );
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

?>