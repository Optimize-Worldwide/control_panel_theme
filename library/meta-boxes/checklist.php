<?php
/**
 * Checklist Meta Boxes
 */

function cmb2_checklist_metaboxes( array $meta_boxes ) {

	$prefix = '_checklist_';

	require_once('checklist/basic.php');
  require_once('checklist/predevelopment.php');
  require_once('checklist/development.php');
  require_once('checklist/prerelease.php');
	require_once('checklist/release.php');
	require_once('checklist/sweep.php');
	require_once('checklist/security.php');

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_checklist_metaboxes' );