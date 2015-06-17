<?php

$site_users = get_users();

$users = array();
foreach ($site_users as $user) {
	$users[$user->ID] = $user->display_name;
}


$meta_boxes['meta_credential_basic'] = array(
	'id'            => 'meta_credential_basic',
	'title'         => 'Basic Credential Information',
	'object_types'  => array('credential'),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'   => $prefix . 'site',
			'name' => 'URL of Site',
			'type' => 'text_url',
		),
		array(
			'id'          => $prefix . 'accounts',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Account {#}',
				'add_button'    => 'Add Another Account',
				'remove_button' => 'Remove Account',
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
					'id'   => 'email',
					'name' => 'Email Account',
					'type' => 'text_email',
				),
			),
		),
		array(
			'id'   => $prefix . 'notes',
			'name' => 'Notes',
			'type' => 'textarea',
		),
		array(
			'id' => $prefix . 'allowed_users',
			'name' => 'Allowed Users',
			'description' => 'You, Matt, and the office manager will automatically be allowed to access this)',
			'type' => 'pw_multiselect',
			'options' => $users
		)
	),
);

 ?>