<?php

add_action('init', 'testimonials_register');
 
function testimonials_register() {
 
	$labels = array(
		'name' => _x('Testimonials', 'post type general name'),
		'singular_name' => _x('Testimonial', 'post type singular name'),
		'add_new' => _x('Add New', 'Testimonial'),
		'add_new_item' => __('Add New Testimonial'),
		'edit_item' => __('Edit Testimonials'),
		'new_item' => __('New Testimonial'),
		'view_item' => __('View Testimonial'),
		'search_items' => __('Search Testimonials'),
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
		'rewrite' => array( 'slug' => 'testimonials', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		
		
		'supports' => array('title')
	  ); 
 
	register_post_type( 'testimonials' , $args );
}

// The category 
//register_taxonomy("testimonial-category", array("testimonials"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true, 'show_admin_column' => true));


?>