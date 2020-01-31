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
require_once(TEMPLATEPATH . '/functions/custom-functions.php');

 //echo of_get_option('favicon'); 

////////////////////////////////////////////////////////////////////////
//  	WEBSITE SCRIPTS
////////////////////////////////////////////////////////////////////////

function mmstudio_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// jQuery.
	wp_enqueue_script( 'all-init', '//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js', array( 'jquery' ), null, true );

	// Mobile Menu
	wp_enqueue_script( 'mobile-menu', $template_url . '/js/menu/jquery.dlmenu.js', array( 'jquery' ), null, true );

	// Responsive iFrames
	wp_enqueue_script( 'responsive-iframes', $template_url . '/js/jquery.fitvids.js', array( 'jquery' ), null, true );
	
	// All init scripts
	wp_enqueue_script( 'everything-init', $template_url . '/js/all.js', array( 'jquery' ), null, true );

	wp_enqueue_style( 'mobile-menu-style', $template_url . '/js/menu/jquery.sidr.light.css' );

	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'mmstudio_enqueue_scripts', 1 );


?>
