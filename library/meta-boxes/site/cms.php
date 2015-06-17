<?php
$meta_boxes['meta_site_cms'] = array(
	'id'            => 'meta_site_cms',
	'title'         => 'CMS Information',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'   => $prefix . 'cms_phpmyadmin',
			'name' => 'PHPMyAdmin URL',
			'type' => 'text_url',
		),
		array(
			'id'   => $prefix . 'cms_database_host',
			'name' => 'Database Host',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_database_name',
			'name' => 'Database Name',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_database_username',
			'name' => 'Database Username',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_database_password',
			'name' => 'Database Password',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_admin_login_title',
			'name' => 'CMS Admin Login',
			'type' => 'title',
		),
		array(
			'id'   => $prefix . 'cms_admin_username',
			'name' => 'Admin Username',
			'type' => 'text',
			'default' => 'Optimize Worldwide',
		),
		array(
			'id'   => $prefix . 'cms_admin_password',
			'name' => 'Admin Password',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_admin_email_address',
			'name' => 'Admin Email Address',
			'type' => 'text_email',
		),
		array(
			'id'   => $prefix . 'cms_client_login_title',
			'name' => 'CMS Client Login',
			'type' => 'title',
		),
		array(
			'id'   => $prefix . 'cms_client_username',
			'name' => 'Client Username',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_client_password',
			'name' => 'Client Password',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'cms_client_email_address',
			'name' => 'Client Email Address',
			'type' => 'text_email',
		),
		array(
			'id'          => $prefix . 'cms_login_other',
			'type'        => 'group',
			'description' => 'Other logins for CMS',
			'options'     => array(
				'group_title'   => 'Additional Login',
				'add_button'    => 'Add Another Login',
				'remove_button' => 'Remove Login',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'id'   => 'username',
					'name' => 'Username',
					'type' => 'text',
				),
				array(
					'id'   => 'password',
					'name' => 'Password',
					'type' => 'text',
				),
				array(
					'id'   => 'email_address',
					'name' => 'Email Address',
					'type' => 'text_email',
				),
			),
		),
		array(
			'name' => 'Notes about CMS',
			'id'   => $prefix . 'cms_notes',
			'type' => 'textarea_small',
		),
	)
);
 ?>