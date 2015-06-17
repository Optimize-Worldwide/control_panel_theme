<?php

$prefix_user_guide = $prefix . "user_guide_";

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

$meta_boxes['meta_reference_user_guide'] = array(
	'id'            => 'meta_reference_user_guide',
	'title'         => 'Checklist',
	'object_types'  => array('reference'),
	'show_on'       => array(
		'key' => 'taxonomy',
		'value' => array(
			'reference-type' => 'user-guide'
		)
	),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => array(
	// TODO: modularize userguide based on site features
	),
);
 ?>