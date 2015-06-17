<?php

/**
 * User Meta Boxes
 */

function cmb2_user_metaboxes( array $meta_boxes ) {

	$prefix = '_user_';

	$meta_boxes['user_edit'] = array(
			'id'         => 'user_edit',
			'title'      => __( 'User Profile Metabox', 'cmb' ),
			'object_types'      => array( 'user' ),
			'show_names' => true,
			'cmb_styles' => false,
			'fields'     => array(
				// array(
				// 	'name'    => __( 'Avatar', 'cmb' ),
				// 	'id'      => $prefix . 'avatar',
				// 	'type'    => 'file',
				// 	'save_id' => true,
				// ),
				// array(
				// 	'name' => __( 'Facebook URL', 'cmb' ),
				// 	'desc' => __( 'field description (optional)', 'cmb' ),
				// 	'id'   => $prefix . 'facebookurl',
				// 	'type' => 'text_url',
				// ),
				// array(
				// 	'name' => __( 'Twitter URL', 'cmb' ),
				// 	'desc' => __( 'field description (optional)', 'cmb' ),
				// 	'id'   => $prefix . 'twitterurl',
				// 	'type' => 'text_url',
				// ),
				// array(
				// 	'name' => __( 'Google+ URL', 'cmb' ),
				// 	'desc' => __( 'field description (optional)', 'cmb' ),
				// 	'id'   => $prefix . 'googleplusurl',
				// 	'type' => 'text_url',
				// ),
				// array(
				// 	'name' => __( 'Linkedin URL', 'cmb' ),
				// 	'desc' => __( 'field description (optional)', 'cmb' ),
				// 	'id'   => $prefix . 'linkedinurl',
				// 	'type' => 'text_url',
				// ),
				// array(
				// 	'name' => __( 'User Field', 'cmb' ),
				// 	'desc' => __( 'field description (optional)', 'cmb' ),
				// 	'id'   => $prefix . 'user_text_field',
				// 	'type' => 'text',
				// ),
			)
		);

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_user_metaboxes' );

 ?>