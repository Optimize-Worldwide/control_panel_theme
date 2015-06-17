<?php
/*

You should not have to touch this file. It is just a constructor for meta-boxes based
on the fields & descriptions defined in the checklist file included below

*/

include(TEMPLATEPATH . "/library/checklists/predevelopment.php");

$checklist_prefix = $prefix.$checklist_name.'_';

$fields = make_checklist_fields($checklistItems, 'predevelopment');

$meta_boxes['meta_checklist_predevelopment'] = array(
	'id'            => 'meta_checklist_predevelopment',
	'title'         => 'preDevelopment Checklist',
	'object_types'  => array('checklist'),
	'show_on'       => array(
	 'key' => 'taxonomy',
	 'value' => array(
	   'checklist-type' => 'predevelopment'
	 )
	),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => $fields,
);
?>