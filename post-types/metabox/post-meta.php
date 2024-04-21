<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

	 $metabox = new_cmb2_box( array(
		'id'         => 'post_metabox',
		'title'      => 'Teaser Text',
        'object_types'  => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		) );
		
			
			$metabox->add_field( array(
			'name'       => __( 'Intro Text', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'intro',
			'type'       => 'textarea',
			// 'repeatable'      => true,
			) );
			
			
?>