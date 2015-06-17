<?php
/*

You should not have to touch this file. It is just a constructor for meta-boxes based
on the fields & descriptions defined in the checklist file included below

*/

include(TEMPLATEPATH . "/library/checklists/development.php");

$checklist_prefix = $prefix.$checklist_name.'_';

$fields = make_checklist_fields($checklistItems, 'development');

$meta_boxes['meta_checklist_development'] = array(
  'id'            => 'meta_checklist_development',
  'title'         => 'Development Checklist',
  'object_types'  => array('checklist'),
  'show_on'       => array(
   'key' => 'taxonomy',
   'value' => array(
     'checklist-type' => 'development'
   )
  ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true,
  'fields'        => $fields,
);
?>