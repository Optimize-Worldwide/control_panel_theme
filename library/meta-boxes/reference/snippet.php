<?php
$prefix_snippet = $prefix . "snippet_";

$meta_boxes['meta_reference_snippet'] = array(
	'id'            => 'meta_reference_snippet',
	'title'         => 'Snippets',
	'object_types'  => array('reference'),
	'show_on'       => array(
		'key' => 'taxonomy',
		'value' => array(
			'reference-type' => 'snippet'
		)
	),
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'          => $prefix_snippet . 'snippets',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Snippet {#}',
				'add_button'    => 'Add Another Snippet',
				'remove_button' => 'Remove Snippet',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'name' => 'Title',
					'id'   => 'title',
					'type' => 'text',
				),
				array(
						'name' => 'Snippet',
						'id' => 'code',
						'type' => 'textarea_code',
				),
			),
		),
	),
);

 ?>