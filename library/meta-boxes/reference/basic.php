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
$meta_boxes['meta_reference_basic'] = array(
	'id'            => 'meta_reference_basic',
	'title'         => 'Basic Site Information',
	'object_types'  => array('reference'),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'      => $prefix . 'site',
			'name'    => 'Associated Site',
			'desc'    => 'Site that reference is related to',
			'type'    => 'select',
			'options' => $sites,
		),
	),
);

 ?>