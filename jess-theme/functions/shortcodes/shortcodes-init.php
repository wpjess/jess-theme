<?php

//////////////////////////////////////////////////////////////////
// Blockquote shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('blockquote', 'shortcode_blockquote');
	function shortcode_blockquote($atts, $content = null) {
			return '<blockquote class="'.$atts['class'].'">' .do_shortcode($content). '<p class="author">'.$atts['author'].'</p></blockquote>';
	}
	
	

//////////////////////////////////////////////////////////////////
// Toggle shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('toggle', 'shortcode_toggle');
	function shortcode_toggle($atts, $content = null) {
			return '<div class="accordion clearfix" id="section1"><span></span>'.$atts['title'].'</div>
					<div class="container clearfix">
						<div class="content">
							' .do_shortcode($content). '
						</div>
					</div>';
	}
	
// add in js for Accordion from javascript extras


//////////////////////////////////////////////////////////////////
// Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button', 'shortcode_button');
	function shortcode_button($atts, $content = null) {
			return '<a class="button" href="' . $atts['link'] . '">' .do_shortcode($content). '</a>';
	}
	
	
//////////////////////////////////////////////////////////////////
// Box shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('box', 'shortcode_box');
function shortcode_box($atts, $content = null) {
	$html = '';
	$html .= '<div class="box '.$atts['class'].'">';
	$html .= '<h4>'.$atts['title'].'</h4>';
		$html .= '<p>'.do_shortcode($content).' <a href="' . $atts['link'] . '" class="box-link">&nbsp;</a></p>';
	$html .= '</div>';

	return $html;
}	
	
	
//////////////////////////////////////////////////////////////////
// Columns shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('columns', 'shortcode_columns');

require_once(TEMPLATEPATH . '/functions/shortcodes/grid-columns.php');	
	
	
	
	
//////////////////////////////////////////////////////////////////
// Instagram
//////////////////////////////////////////////////////////////////
add_shortcode('instagram', 'shortcode_instagram');
function shortcode_instagram($atts, $content = null) { ?>
	
	
	<?php global $post;
	
	$instagram = new WP_Query( array(
		'numberposts'     => -1,
		'post_type'       => 'post',
		'post_status'     => 'publish',
		'category_name' => $atts['category']
		) );
					          
   $output = '';
   $temp_title = '';
   $temp_link = '';
   
    $output ='<ul id="scroller">';
	if ( $instagram->have_posts() ) :
	while ( $instagram->have_posts() ) : $instagram->the_post();
   
      $temp_content = get_the_content($post->ID);
      $output .= "<li>$temp_content</li>";
          
   endwhile; else:
   
      $output .= "nothing found.";
      
   endif;
   
   $output .= '</ul>';
   return $output;
   
	?>
<?php	
					
}

	
	
	
//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
//////////////////////////////////////////////////////////////////
add_action('init', 'add_button');

function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons', 'register_button');  
   }  
}  

function register_button($buttons) {  
   array_push($buttons, "blockquote", "button", "box", "columns", "team");  
   return $buttons;  
}  

function add_plugin($plugin_array) {  
  // $plugin_array['youtube'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['blockquote'] = get_template_directory_uri().'/functions/shortcodes/tinymce/customcodes.js';
   $plugin_array['button'] = get_template_directory_uri().'/functions/shortcodes/tinymce/customcodes.js';
   $plugin_array['box'] = get_template_directory_uri().'/functions/shortcodes/tinymce/customcodes.js';
   $plugin_array['columns'] = get_template_directory_uri().'/functions/shortcodes/tinymce/customcodes.js';
   $plugin_array['team'] = get_template_directory_uri().'/functions/shortcodes/tinymce/customcodes.js';
   
   return $plugin_array;  
}  

