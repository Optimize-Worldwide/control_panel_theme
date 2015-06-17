<?php
/*
Custom User Roles
 */

// IT Role
function it_role() {
	//remove_role('it');//Fix for when permissions are not updated
	add_role(
		'it',
		'IT',
		array(
			'activate_plugins' => true,
			'delete_others_pages' => true,
			'delete_others_posts' => true,
			'delete_pages' => true,
			'delete_plugins' => true,
			'delete_posts' => true,
			'delete_private_pages' => true,
			'delete_private_posts' => true,
			'delete_published_pages' => true,
			'delete_published_posts' => true,
			'edit_dashboard' => true,
			'edit_files' => true,
			'edit_others_pages' => true,
			'edit_others_posts' => true,
			'edit_pages' => true,
			'edit_posts' => true,
			'edit_private_pages' => true,
			'edit_private_posts' => true,
			'edit_published_pages' => true,
			'edit_published_posts' => true,
			'edit_theme_options' => true,
			'export' => true,
			'import' => true,
			'list_users' => true,
			'manage_categories' => true,
			'manage_links' => true,
			'manage_options' => true,
			'moderate_comments' => true,
			'promote_users' => true,
			'publish_pages' => true,
			'publish_posts' => true,
			'read_private_pages' => true,
			'read_private_posts' => true,
			'read' => true,
			'remove_users' => true,
			'switch_themes' => true,
			'upload_files' => true,
		)
	);
}
add_action( 'init', 'it_role' );



// Office Manager Role
function office_manager_role() {
	//remove_role('it');//Fix for when permissions are not updated
	add_role(
		'office_manager',
		'Office Manager',
		array(
			'activate_plugins' => true,
			'delete_others_pages' => true,
			'delete_others_posts' => true,
			'delete_pages' => true,
			'delete_plugins' => true,
			'delete_posts' => true,
			'delete_private_pages' => true,
			'delete_private_posts' => true,
			'delete_published_pages' => true,
			'delete_published_posts' => true,
			'edit_dashboard' => true,
			'edit_files' => true,
			'edit_others_pages' => true,
			'edit_others_posts' => true,
			'edit_pages' => true,
			'edit_posts' => true,
			'edit_private_pages' => true,
			'edit_private_posts' => true,
			'edit_published_pages' => true,
			'edit_published_posts' => true,
			'edit_theme_options' => true,
			'export' => true,
			'import' => true,
			'list_users' => true,
			'manage_categories' => true,
			'manage_links' => true,
			'manage_options' => true,
			'moderate_comments' => true,
			'promote_users' => true,
			'publish_pages' => true,
			'publish_posts' => true,
			'read_private_pages' => true,
			'read_private_posts' => true,
			'read' => true,
			'remove_users' => true,
			'switch_themes' => true,
			'upload_files' => true,
		)
	);
}
add_action( 'init', 'office_manager_role' );


// HR Role
function hr_role() {
	//remove_role('hr');//Fix for when permissions are not updated
	add_role(
		'hr',
		'HR',
		array(
			'activate_plugins' => true,
			'delete_others_pages' => true,
			'delete_others_posts' => true,
			'delete_pages' => true,
			'delete_plugins' => true,
			'delete_posts' => true,
			'delete_private_pages' => true,
			'delete_private_posts' => true,
			'delete_published_pages' => true,
			'delete_published_posts' => true,
			'edit_dashboard' => true,
			'edit_files' => true,
			'edit_others_pages' => true,
			'edit_others_posts' => true,
			'edit_pages' => true,
			'edit_posts' => true,
			'edit_private_pages' => true,
			'edit_private_posts' => true,
			'edit_published_pages' => true,
			'edit_published_posts' => true,
			'edit_theme_options' => true,
			'export' => true,
			'import' => true,
			'list_users' => true,
			'manage_categories' => true,
			'manage_links' => true,
			'manage_options' => true,
			'moderate_comments' => true,
			'promote_users' => true,
			'publish_pages' => true,
			'publish_posts' => true,
			'read_private_pages' => true,
			'read_private_posts' => true,
			'read' => true,
			'remove_users' => true,
			'switch_themes' => true,
			'upload_files' => true,
		)
	);
}
add_action( 'init', 'hr_role' );


// Member Role
function member_role() {
	//remove_role('member');//Fix for when permissions are not updated
	add_role(
		'member',
		'Member',
		array(
			'activate_plugins' => true,
			'delete_others_pages' => true,
			'delete_others_posts' => true,
			'delete_pages' => true,
			'delete_plugins' => true,
			'delete_posts' => true,
			'delete_private_pages' => false,
			'delete_private_posts' => false,
			'delete_published_pages' => true,
			'delete_published_posts' => true,
			'edit_dashboard' => true,
			'edit_files' => true,
			'edit_others_pages' => true,
			'edit_others_posts' => true,
			'edit_pages' => true,
			'edit_posts' => true,
			'edit_private_pages' => false,
			'edit_private_posts' => false,
			'edit_published_pages' => true,
			'edit_published_posts' => true,
			'edit_theme_options' => true,
			'export' => true,
			'import' => true,
			'list_users' => true,
			'manage_categories' => true,
			'manage_links' => true,
			'manage_options' => true,
			'moderate_comments' => true,
			'promote_users' => false,
			'publish_pages' => true,
			'publish_posts' => true,
			'read_private_pages' => false,
			'read_private_posts' => false,
			'read' => true,
			'remove_users' => true,
			'switch_themes' => true,
			'upload_files' => true,
		)
	);
}
add_action( 'init', 'member_role' );




function remove_roles() {
	remove_role('subscriber');
	remove_role('editor');
	remove_role('author');
	remove_role('contributor');
}
add_action( 'init', 'remove_roles' );