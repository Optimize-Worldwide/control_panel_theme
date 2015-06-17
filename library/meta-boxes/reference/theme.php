<?php
$prefix_theme = $prefix . "theme_";

$site_posts = array();
$args       = array('post_type' => 'site','posts_per_page'=>-1);
$site_posts = get_posts($args);

$sites       = array();
$site_ids    = array('');
$site_titles = array('none');

foreach ($site_posts as $site_post): setup_postdata( $site_post );
	$site_ids[]    = $site_post->ID;
	$site_titles[] = $site_post->post_title;
endforeach;

$sites = array_combine($site_ids, $site_titles);

$meta_boxes['meta_reference_theme'] = array(
	'id'            => 'meta_reference_theme',
	'title'         => 'Theme Information',
	'object_types'  => array('reference'),
	'show_on'       => array(
		'key' => 'taxonomy',
		'value' => array(
			'reference-type' => 'theme'
		)
	),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'   => $prefix_theme . 'url',
			'name' => 'Theme URL',
			'desc' => 'URL of theme',
			'type' => 'text_url',
			'protocols' => array('http', 'https'),
		),
		array(
			'id'   => $prefix_theme . 'zip',
			'name' => 'Theme ZIP',
			'desc' => 'ZIP File containing theme',
			'type' => 'file',
			'allow' => array('attachment')
		),
		array(
			'name'    => 'Sites Using Theme',
			'id'      => $prefix_theme . 'sites',
			'type'    => 'multicheck',
			'options' => $sites,
		),
	),
);

 ?>