<?php
/*
Client Post Type
 */

function site_post_type() {
	register_post_type(
		'site',
		array(
			'labels' => array(
				'name'               => 'Sites',
				'singular_name'      => 'Site',
				'all_items'          => 'All Sites',
				'add_new'            => 'Add New',
				'add_new_item'       => 'Add New Site',
				'edit'               => 'Edit Site',
				'edit_item'          => 'Edit Site',
				'new_item'           => 'New Site',
				'view_item'          => 'View Site',
				'search_items'       => 'Search Sites',
				'not_found'          => 'No matching sites found.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon'  => ''
			),
			'description'         => 'Websites managed by Optimize Worldwide',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'query_var'           => true,
			'menu_position'       => 9,
			'menu_icon'           => get_stylesheet_directory_uri() . '/library/images/post-type-site.png',
			'rewrite'	            => array( 'slug' => 'site', 'with_front' => false ),
			'has_archive'         => 'sites',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields',
				'comments',
				'revisions',
				'sticky'
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'service' );
}
add_action( 'init', 'site_post_type');

register_taxonomy(
	'service',
	array('site'),
	array(
		'hierarchical' => true,
		'labels' => array(
			'name'              => 'Services Provided',
			'singular_name'     => 'Service Provided',
			'search_items'      => 'Search Services Provided',
			'all_items'         => 'All Services Provided',
			'parent_item'       => 'Parent Service',
			'parent_item_colon' => 'Parent Service:',
			'edit_item'         => 'Edit Service',
			'update_item'       => 'Update Service',
			'add_new_item'      => 'Add New Service',
			'new_item_name'     => 'New Service Name',
		),
		'show_admin_column' => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'service' ),
	)
);

if (!term_exists('advertising', 'service')) {
	wp_insert_term(
		'advertising',
		'service',
		array(
			'description' => '',
			'slug' => 'advertising'
		)
	);
}

if (!term_exists('development-sites', 'service')) {
	wp_insert_term(
		'development-sites',
		'service',
		array(
			'description' => '',
			'slug' => 'development-sites'
		)
	);
}

if (!term_exists('seo', 'service')) {
	wp_insert_term(
		'SEO',
		'service',
		array(
			'description' => '',
			'slug' => 'seo'
		)
	);
}

if (!term_exists('security-backup', 'service')) {
	wp_insert_term(
		'Security & Backup',
		'service',
		array(
			'description' => '',
			'slug' => 'security-backup'
		)
	);
}

if (!term_exists('social-media', 'service')) {
	wp_insert_term(
		'Social Media',
		'service',
		array(
			'description' => '',
			'slug' => 'social-media'
		)
	);
}
?>
