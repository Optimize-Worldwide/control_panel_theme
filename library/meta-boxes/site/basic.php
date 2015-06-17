<?php
$client_posts = array();
$args         = array('post_type' => 'client','numberposts'=>-1);
$client_posts = get_posts($args);

$clients       = array();
$client_ids    = array('');
$client_titles = array('none');

foreach ($client_posts as $client_post) {
	setup_postdata( $client_post );

	$client_ids[]    = $client_post->ID;
	$client_titles[] = $client_post->post_title;
}

$clients = array_combine($client_ids, $client_titles);

$client_person_ids = array('');
$client_person_names = array('none');

if(isset($_GET['post'])){
	$single_client = get_post_meta($_GET['post'],'_site_client',true);
	$client_people = get_post_meta($single_client,'_client_people',true);
	if($client_people){
		foreach ($client_people as $id => $person) {
			$client_person_ids[]   = "'".$id."'";//Quoted because of bug where if value is (number)0, cannot retrieve
			$client_person_names[] = $person['name'];
		}
	}

}
$client_people = array_combine($client_person_ids,$client_person_names);


$meta_boxes['meta_site_basic'] = array(
	'id'            => 'meta_site_basic',
	'title'         => 'Basic Site Information',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'core',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'   => $prefix.'billing_cycle',
			'name' => 'Campaign Cycle',
			'type' => 'select',
			'options' => array (
				'0' => 'none',
				'1' => '1st of Month',
				'15' => '15th of Month'
			),
		),
		array(
			'id'   => $prefix . 'organization_name',
			'name' => 'Organization Name',
			'type' => 'text',
		),
		array(
			'id'   => $prefix . 'url',
			'name' => 'Website URL',
			'desc' => 'url of website (include http(s) & (non-)www',
			'type' => 'text_url',
			'protocols' => array('http', 'https'),
		),
		array(
			'id'      => $prefix . 'client',
			'name'    => 'Associated Client',
			'type'    => 'select',
			'options' => $clients,
		),
		array(
			'id'   => $prefix . 'primary_contact',
			'name' => 'Primary Contact',
			'type' => 'select',
			'options' => $client_people,
		),
		array(
			'id'   => $prefix . 'project_manager',
			'name' => 'Project Manager',
			'type' => 'select',
			'options' => $client_people,
		),
		array(
			'id'   => $prefix . 'billing_contact',
			'name' => 'Billing Contact',
			'type' => 'select',
			'options' => $client_people,
		),
		array(
			'id'   => $prefix . 'naics',
			'name' => 'Naics Code',
			'desc' => '<a href="http://cp.optimizehere.co/reference/naics-codes/" target="_blank">See here for all codes</a>',
			'type' => 'text_small',
		),
		array(
			'id'          => $prefix . 'addresses',
			'type'        => 'group',
			'description' => 'Addresses used by this site',
			'options'     => array(
				'group_title'   => 'Address {#}',
				'add_button'    => 'Add Another Address',
				'remove_button' => 'Remove Address',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'name' => 'Street Address',
					'id'   => 'address',
					'type' => 'textarea_small',
				),
				array(
					'name' => 'Notes',
					'description' => 'Notes about this location',
					'id'   => 'notes',
					'type' => 'textarea_small',
				),
			),
		),
		array(
			'id'          => $prefix . 'phone_numbers',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Phone Number {#}',
				'add_button'    => 'Add Phone Number',
				'remove_button' => 'Remove',
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
			'options'     => array(
				'group_title'   => 'Email Address {#}',
				'add_button'    => 'Add Address',
				'remove_button' => 'Remove',
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
	),
);
 ?>
