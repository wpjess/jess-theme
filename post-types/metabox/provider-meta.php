<?php
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

	 $metabox = new_cmb2_box( array(
		'id'         => 'provider_metabox',
		'title'      => 'Provider Details',
        'object_types'  => array( 'providers', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		) );
		
			
			$metabox->add_field( array(
			'name'       => __( 'Name', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'name',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'Degree', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'degree',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'Address', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'address',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'City', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'city',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'Zip', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'zip',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'Phone', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'phone',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'Fax', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'fax',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'PCP', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'pcp',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			
			$metabox->add_field( array(
			'name'       => __( 'Locations', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'locations',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );

			$metabox->add_field( array(
			'name'       => __( 'Credentialed Date', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'credentialing_date',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );



			$metabox->add_field( array(
			'name'       => __( 'Website', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'website',
			'type'       => 'text',
			// 'repeatable'      => true,
			) );
			
			

			$metabox->add_field( array(
			'name'       => __( 'Notes', 'cmb2' ),
			'desc'       => __( ' ', 'cmb2' ),
			'id'         => $prefix . 'notes',
			'type'       => 'textarea',
			// 'repeatable'      => true,
			) );
			
?>