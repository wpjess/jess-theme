<?
/////////////////////////////////////////////////
/// CUSTOM FIELDS
/////////////////////////////////////////////////

if ( file_exists(  __DIR__ . '/post-types/metabox/init.php' ) ) {
  require_once  __DIR__ . '/post-types/metabox/init.php';
} 
 
 
add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );

function cmb2_sample_metaboxes() {
$prefix = '';

   require_once(TEMPLATEPATH . '/post-types/metabox/page-meta.php');
   require_once(TEMPLATEPATH . '/post-types/metabox/slides-meta.php');

}


/////////////////////////////////////////////////
/// CUSTOM FIELDS USAGE EXAMPLES
/////////////////////////////////////////////////

<?php $bg = get_post_meta($post->ID, 'background_image', true); ?>

<!-- example image size replacement -->
<? $product_small = str_replace('.png', '-675x79.png' , $product_image);  ?>

<!-- if the editor is stripping paragraph tags -->
<?php echo apply_filters( 'the_content', $events ); ?>


<?
///////////////////////////////////////////////////////////////
/// CUSTOM POST TYPES  
///////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/post-types/slides.php');
require_once(TEMPLATEPATH . '/post-types/testimonials.php');

add_action("admin_init", "admin_init");
function admin_init(){ }

add_action('save_post', 'save_details');
    function save_details(){
      global $post;
      
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
        } else { }
}


///////////////////////////////////////////////////////////////
/// THEME OPTIONS PANEL 
///////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/functions/custom-functions.php');

// in theme files 
echo of_get_option('linkedin_link'); 


///////////////////////////////////////////////////////////////
/// REGISTER NAV MENUS 
///////////////////////////////////////////////////////////////

register_nav_menus(array(
        'primary'   => __( 'Primary Menu', 'catchbox' ),
        'secondary' => __( 'Secondary Menu', 'catchbox' ),
        'footer'    => __( 'Footer Menu', 'catchbox' )
    ) );


///////////////////////////////////////////////////////////////
/// CUSTOM EXCERPT READ MORE
///////////////////////////////////////////////////////////////

function new_excerpt_more($post) {return '<span class="more-excerpt"><a class="more-link-excerpt" href="'. get_permalink($post->ID) . '">' . ' &raquo;' . '</a></span>';}
add_filter('excerpt_more', 'new_excerpt_more');


    
///////////////////////////////////////////////////////////////
/// CUSTOM THUMBNAIL SIZES
///////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );
add_image_size( 'feature-post', 302, 153, true );



///////////////////////////////////////////////////
/// GET FEATURED IMAGE 
///////////////////////////////////////////////////
?>

<?php $banner = get_post_meta($post->ID, 'banner', true); ?>
<img src="<?php echo stripslashes($banner); ?>" alt="<?php the_title(); ?>" title="" /> 
        

<?php


    
    
///////////////////////////////////////////////////////////////
/// CUSTOM WIDGETS 
///////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/functions/widgets/social_links.php');
require_once(TEMPLATEPATH . '/functions/widgets/tabs.php');
     



///////////////////////////////////////////////////////////////
/// ALLOW SHORTCODES IN WIDGETS
///////////////////////////////////////////////////////////////

add_filter('widget_text', 'do_shortcode');




///////////////////////////////////////////////////////////////
/// CHECK TOP PARENT PAGE ID 
///////////////////////////////////////////////////////////////

function get_top_parent_page_id() {
    global $post;
    if ($post->ancestors) {
        return end($post->ancestors);
    } else {
        return $post->ID;
    }
}



/////////////////////////////////////////////////////////////////
/// CHECK TAXONOMY LEVELS PARENTS/CHILDREN 
/////////////////////////////////////////////////////////////////

function is_or_descendant_tax( $terms,$taxonomy){
    if (is_tax($taxonomy, $terms)){
            return true;
    }
    foreach ( (array) $terms as $term ) {
        $descendants = get_term_children( (int) $term, $taxonomy);
        if ( $descendants && is_tax($taxonomy, $descendants) )
            return true;
    }
    return false;
}


//////////////////////////////////////////////////////////////
///  ADD ITEMS TO WYSIWYG EDITOR DROP DOWN
//////////////////////////////////////////////////////////////

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {  
 
    $style_formats = array(  
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
        array(  
            'title' => 'Content Block',  
            'block' => 'span',  
            'classes' => 'content-block',
            'wrapper' => true,
             
        ),  
        array(  
            'title' => 'Blue Button',  
            'block' => 'span',  
            'classes' => 'blue-button',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Red Button',  
            'block' => 'span',  
            'classes' => 'red-button',
            'wrapper' => true,
        ),
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 


////////////////////////////////////////////////////////////////////////
//  ADD EDITOR STYLE SHEET TO SHOW STYLES ABOVE
////////////////////////////////////////////////////////////////////////

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


 create a new CSS file and name it custom-editor-style.css





///////////////////////////////////////////////////////////////
/// LIMIT CONTENT EXCERPT BY WORDS  
///////////////////////////////////////////////////////////////

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

// EXAMPLE USAGE
echo excerpt(25); 


///////////////////////////////////////////////////////////////
/// ANOTHER LIMIT CONTENT EXCERPT BY WORDS
///////////////////////////////////////////////////////////////

function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

// EXAMPLE USAGE
echo limit_words(get_the_excerpt(), '22'); 


///////////////////////////////////////////////////////////////
/// Hide Dashboard Widgets 
///////////////////////////////////////////////////////////////

function example_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' );
} 
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );




///////////////////////////////////////////////////////////////////////////
/// ADD NEW DASHBOARD WIDGETS  
///////////////////////////////////////////////////////////////////////////

function example_dashboard_widget_function() {
	echo "<p>Pages can be managed through the 'Pages' button on the left.<br />";
} 

function example_dashboard_widget_function2() {
	echo "<p>Images and slideshows can be added to your pages and posts through the upload/insert link found just below the title of the page when editing it.<br /><br />
	<p>To add a slideshow of images:</p>
	<ol>
	<li>Go in to edit the page or post.</li>
	<li>Click on the 'upload/insert' link found just below the title field</li>
	</ol>
	";
} 

function example_dashboard_widget_function3() {
	echo "<p>The events can be managed through the 'Events' button on the left.  By hovering over that button you can either view published events, add a new event, or create a new event category.";
} 


function example_add_dashboard_widgets() {
	wp_add_dashboard_widget('example_dashboard_widget', 'Pages', 'example_dashboard_widget_function');	
	wp_add_dashboard_widget('example_dashboard_widget2', 'Images & Slideshows', 'example_dashboard_widget_function2');	
	wp_add_dashboard_widget('example_dashboard_widget3', 'Events', 'example_dashboard_widget_function3');	
} 


add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' ); 




//////////////////////////////////////////////////////////////////////
/// REMOVE WORDPRESS VERSION 
//////////////////////////////////////////////////////////////////////

function micromedia_remove_version() {
return '';
}
add_filter('the_generator', 'micromedia_remove_version');


///////////////////////////////////////////////////////////////////////
/// HARDCORE BREADCRUMBS.  LIST PARENT AND CHILDREN
///////////////////////////////////////////////////////////////////////

function wpb_list_child_pages() { 
global $post; 
if ( is_page() && $post->post_parent )
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {
	$string = '<ul id="breadcrumbs">' . $childpages . '</ul>';
}

return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

// EXAMPLE USAGE
echo do_shortcode("[wpb_childpages]"); 
		


///////////////////////////////////////////////////////////////
//////////////////////  SHORTCODES  / /////////////////////////
///////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/functions/shortcodes/shortcodes-init.php');		
		
		
		
		
//////////////////////////////////////////////////////////////////
// Columns shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('columns', 'shortcode_columns');

require_once(TEMPLATEPATH . '/functions/shortcodes/grid-columns.php');	

[column grid="4" span="1"]Some content[/column]
[column grid="4" span="1"]Some content[/column]

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/functions/shortcodes/columns.css">



////////////////////////////////////////////////////////////////////////
//	Remove empty <p> from shortcode
////////////////////////////////////////////////////////////////////////

function shortcode_empty_paragraph_fix( $content ) {

    // define your shortcodes to filter, '' filters all shortcodes
    $shortcodes = array( 'column', 'another' );
    
    foreach ( $shortcodes as $shortcode ) {
        
        $array = array (
            '<p>[' . $shortcode => '[' .$shortcode,
            '<p>[/' . $shortcode => '[/' .$shortcode,
            $shortcode . ']</p>' => $shortcode . ']',
            $shortcode . ']<br />' => $shortcode . ']'
        );

        $content = strtr( $content, $array );
    }

    return $content;
}

add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );


///////////////////////////////////////////////////////////////////
//  SHOW HIDE CUSTOM FIELDS IN ADMIN
///////////////////////////////////////////////////////////////////

add_action('admin_enqueue_scripts', 'my_admin_script');
function my_admin_script()
{
    wp_enqueue_script('my-admin', get_bloginfo('template_url').'/functions/my-admin.js', array('jquery'));
}


//////////////////////////////////////////////////////////////////
//  FIRST LAST CLASS ON MENU LI ITEMS
//////////////////////////////////////////////////////////////////
function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');




///////////////////////////////////////////////////////////////////
//  RESIZE IMAGES ON THE FLY
///////////////////////////////////////////////////////////////////

require_once(TEMPLATEPATH . '/functions/resize.php');

In Theme Files:
This works for getting featured image url

		<?php 
		$thumb = get_post_thumbnail_id(); 
		$image = vt_resize( $thumb, '', 150, 150, true );
		?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>"  class="info-img" alt="<?php the_title(); ?>" title="" /></a>
<?php 


If you know the image URL but need to fetch the ID, use this function:


function pippin_get_image_id($image_url) {
    global $wpdb;
    $prefix = $wpdb->prefix;
    $attachment = $wpdb->get_col("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='" . $image_url . "';");
    return $attachment[0];  
}


Then:

$image_id = pippin_get_image_id($img_url);
$thumb = vt_resize( $image_id, '', 170, 160, true );

*********  SOME SERVERS WONT LET THIS WORK.  USE THIS SOLUTION INSTEAD TO
GET THE ID.  IMAGE RESIZING SHOULD STILL WORK IF YOU CAN FIND THE ID  ************************

////////////////////////////////////////////////////////////////////////
//	GET IMAGE ID	
////////////////////////////////////////////////////////////////////////

function fjarrett_get_attachment_id_by_url( $url ) {
	$parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
		return;
	}
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
	return $attachment[0];
}


And then:
$image_id = fjarrett_get_attachment_id_by_url( $image );


////////////////////////////////////////////////////////////////////////
//  Select Box Dropdowns For MetaBoxes
////////////////////////////////////////////////////////////////////////


//////////  List single post type posts in drop down  /////////////////
// Fetch all products in an array
global $post;
$myposts = get_posts(array(
    'post_type' => 'products',
    'numberposts' => '700',
    'orderby' => 'title',
    'order' => 'ASC'
  ));
$count = 0;

$products = array();
$products[] =  array('value' => '',
    'name' => 'None',
    'label' => 'None');
foreach( $myposts as $post ) :	setup_postdata($post);  $count++;
	//$products[] = $post->post_name;
	$products[] =  array('value' => $post->post_name,
    'name' => $post->post_title,
    'label' => $post->post_name);
endforeach;
// End fetch all products 


////////////  LIST BLOG CATEGORIES IN DROP DOWN  /////////////////////

$recycle = array();
$categories=  get_categories('child_of=32'); 
  foreach ($categories as $category) {
//foreach( $myposts as $post ) :	setup_postdata($post);  $count++;
	$recycle[] = $category->cat_name;
	}

	
////////////  LIST TAXONOMY TERMS IN DROP DOWN  ////////////////////////

$prods = array();
$categories=  get_terms('product-category', 'hide_empty=0'); 
  foreach ($categories as $category) {
//foreach( $myposts as $post ) :	setup_postdata($post);  $count++;
	//$prods[] = $category->slug;
	$prods[] =  array('value' => $category->slug,
    'name' => $category->name,
    'label' => $category->name);
	}




// EXAMPLE USAGE  //


			array(
				'name'    => 'Test Select',
				'desc'    => 'field description (optional)',
				'id'      => $prefix . 'product_test_select',
				'type'    => 'select',
				'options' => $hposts,
			),
			
	

////////////////////////////////////////////////////////////////////
// Add styles to TinyMCE
////////////////////////////////////////////////////////////////////
function my_mce_buttons_2($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');


function my_mce_before_init($init_array)
	{
		// Now we add classes with title and separate them with;
		$init_array['theme_advanced_styles'] = "Blue Text=blue;Orange Text=orange";
	return $init_array;
}

add_filter('tiny_mce_before_init', 'my_mce_before_init');

add_editor_style('editor-style.css');



/////////////////////////////////////////////////////////////////
///  PAGE SLUG AS MENU ITEM ID
/////////////////////////////////////////////////////////////////

function cleanname($v) {
$v = preg_replace('/[^a-zA-Z0-9s]/', '', $v);
$v = str_replace(' ', '-', $v);
$v = strtolower($v);
return $v;
}

function nav_id_filter( $id, $item ) {
return 'nav-'.cleanname($item->title);
}
add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );


////////////////////////////////////////////////////////////////////
// Load scripts in footer
////////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'mmstudio_load_javascript_files' );
 
function mmstudio_load_javascript_files() {
 
  wp_register_script( 'main-jquery', get_template_directory_uri() . '/js/jquery-1.7.1.min.js', array('jquery'), '1.7.1', true );
  wp_register_script( 'ui-core-jquery', get_template_directory_uri() . '/js/jquery.ui.core.min.js', array('jquery'), '1.0', true );
  wp_register_script( 'ui-widget-jquery', get_template_directory_uri().'/js/jquery.ui.widget.min.js', array('jquery'), '1.7', true );
 
  wp_enqueue_script( 'main-jquery' );
  wp_enqueue_script( 'ui-core-jquery' );
  wp_enqueue_script( 'ui-widget-jquery' );

}




 
////////////////////////////////////////////////////////////////////
///	LOGIN LOGO
////////////////////////////////////////////////////////////////////
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            padding-bottom: 30px;
			background-repeat: no-repeat;
			background-position: top center;
			width:260px; 
			height:81px;
			margin: 0 auto;
        }
		.login h1 a { background:transparent; }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
 
////////////////////////////////////////////////////////////////////////
// REPEATABLE CUSTOM FIELDS - HOW TO PULL THEIR DATA
////////////////////////////////////////////////////////////////////////

<ul id="page-slides">
<?php  $slides = get_post_meta($post->ID, 'slides', true);  ?>

<?php foreach ( $slides as $slide ) { ?>
<?php
	$image_id = pippin_get_image_id($slide['slide_image']);
	$caption = get_post_field('post_excerpt', $image_id);
?>
	<li>
		<?php if($slide['slide_image'] == '') { ?>
			<div id="slide-video"><?php echo stripslashes($slide['slide_video']); ?></div>
		<?php } else { ?>
			<img src="<?php echo $slide['slide_image']; ?>" alt="" />
		<?php } ?>
		<?php if($slide['slide_description'] == '') { } else { ?>
			<p><?php echo stripslashes($slide['slide_description']); ?></p>
		<?php } ?>
		<?php if($caption == '') { } else { ?>
			<p class="slideshow-caption"><?php echo $caption; ?></p>
		<?php } ?>
	</li>
<?php } ?>
</ul>