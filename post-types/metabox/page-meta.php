<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

	 $metabox = new_cmb2_box( array(
		'id'         => 'page_metabox',
		'title'      => 'Page Extras',
        'object_types'  => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		) );
		
			
			$metabox->add_field( array(
			'name'       => __( 'Caption', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'caption',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );
			
			$metabox->add_field( array(
				'name' => __( 'Header Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'page_image',
				'type' => 'file',
			) );
			
			$metabox->add_field( array(
				'name' => __( 'Header Background', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'page_bg',
				'type' => 'file',
			) );
			
			
			
?>