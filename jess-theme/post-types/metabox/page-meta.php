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
			'name'       => __( 'Headline', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'page_headline',
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
				'name' => __( 'Sidebar Image 1', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'sidebar_image',
				'type' => 'file',
			) );
			
			$metabox->add_field( array(
				'name' => __( 'Sidebar Image 2', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'sidebar_image2',
				'type' => 'file',
			) );
			
			$metabox->add_field( array(
			'name'       => __( 'Sponsor Logos Title', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'sponsor_title',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );
			
		$metabox->add_field( array(
		'name'         => __( 'Sponsors', 'cmb2' ),
		'desc'         => __( '', 'cmb2' ),
		'id'           => $prefix . 'page_sponsors',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
			
?>