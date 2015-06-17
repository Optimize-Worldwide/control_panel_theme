<?php
/*

You should not have to touch this file. It is just a constructor for meta-boxes based
on the fields & descriptions defined in the checklist file included below

*/

include(TEMPLATEPATH . "/library/checklists/sweep.php");

$checklist_prefix = $prefix.$checklist_name.'_';

$fields = make_checklist_fields($checklistItems, $checklist_name);

$meta_boxes['meta_checklist_sweep'] = array(
	'id'            => 'meta_checklist_sweep',
	'title'         => 'SEO Sweep Checklist',
	'object_types'  => array('checklist'),
	'show_on'       => array(
		'key' => 'taxonomy',
		'value' => array(
			'checklist-type' => 'sweep'
		)
	),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => $fields,
);
?>