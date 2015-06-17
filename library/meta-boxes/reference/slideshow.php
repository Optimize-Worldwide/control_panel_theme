<?php
$prefix_slideshow = $prefix . "slideshow_";

$meta_boxes['meta_reference_slideshow'] = array(
  'id'            => 'meta_reference_slideshow',
  'title'         => 'Basic Site Information',
  'object_types'  => array('reference'),
  'context'       => 'normal',
  'show_on'       => array(
    'key' => 'taxonomy',
    'value' => array(
      'reference-type' => 'slideshow'
    )
  ),
  'priority'      => 'high',
  'show_names'    => true,
  'fields'        => array(
    array(
        'name' => 'List of Slides',
        'desc' => '',
        'id' => $prefix_slideshow . 'slide_urls',
        'type' => 'file_list',
        'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
    ),
  ),
);

 ?>