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

$meta_boxes['meta_checklist_basic'] = array(
	'id'            => 'meta_checklist_basic',
	'title'         => 'Checklist',
	'object_types'  => array('checklist'),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'      => $prefix . 'site',
			'name'    => 'Associated Site',
			'desc'    => 'Site that checklist is for',
			'type'    => 'select',
			'options' => $sites,
		),
	),
);
 ?>