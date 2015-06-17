<?php
$social_prefix = $prefix . "social_";
$meta_boxes['meta_site_social'] = array(
	'id'            => 'meta_site_social',
	'title'         => 'Social Networks',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'          => $social_prefix . 'facebook',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Facebook Page {#}',
				'add_button'    => 'Add Facebook Page',
				'remove_button' => 'Remove',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'id'   => 'url',
					'name' => 'URL',
					'type' => 'text_url',
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
		),
		array(
			'id'          => $social_prefix . 'gplus',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Google+ Page {#}',
				'add_button'    => 'Add Google+ Page',
				'remove_button' => 'Remove',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'id'   => 'url',
					'name' => 'URL',
					'type' => 'text_url',
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
		),
		array(
			'id'          => $social_prefix . 'twitter',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Twitter Page {#}',
				'add_button'    => 'Add Twitter Page',
				'remove_button' => 'Remove',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'id'   => 'url',
					'name' => 'URL',
					'type' => 'text_url',
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
		),
		array(
			'id'          => $social_prefix . 'linkedin',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'LinkedIn Page {#}',
				'add_button'    => 'Add LinkedIn Page',
				'remove_button' => 'Remove ',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'id'   => 'url',
					'name' => 'URL',
					'type' => 'text_url',
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