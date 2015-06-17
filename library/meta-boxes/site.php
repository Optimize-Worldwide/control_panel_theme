<?php
/**
 * Site Info Meta Boxes
 */


function cmb2_site_metaboxes( array $meta_boxes ) {

	$prefix = '_site_';

	require_once('site/basic.php');
	require_once('site/social.php');
	require_once('site/styles.php');
	require_once('site/hosting.php');
  require_once('site/domain.php');
	require_once('site/ftp.php');
	require_once('site/cms.php');
	// require_once('site/citations.php');
	require_once('site/services.php');

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_site_metaboxes' );