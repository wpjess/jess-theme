<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

	$slides = new_cmb2_box( array(
		'id'         => 'slides_metabox',
		'title'      => 'Slides',
        'object_types'  => array( 'slides', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		) );
 
	
	$slides->add_field( array(
			'name'       => __( 'Link URL', 'cmb2' ),
			'desc'       => __( 'optional', 'cmb2' ),
			'id'         => $prefix . 'slide_link',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );
 
	$slides->add_field( array(
				'name' => __( 'Slide Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'slide_image',
				'type' => 'file',
			) );
?>