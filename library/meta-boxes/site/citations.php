<?php
// _meta_site_citation_facebook_url | _meta_site_citation_facebook_password | etc

$citation_sites = array(//Needs DRYing. See \site-cards\citations.php
	'Facebook',
	'Google Local',
	'Twitter',
	'SuperPages',
	'Hotfrog',
	'Best of Web',
	'Yellow Pages',
	'Foursquare',
	'Yahoo Local',
	'Bing Places',
	'Express Update',
	'Yelp',
	'Elocal',
	'Trello',
	'MerchantCircle',
	'CityGrid',
	'InsiderPages',
	'YellowBot',
	'YellowUSA MagicYellow',
	'Neustar Localeze',
	'Ziplocal',
	'CitySquares',
	'LocalPages',
	'MojoPages',
	'Tupalo',
	'Brownbook',
	'iBegin',
	'Other',
);
foreach ($citation_sites as $citation_site) {
	$site_prefix = $prefix.str_replace(" ","_",strtolower($citation_site)).'_';
	$fields[] = array(
		'name'=>$citation_site,
		'id'=>$site_prefix.'title',
		'type'=>'title'
	);
	$fields[] = array(
		'id'   => $site_prefix.'url',
		'name' => 'Citation URL',
		'type' => 'text_url',
		'repeatable' => true,
	);
	$fields[] = array(
		'id'   => $site_prefix.'claim_url',
		'name' => 'Claim URL',
		'type' => 'text_url',
		'repeatable' => true,
	);
	$fields[] = array(
		'id'   => $site_prefix.'username',
		'name' => 'Username',
		'type' => 'text',
	);
	$fields[] = array(
		'id'   => $site_prefix.'password',
		'name' => 'Password',
		'type' => 'text',
	);
	$fields[] = array(
		'id'   => $site_prefix.'yext_managed',
		'name' => 'Yext-Managed',
		'type' => 'checkbox',
	);
	$fields[] = array(
		'id'   => $site_prefix.'validation_method',
		'name' => 'Validation Method',
		'type' => 'text',
	);
	$fields[] = array(
		'id'   => $site_prefix.'status',
		'name' => 'Status',
		'type' => 'text',
	);
	$fields[] = array(
		'id'   => $site_prefix.'attention_needed',
		'name' => 'Needs Attention',
		'type' => 'checkbox',
	);
	$fields[] = array(
		'id'   => $site_prefix.'notes',
		'name' => 'Notes',
		'type' => 'wysiwyg',
	);
}
$meta_boxes['meta_site_citations'] = array(
	'id'            => 'meta_site_citations',
	'title'         => 'Citations',
	'object_types'  => array('site'),
	'context'       => 'normal',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => $fields,
);
 ?>