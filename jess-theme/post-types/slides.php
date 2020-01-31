<?

add_action('init', 'slides_register');
 
function slides_register() {
 
	$labels = array(
		'name' => _x('Slides', 'post type general name'),
		'singular_name' => _x('Slide', 'post type singular name'),
		'add_new' => _x('Add New', 'Slide'),
		'add_new_item' => __('Add New Slide'),
		'edit_item' => __('Edit slides'),
		'new_item' => __('New Slide'),
		'view_item' => __('View slides'),
		'search_items' => __('Search slides'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
 //note to self.  Make sure taxonomy doesn't match existing category or everything goes to hell.  Flush rewrite rules when done.
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'fly-fishing-slides', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		
		
		'supports' => array('title')
	  ); 
 
	register_post_type( 'slides' , $args );
}

// The category 
register_taxonomy("Slide-category", array("slides"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true, 'show_admin_column' => true));


?>