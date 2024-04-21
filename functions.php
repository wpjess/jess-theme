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

require_once get_template_directory() . '/functions/admin/theme-options.php';




?>