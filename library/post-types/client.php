<?php
/*
Client Post Type
 */

function client_post_type() {
	register_post_type(
		'client',
		array(
			'labels' => array(
				'name'               => 'Clients',
				'singular_name'      => 'Client',
				'all_items'          => 'All Clients',
				'add_new'            => 'Add New',
				'add_new_item'       => 'Add New Client',
				'edit'               => 'Edit Client',
				'edit_item'          => 'Edit Client',
				'new_item'           => 'New Client',
				'view_item'          => 'View Client',
				'search_items'       => 'Search Clients',
				'not_found'          => 'No matching clients found.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon'  => ''
			),
			'description'         => 'Optimize Worldwide clients',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 8,
			'menu_icon'           => get_stylesheet_directory_uri() . '/library/images/post-type-client.png',
			'rewrite'	            => array( 'slug' => 'client', 'with_front' => false ),
			'has_archive'         => 'clients',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports' => array(
				'title',
				'editor',
				'author',
				'custom-fields',
				'comments',
				'revisions',
				'sticky'
			)
		)
	);
}
add_action( 'init', 'client_post_type');
?>
