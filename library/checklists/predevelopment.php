<?php
$checklist_name = 'predevelopment';

$checklistItems = array(
	'create_site_page' => array(
		'title' => 'Create Site Page',
		'description' => 'Create page on Control Panel',
		'fields' => array(
			'_site_organization_name',
			'_site_url',
			'_site_naics',
		),
	),
	'choose_theme' => array(
		'title' => 'Choose 5 Themes',
		'description' => 'If using theme, decide',
	),
	'hello_email' => array(
		'title' => 'Send Hello Email to Client',
		'description' => 'Introduce self, define project scope',
		'references' => array('hello-email')
	),
	'decide_pages' => array(
		'title' => 'Decide pages',
		'description' => 'Outline pages that are to be created, and order copy',
		'references' => array('decide_pages'),//slug of a reference document
	),
	'choose_colors' => array(
		'title' => 'Choose Colors',
		'description' => 'Choose official hex codes for site',
	),
);
 ?>