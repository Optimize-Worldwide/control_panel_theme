<?php

// Reference Chart: https://cdn.tutsplus.com/wp/uploads/legacy/228_Customizing_Your_WordPress_Admin/chart.gif
// Codex: http://codex.wordpress.org/Administration_Menus


function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;

	return array(
		'index.php', // Dashboard
		'admin.php?page=mainwp_tab', // MainWP
		'admin.php?page=wp_stream',
		'separator1', // First separator
		'edit.php?post_type=client',
		'edit.php?post_type=site',
		'edit.php?post_type=checklist',
		'edit.php?post_type=credential',
		'edit.php?post_type=reference',
		'separator2',
		'upload.php', // Media
		'edit.php', // Posts
		'edit.php?post_type=page', // Pages
		'edit-comments.php', // Comments
		'options-general.php', // Settings
		'tools.php', // Tools
		'users.php', // Users
		'themes.php', // Appearance
		'plugins.php', // Plugins
		'link-manager.php', // Links
		'separator-last', // Last separator
	);
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

