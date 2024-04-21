<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
 
	 $testimonial = new_cmb2_box( array(
		'id'         => 'testimonial_metabox',
		'title'      => 'Details',
        'object_types'  => array( 'testimonials', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		) );
 

	$testimonial->add_field( array(
			'name'    => __( 'Testimonial', 'cmb2' ),
			'desc'    => __( '', 'cmb2' ),
			'id'      => $prefix . 'testimonial',
			'type'    => 'wysiwyg',
			'options' => array( 'textarea_rows' => 10, ),
		) );
			
?>