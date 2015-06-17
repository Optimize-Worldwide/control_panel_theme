<?php
/*
Credential Post Type

TODO: Add ability to restrict access to credential by user or role
 */

function credential_post_type() {
	register_post_type(
		'credential',
		array(
			'labels' => array(
				'name'               => 'Credentials',
				'singular_name'      => 'Credential',
				'all_items'          => 'All Credentials',
				'add_new'            => 'Add New',
				'add_new_item'       => 'Add New Credential',
				'edit'               => 'Edit Credential',
				'edit_item'          => 'Edit Credential',
				'new_item'           => 'New Credential',
				'view_item'          => 'View Credential',
				'search_items'       => 'Search Credentials',
				'not_found'          => 'No matching credentials found.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon'  => ''
			),
			'description'         => 'Credentials used by Optimize Worldwide',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 8,
			'menu_icon'           => get_stylesheet_directory_uri() . '/library/images/post-type-credential.png',
			'rewrite'	            => array( 'slug' => 'credential', 'with_front' => false ),
			'has_archive'         => 'credentials',
			'capability_type'     => 'post',

			'hierarchical'        => false,
			'supports' => array(
				'title',
				// 'editor',
				'author',
				'custom-fields',
				'comments',
				'revisions',
				'sticky'
			)
		)
	);
}
add_action( 'init', 'credential_post_type');
?>
