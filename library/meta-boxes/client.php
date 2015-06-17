<?php
/**
 * Client Info Meta Boxes
 */

function cmb2_client_metaboxes( array $meta_boxes ) {

	$prefix = '_client_';

	require_once('client/basic.php');

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_client_metaboxes' );