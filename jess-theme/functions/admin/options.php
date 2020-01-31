<?php

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
}



function optionsframework_options() {
	global $wpdb;
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	$google_fonts = array(
							"Abel" => "Abel",
							"Abril Fatface" => "Abril Fatface",
							"Zeyada" => "Zeyada",
						);
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "Basic",
						"type" => "heading");

	$options[] = array( "name" => "Responsiveness",
						"desc" => "",
						"id" => "responsiveness",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'On', 'no' => 'Off'));

	$options[] = array( "name" => "Favicon",
						"desc" => "",
						"id" => "favicon",
						"type" => "upload",
						"std" => "");

	$options[] = array( "name" => "Portfolio Items Per Page",
						"desc" => "",
						"id" => "portfolio_items",
						"std" => "10",
						"type" => "text");

	$options[] = array( "name" => "Copyright",
						"desc" => "",
						"id" => "copyright",
						"std" => '',
						"type" => "textarea");

	

	$options[] = array( "name" => "Social",
						"type" => "heading");

	$options[] = array( "name" => "Facebook Link",
						"desc" => "",
						"id" => "facebook_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Twitter Link",
						"desc" => "",
						"id" => "twitter_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "LinkedIn Link",
						"desc" => "",
						"id" => "linkedin_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Dribbble Link",
						"desc" => "",
						"id" => "dribbble_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "RSS Link",
						"desc" => "",
						"id" => "rss_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Youtube Link",
						"desc" => "",
						"id" => "yt_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Pinterest Link",
						"desc" => "",
						"id" => "pint_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Custom Icon Name",
						"desc" => "Will be used on footer",
						"id" => "custom_icon_name",
						"std" => "",
						"type" => "text");



	return $options;
}