<?php
/**
 * Reference Meta Boxes
 */

function cmb2_reference_metaboxes( array $meta_boxes ) {

	$prefix = '_reference_';

	require_once('reference/basic.php');
	require_once('reference/theme.php');
	require_once('reference/user-guide.php');
	require_once('reference/slideshow.php');
	require_once('reference/snippet.php');
  require_once('reference/link.php');

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_reference_metaboxes' );