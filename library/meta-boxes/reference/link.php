<?php
$prefix_link = $prefix . "link_";

$meta_boxes['meta_reference_link'] = array(
  'id'            => 'meta_reference_link',
  'title'         => 'Links',
  'object_types'  => array('reference'),
  'show_on'       => array(
    'key' => 'taxonomy',
    'value' => array(
      'reference-type' => 'link'
    )
  ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true,
  'fields'        => array(
    array(
      'id'          => $prefix_link . 'links',
      'type'        => 'group',
      'options'     => array(
        'group_title'   => 'Link {#}',
        'add_button'    => 'Add Another link',
        'remove_button' => 'Remove link',
        'sortable'      => true,
      ),
      'fields'      => array(
        array(
          'name' => 'Title',
          'id'   => 'title',
          'type' => 'text',
        ),
        array(
            'name' => 'Link',
            'id' => 'url',
            'type' => 'text_url',
        ),
      ),
    ),
  ),
);

 ?>