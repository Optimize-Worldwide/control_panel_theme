<?php
$meta_boxes['meta_site_ftp'] = array(
	'id'            => 'meta_site_ftp',
	'title'         => 'FTP Information',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'   => $prefix . 'ftp_ip_address',
			'name' => 'IP Address',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'ftp_absolute_path',
			'name' => 'Absolute Path',
			'type' => 'text',
		),
		array(
			'name' => 'Notes',
			'id'   => $prefix . 'ftp_notes',
			'type' => 'textarea_small',
		),
		array(
			'id'          => $prefix . 'ftp_logins',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Login {#}',
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
			),
		),
	),
);
 ?>