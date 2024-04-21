<?php

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

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
							
						);
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "Home",
						"type" => "heading");


	$options[] = array( "name" => "Icon 1",
						"desc" => "",
						"id" => "icon1",
						"type" => "upload",
						"std" => "");

	$options[] = array( "name" => "Title",
						"desc" => "",
						"id" => "title1",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Section 1 Text",
						"desc" => "",
						"id" => "text1",
						"std" => '',
						"type" => "textarea");

	$options[] = array( "name" => "Button 1 Text",
						"desc" => "",
						"id" => "button1",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Button 1 URL",
						"desc" => "",
						"id" => "url1",
						"std" => "",
						"type" => "text");


	$options[] = array( "name" => "Icon 2",
						"desc" => "",
						"id" => "icon2",
						"type" => "upload",
						"std" => "");

	$options[] = array( "name" => "Title",
						"desc" => "",
						"id" => "title2",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Section 2 Text",
						"desc" => "",
						"id" => "text2",
						"std" => '',
						"type" => "textarea");

	$options[] = array( "name" => "Button 2 Text",
						"desc" => "",
						"id" => "button2",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Button 2 URL",
						"desc" => "",
						"id" => "url2",
						"std" => "",
						"type" => "text");



	$options[] = array( "name" => "Icon 3",
						"desc" => "",
						"id" => "icon3",
						"type" => "upload",
						"std" => "");

	$options[] = array( "name" => "Title",
						"desc" => "",
						"id" => "title3",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Section 3 Text",
						"desc" => "",
						"id" => "text3",
						"std" => '',
						"type" => "textarea");

	$options[] = array( "name" => "Button 3 Text",
						"desc" => "",
						"id" => "button3",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Button 3 URL",
						"desc" => "",
						"id" => "url3",
						"std" => "",
						"type" => "text");

/*
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

	$options[] = array( "name" => "Custom Icon Image Link",
						"desc" => "Will be used on footer",
						"id" => "custom_icon_image",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Custom Icon Link",
						"desc" => "Will be used on footer",
						"id" => "custom_icon_link",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Appearance",
						"type" => "heading");

	$options[] = array( "name" => "Logo",
						"desc" => "",
						"id" => "logo",
						"type" => "upload",
						"std" => get_bloginfo('template_directory') . "/images/logo.gif");


	$options[] = array( "name" => "Boxed or Wide Layout?",
						"desc" => "",
						"id" => "layout",
						"std" => "wide",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('boxed' => 'Boxed', 'wide' => 'Wide'));

	$options[] = array( "name" => "Background Pattern?",
						"desc" => "If yes, select the pattern from below:",
						"id" => "bg_pattern_option",
						"std" => "no",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('no' => 'No', 'yes' => 'Yes'));

	$options[] = array( "name" => "100% Background Image",
						"desc" => "If yes, the background image uploaded will always be 100% in width and height and scale according to the browser size.",
						"id" => "bg_full",
						"std" => "no",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('no' => 'No', 'yes' => 'Yes'));

	$options[] = array(
		'name' => "Select a Background Pattern",
		'desc' => "",
		'id' => "pattern",
		'std' => "pattern1",
		'type' => "images",
		'options' => array(
			'pattern1' => get_bloginfo('template_directory') . '/images/patterns/pattern1.png',
			'pattern2' => get_bloginfo('template_directory') . '/images/patterns/pattern2.png',
			'pattern3' => get_bloginfo('template_directory') . '/images/patterns/pattern3.png',
			'pattern4' => get_bloginfo('template_directory') . '/images/patterns/pattern4.png',
			'pattern5' => get_bloginfo('template_directory') . '/images/patterns/pattern5.png',
			'pattern6' => get_bloginfo('template_directory') . '/images/patterns/pattern6.png',
			'pattern7' => get_bloginfo('template_directory') . '/images/patterns/pattern7.png',
			'pattern8' => get_bloginfo('template_directory') . '/images/patterns/pattern8.png',
			'pattern9' => get_bloginfo('template_directory') . '/images/patterns/pattern9.png',
			'pattern10' => get_bloginfo('template_directory') . '/images/patterns/pattern10.png',
			)
	);

    $options[] = array( "name" => "Background Color",
					    "desc" => "",
					    "id" => "bg_color",
					    "std" => "#d7d6d6",
					    "type" => "color" );


	$options[] = array( "name" => "Background Image",
						"desc" => "",
						"id" => "background",
						"type" => "upload",
						"std" => "");

	$options[] = array( "name" => "Background Repeat",
						"desc" => "",
						"id" => "background_repeat",
						"std" => "repeat",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('no-repeat' => 'no-repeat', 'repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y'));

	$options[] = array( "name" => "Show page title bar?",
						"desc" => "",
						"id" => "page_title_bar",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'Yes', 'no' => 'No'));

	$options[] = array( "name" => "Page Title Bar Background",
						"desc" => "",
						"id" => "page_title_bg",
						"type" => "upload",
						"std" => get_bloginfo('template_directory') . "/images/page_title_bg.png");

	$options[] = array( "name" => "Blog",
						"desc" => "",
						"id" => "blog_style",
						"std" => "large",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('large' => 'Blog Large Image', 'medium' => 'Blog Medium Image'));

	$options[] = array( "name" => "Blog Sidebar Position",
						"desc" => "",
						"id" => "sidebar_position",
						"std" => "right",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('right' => 'Right', 'left' => 'Left'));

	$options[] = array( "name" => "Body Copy Font",
						"desc" => "Select a google font",
						"id" => "body_font",
						"std" => "PT Sans",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $google_fonts);

	$google_fonts['museo'] = 'Museo Slab (requires font files, refer to documentation)';

	$options[] = array( "name" => "Headings Font",
						"desc" => "Select a google font",
						"id" => "headings_font",
						"std" => "Antic Slab",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $google_fonts);

	$options[] = array( "name" => "Image Rollovers",
						"desc" => "Enable or disable rollovers boxes on images",
						"id" => "image_rollover",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'On', 'no' => 'Off'));

	$options[] = array( "name" => "Post Images Slideshow",
						"desc" => "Enable or disable post images slideshow",
						"id" => "post_slideshow",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'On', 'no' => 'Off'));

	$options[] = array( "name" => "Number of Post Images Slideshow",
						"desc" => "",
						"id" => "posts_slideshow_count",
						"std" => "5",
						"class" => "mini", //mini, tiny, small
						"type" => "text");

	$options[] = array( "name" => "Design",
						"type" => "heading");

	$options[] = array(
	    "name" => "Color Scheme",
	    "desc" => "If you change the color scheme, your color options below will automatically update.",
	    "id" => "color_scheme",
	    "std" => "vibrant",
	    "type" => "select",
	    "options" => array('green' => 'Green', 'darkgreen' => 'Dark Green', 'yellow' => 'Yellow', 'lightblue' => 'Light Blue', 'lightred' => 'Light Red', 'pink' => 'Pink', 'lightgrey' => 'Light Grey', 'brown' => 'Brown', 'red' => 'Red', 'blue' => 'Blue'));

    $options[] = array( "name" => "Primary Color",
					    "desc" => "",
					    "id" => "primary_color",
					    "std" => "#a0ce4e",
					    "type" => "color" );

    $options[] = array( "name" => "Pricing Box Color",
					    "desc" => "",
					    "id" => "pricing_box_color",
					    "std" => "#92C563",
					    "type" => "color" );

    $options[] = array( "name" => "Image Rollover Gradient Color (Top)",
					    "desc" => "",
					    "id" => "image_gradient_top_color",
					    "std" => "#D1E990",
					    "type" => "color" );

    $options[] = array( "name" => "Image Rollover Gradient Color (Bottom)",
					    "desc" => "",
					    "id" => "image_gradient_bottom_color",
					    "std" => "#AAD75B",
					    "type" => "color" );


    $options[] = array( "name" => "Button Gradient Color (Top)",
					    "desc" => "",
					    "id" => "button_gradient_top_color",
					    "std" => "#D1E990",
					    "type" => "color" );

    $options[] = array( "name" => "Button Gradient Color (Bottom)",
					    "desc" => "",
					    "id" => "button_gradient_bottom_color",
					    "std" => "#AAD75B",
					    "type" => "color" );

    $options[] = array( "name" => "Button Text Color (Bottom)",
					    "desc" => "",
					    "id" => "button_gradient_text_color",
					    "std" => "#54770f",
					    "type" => "color" );

	$options[] = array( "name" => "Custom CSS",
						"desc" => "",
						"id" => "custom_css",
						"std" => '',
						"type" => "textarea");

	$options[] = array( "name" => "Content",
						"type" => "heading");

	$options[] = array( "name" => "Add read more link after post excerpt?",
						"desc" => "",
						"id" => "read_more",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'Yes', 'no' => 'No'));

	$options[] = array( "name" => "Show post meta box?",
						"desc" => "",
						"id" => "post_meta",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'Yes', 'no' => 'No'));

	$options[] = array( "name" => "Show post author box?",
						"desc" => "",
						"id" => "post_author_box",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'Yes', 'no' => 'No'));

	$options[] = array( "name" => "Show share box?",
						"desc" => "",
						"id" => "share_box",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'Yes', 'no' => 'No'));

	$options[] = array( "name" => "Show related posts?",
						"desc" => "",
						"id" => "related_posts",
						"std" => "yes",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('yes' => 'Yes', 'no' => 'No'));

	$options[] = array( "name" => "Show comments?",
						"desc" => "",
						"id" => "comments",
						"std" => "enable",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array('enable' => 'Enable', 'disable' => 'Disable'));
*/
	return $options;
}