<?php

$site_posts = array();
$args       = array('post_type' => 'site','numberposts'=>-1);
$site_posts = get_posts($args);

$sites       = array();
$site_ids    = array('');
$site_titles = array('none');

foreach ($site_posts as $site_post) {
	setup_postdata( $site_post );

	$site_ids[]    = $site_post->ID;
	$site_titles[] = $site_post->post_title;
}

$sites = array_combine($site_ids, $site_titles);

$meta_boxes['meta_client_basic'] = array(
	'id' => 'meta_client_basic',
	'title' => 'Basic Client Information',
	'object_types' => array('client'),
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => true,
	'fields' => array(
		array(
			'id'   => $prefix . 'referral_source',
			'name' => 'Referral Source',
			'type' => 'textarea',
		),
		array(
			'id'   => $prefix . 'address_street',
			'name' => 'Street Address',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'address_city',
			'name' => 'Client City',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'address_state',
			'name' => 'Client State',
			'type' => 'select',
			'options' => array(
				'AL' => 'Alabama',
				'AK' => 'Alaska',
				'AZ' => 'Arizona',
				'AR' => 'Arkansas',
				'CA' => 'California',
				'CO' => 'Colorado',
				'CT' => 'Connecticut',
				'DE' => 'Delaware',
				'DC' => 'District of Columbia',
				'FL' => 'Florida',
				'GA' => 'Georgia',
				'HI' => 'Hawaii',
				'ID' => 'Idaho',
				'IL' => 'Illinois',
				'IN' => 'Indiana',
				'IA' => 'Iowa',
				'KS' => 'Kansas',
				'KY' => 'Kentucky',
				'LA' => 'Louisiana',
				'ME' => 'Maine',
				'MD' => 'Maryland',
				'MA' => 'Massachusetts',
				'MI' => 'Michigan',
				'MN' => 'Minnesota',
				'MS' => 'Mississippi',
				'MO' => 'Missouri',
				'MT' => 'Montana',
				'NE' => 'Nebraska',
				'NV' => 'Nevada',
				'NH' => 'New Hampshire',
				'NJ' => 'New Jersey',
				'NM' => 'New Mexico',
				'NY' => 'New York',
				'NC' => 'North Carolina',
				'ND' => 'North Dakota',
				'OH' => 'Ohio',
				'OK' => 'Oklahoma',
				'OR' => 'Oregon',
				'PA' => 'Pennsylvania',
				'RI' => 'Rhode Island',
				'SC' => 'South Carolina',
				'SD' => 'South Dakota',
				'TN' => 'Tennessee',
				'TX' => 'Texas',
				'UT' => 'Utah',
				'VT' => 'Vermont',
				'VA' => 'Virginia',
				'WA' => 'Washington',
				'WV' => 'West Virginia',
				'WI' => 'Wisconsin',
				'WY' => 'Wyoming',
			)
		),
		array(
			'id'   => $prefix . 'address_zip',
			'name' => 'Client ZIP',
			'type' => 'text',
		),
		array(
			'id'          => $prefix . 'phone_numbers',
			'type'        => 'group',
			'description' => 'Phone Numbers to contact this client',
			'options'     => array(
				'group_title'   => 'Phone Number {#}',
				'add_button'    => 'Add Another Phone Number',
				'remove_button' => 'Remove Phone Number',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'name' => 'Number',
					'id'   => 'number',
					'type' => 'text',
				),
				array(
					'name' => 'Notes',
					'description' => 'Notes about this phone number',
					'id'   => 'notes',
					'type' => 'textarea_small',
				),
			),
		),
		array(
			'id'          => $prefix . 'email_addresses',
			'type'        => 'group',
			'description' => 'Email Addresses used to contact this client',
			'options'     => array(
				'group_title'   => 'Email Address {#}',
				'add_button'    => 'Add Another Email Address',
				'remove_button' => 'Remove Email Address',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'name' => 'Address',
					'id'   => 'address',
					'type' => 'text_email',
				),
				array(
					'name' => 'Notes',
					'description' => 'Notes about this email address',
					'id'   => 'notes',
					'type' => 'textarea_small',
				),
			),
		),
		array(
			'id' => $prefix . 'people',
			'type' => 'group',
			'description' => 'People associated with this client',
			'options'     => array(
				'group_title'   => 'Person',
				'add_button'    => 'Add Another Person',
				'remove_button' => 'Remove Person',
				'sortable'      => false,//Because site chooses contact person based on ID
			),
			'fields' => array(
				array(
					'name' => 'Name',
					'id'   => 'name',
					'type' => 'text',
				),
				array(
					'name' => 'Phone Number',
					'id'   => 'phone_number',
					'type' => 'text',
				),
				array(
					'name' => 'Email Address',
					'id'   => 'email_address',
					'type' => 'text_email',
				),
				array(
					'name' => 'Notes',
					'description' => 'Notes about this person',
					'id'   => 'notes',
					'type' => 'textarea_small',
				),
			),
		),
	)
);
 ?>