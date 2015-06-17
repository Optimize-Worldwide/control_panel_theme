<?php
$meta_boxes['meta_site_services'] = array(
	'id'            => 'meta_site_services',
	'title'         => 'Services',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'          => $prefix . 'services',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Service {#}',
				'add_button'    => 'Add Another Service',
				'remove_button' => 'Remove Service',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'id'   => 'url',
					'name' => 'URL',
					'type' => 'text_url',
				),
				array(
					'id'   => 'description',
					'name' => 'Description',
					'type' => 'text',
				),
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
					'id'   => 'email',
					'name' => 'Email',
					'type' => 'text_email',
				),
				array(
					'id'   => 'notes',
					'name' => 'Notes',
					'type' => 'textarea_small',
				),
			)
		)
	)
);
 ?>