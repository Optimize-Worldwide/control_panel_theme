<?php
/*
Reference Post Type
 */

function reference_post_type() {
	register_post_type(
		'reference',
		array(
			'labels' => array(
				'name'               => 'Reference Library',
				'singular_name'      => 'Reference Document',
				'all_items'          => 'All Reference Documents',
				'add_new'            => 'Add New Document',
				'add_new_item'       => 'Add New Reference Document',
				'edit'               => 'Edit Reference Document',
				'edit_item'          => 'Edit Reference',
				'new_item'           => 'New Reference Document',
				'view_item'          => 'View Reference',
				'search_items'       => 'Search References',
				'not_found'          => 'No matching reference documents found.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon'  => ''
			),
			'description'         => 'Reference documents',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 8,
			'menu_icon'           => get_stylesheet_directory_uri() . '/library/images/post-type-reference.png',
			'rewrite'	            => array( 'slug' => 'reference', 'with_front' => false ),
			'has_archive'         => 'reference-documents',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
				'comments',
				'revisions',
				'sticky'
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'reference-type' );
}
add_action( 'init', 'reference_post_type');

register_taxonomy(
	'reference-type',
	array('reference'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name'              => 'Reference Types',
			'singular_name'     => 'Reference Type',
			'search_items'      => 'Search Reference Types',
			'all_items'         => 'All Reference Types',
			'parent_item'       => 'Parent Type',
			'parent_item_colon' => 'Parent Type:',
			'edit_item'         => 'Edit Reference Type',
			'update_item'       => 'Update Reference Type',
			'add_new_item'      => 'Add New Reference Type',
			'new_item_name'     => 'New Reference Type Name',
		),
		'show_admin_column' => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'reference-type' ),
	)
);

if (!term_exists('generic', 'reference-type')) {
	wp_insert_term(
		'Generic Reference',
		'reference-type',
		array(
			'description' => 'Generic Reference',
			'slug' => 'generic'
		)
	);
}

if (!term_exists('howto', 'reference-type')) {
	wp_insert_term(
		'How-To',
		'reference-type',
		array(
			'description' => 'Guide on how to complete a task',
			'slug' => 'howto'
		)
	);
}

if (!term_exists('user-guide', 'reference-type')) {
	wp_insert_term(
		'User Guide',
		'reference-type',
		array(
			'description' => 'Information for clients',
			'slug' => 'user-guide'
		)
	);
}

if (!term_exists('link', 'reference-type')) {
	wp_insert_term(
		'Link',
		'reference-type',
		array(
			'description' => 'Link to external reference',
			'slug' => 'link'
		)
	);
}

if (!term_exists('snippet', 'reference-type')) {
	wp_insert_term(
		'Snippet',
		'reference-type',
		array(
			'description' => 'Code snippet',
			'slug' => 'snippet'
		)
	);
}

if (!term_exists('style-guide', 'reference-type')) {
	wp_insert_term(
		'Style Guide',
		'reference-type',
		array(
			'description' => 'Guidelines on formatting',
			'slug' => 'style-guide'
		)
	);
}

if (!term_exists('theme', 'reference-type')) {
	wp_insert_term(
		'Theme',
		'reference-type',
		array(
			'description' => 'WordPress Theme',
			'slug' => 'theme'
		)
	);
}

if (!term_exists('slideshow', 'reference-type')) {
	wp_insert_term(
		'Slideshow',
		'reference-type',
		array(
			'description' => 'Slideshow or presentation',
			'slug' => 'slideshow'
		)
	);
}
?>
