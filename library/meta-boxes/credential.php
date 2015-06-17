<?php
/**
 * Credential Meta Boxes
 */

function cmb2_credential_metaboxes( array $meta_boxes ) {

	$prefix = '_credential_';

	require_once('credential/basic.php');

	return $meta_boxes;
}
add_filter( 'cmb2_meta_boxes', 'cmb2_credential_metaboxes' );