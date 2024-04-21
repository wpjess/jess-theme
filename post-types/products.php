<?php

add_action('init', 'products_register');
 
function products_register() {
 
	$labels = array(
		'name' => _x('Products', 'post type general name'),
		'singular_name' => _x('Product', 'post type singular name'),
		'add_new' => _x('Add New', 'Product'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Products'),
		'new_item' => __('New Product'),
		'view_item' => __('View Products'),
		'search_items' => __('Search Products'),
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
		'rewrite' => array( 'slug' => 'products', 'with_front' => true ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','thumbnail','editor')
	  ); 
 
	register_post_type( 'products' , $args );
}

// The category 
register_taxonomy("product-category", array("products"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true, 'show_admin_column' => true));



?>