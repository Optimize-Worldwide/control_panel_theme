<?php

$checklist_name = 'development';//Will be used for metabox slug



$checklistItems = array(
	'development_folder' => array(
		'title' => 'Create Development Folder',
		'description' => 'Create new folder in development/ and shortcut in defaultroot',
	),
	'local_datbase' => array(
		'title' => 'Create Local Database',
		'description' => 'Setup database on <a href="/phpmyadmin" target="_blank">local PHPMyAdmin</a> with structure "client_domain_tld"',
	),
	'install_wordpress' => array(
		'title' => 'Install WordPress',
		'description' => 'Table prefix: optimize_, use (link phpmyadmin credential)',
	),
	'site_info' => array(
		'title' => 'Basic Site Info',
		'description' => 'Set TimeZone, week start on Sunday, title and tagline, permalink structure to %postname%',
	),
	'install_theme' => array(
		'title' => 'Install Theme',
		'description' => 'If using, install and configure theme',
	),
	'initialize_backup' => array(
		'title' => 'Initialize Backup',
		'description' => 'Set up BackWPUp for daily backups',
	),
	'authenticate_mainwp' => array(
		'title' => 'Authenticate MainWP Plugin',
		'description' => 'Configure MainWP client and attach to Control Panel',
	),
	'external_links' => array(
		'title' => 'Configure External Links plugin',
		'description' => 'Open in new window, disable icons',
	),
	'client_user' => array(
		'title' => 'Create Client User',
		'description' => 'Full organization name as username',
	),
	'disable_comments' => array(
		'title' => 'Disable Comments',
		'description' => 'Under discussion option, disable commenting',
	),
	'inventory' => array(
		'title' => 'Take Inventory',
		'description' => 'If developing for existing site, take inventory of existing urls (TODO: include reference to this)',
	),
	'footer_link' => array(
		'title' => 'Add Footer Link',
		'description' => 'Add <a href="/reference/footer-link/" target="_blank">attribution link</a> to footer',
		'references' => array('footer-link')
	),
	'contact_forms' => array(
		'title' => 'Build Contact Forms',
		'description' => 'Using snippets in site file, configure contact forms',
		'references' => array('contact-forms')
	),
	'build_pages' => array(
		'title' => 'Build Pages',
		'description' => '"Home" + "/sitemap" + pages decided in predevelopment',
	),
	'client_checkin' => array(
		'title' => 'Check In with Client',
		'description' => 'Check in with client',
	),
);


 ?>