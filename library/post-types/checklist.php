<?php
/*
Checklist Post Type
 */

function checklist_post_type() {
	register_post_type(
		'Checklist',
		array(
			'labels' => array(
				'name'               => 'Checklists',
				'singular_name'      => 'Checklist',
				'all_items'          => 'All Checklists',
				'add_new'            => 'Add New Checklist',
				'add_new_item'       => 'Add New Checklist',
				'edit'               => 'Edit Checklist',
				'edit_item'          => 'Edit Checklist',
				'new_item'           => 'New Checklist',
				'view_item'          => 'View Checklist',
				'search_items'       => 'Search Checklists',
				'not_found'          => 'No matching checklist found.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon'  => ''
			),
			'description'         => 'Checklists',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 8,
			'menu_icon'           => get_stylesheet_directory_uri() . '/library/images/post-type-checklist.png',
			'rewrite'	            => array( 'slug' => 'checklist', 'with_front' => false ),
			'has_archive'         => 'checklists',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports' => array(
				'title',
				'custom-fields',
				'comments',
				'revisions',
				'sticky'
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'checklist-type' );
}
add_action( 'init', 'checklist_post_type');

register_taxonomy(
	'checklist-type',
	array('checklist'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name'              => 'Checklist Types',
			'singular_name'     => 'Checklist Type',
			'search_items'      => 'Search Checklist Types',
			'all_items'         => 'All Checklist Types',
			'parent_item'       => 'Parent Type',
			'parent_item_colon' => 'Parent Type:',
			'edit_item'         => 'Edit Checklist Type',
			'update_item'       => 'Update Checklist Type',
			'add_new_item'      => 'Add New Checklist Type',
			'new_item_name'     => 'New Checklist Type Name',
		),
		'show_admin_column' => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'checklist-type' ),
	)
);


if (!term_exists('predevelopment', 'checklist-type')) {
	wp_insert_term(
		'preDevelopment',
		'checklist-type',
		array(
			'description' => 'Checklist for use before development phase of site',
			'slug' => 'predevelopment'
		)
	);
}


if (!term_exists('development', 'checklist-type')) {
	wp_insert_term(
		'Development',
		'checklist-type',
		array(
			'description' => 'Checklist for use during development phase of site',
			'slug' => 'development'
		)
	);
}

if (!term_exists('release', 'checklist-type')) {
	wp_insert_term(
		'Release',
		'checklist-type',
		array(
			'description' => 'Pre-release checklist',
			'slug' => 'release'
		)
	);
}

if (!term_exists('security', 'checklist-type')) {
	wp_insert_term(
		'Security',
		'checklist-type',
		array(
			'description' => 'Monthly security & backup checklist',
			'slug' => 'security'
		)
	);
}

if (!term_exists('sweep', 'checklist-type')) {
	wp_insert_term(
		'Sweep',
		'checklist-type',
		array(
			'description' => 'SEO Sweep checklist',
			'slug' => 'sweep'
		)
	);
}
?>
