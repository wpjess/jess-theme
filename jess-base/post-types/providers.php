<?

add_action('init', 'providers_register');
 
function providers_register() {
 
	$labels = array(
		'name' => _x('Providers', 'post type general name'),
		'singular_name' => _x('Provider', 'post type singular name'),
		'add_new' => _x('Add New', 'Provider'),
		'add_new_item' => __('Add New Provider'),
		'edit_item' => __('Edit providers'),
		'new_item' => __('New Provider'),
		'view_item' => __('View providers'),
		'search_items' => __('Search providers'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
 //note to self.  Make sure taxonomy doesn't match existing category or everything goes to hell.  Flush rewrite rules when done.
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => false,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'provider', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title')
	  ); 
 
	register_post_type( 'providers' , $args );
}

// The category 
register_taxonomy("provider-clinic", array("providers"), array("hierarchical" => true, "label" => "Clinics", "singular_label" => "Clinic", "rewrite" => true, 'show_admin_column' => true));

register_taxonomy("provider-specialty", array("providers"), array("hierarchical" => true, "label" => "Specialty", "singular_label" => "Specialty", "rewrite" => true, 'show_admin_column' => true));



?>