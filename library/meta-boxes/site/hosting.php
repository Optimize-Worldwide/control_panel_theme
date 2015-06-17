<?php
$meta_boxes['meta_site_hosting'] = array(
	'id'            => 'meta_site_hosting',
	'title'         => 'Hosting Information',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => array(
		array(
			'name'       => 'Name of Hosting Provider',
			'id'         => $prefix . 'hosting_provider',
			'type'       => 'text',
		),
		array(
			'name'       => 'Hosting Provider Login URL',
			'id'         => $prefix . 'hosting_provider_url',
			'type'       => 'text_url',
		),
		array(
			'name'       => 'Hosting Provider Username',
			'id'         => $prefix . 'hosting_provider_username',
			'type'       => 'text',
		),
		array(
			'name'       => 'Hosting Provider Password',
			'id'         => $prefix . 'hosting_provider_password',
			'type'       => 'text',
		),
		array(
			'name' => 'Notes about Hosting',
			'id'   => $prefix . 'hosting_notes',
			'type' => 'textarea_small',
		),
	),
);
 ?>