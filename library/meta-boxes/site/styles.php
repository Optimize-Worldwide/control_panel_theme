<?php
$meta_boxes['meta_site_styles'] = array(
	'id'            => 'meta_site_styles',
	'title'         => 'Site Styles',
	'object_types'  => array('site'),
	'context'       => 'side',
	'priority'      => 'default',
	'show_names'    => true,
	'fields'        => array(
		array(
			'id'          => $prefix . 'colors',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Color {#}',
				'add_button'    => 'Add Another Color',
				'remove_button' => 'Remove Color',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'name' => 'Label',
					'id'   => 'label',
					'type' => 'radio_inline',
					'options' => array(
						'primary' => 'Primary Color',
						'secondary'   => 'Secondary Color',
						'tertiary'     => 'Tertiary Color',
						'accent'     => 'Accent Color',
					),
				),
				array(
					'name' => 'Color',
					'id'   => 'color',
					'type' => 'colorpicker',
					'default' => '#ffffff'
				),
				array(
					'name' => 'Notes',
					'id'   => 'notes',
					'type' => 'textarea_small',
				),
			),
		),
		array(
			'id'          => $prefix . 'fonts',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => 'Font {#}',
				'add_button'    => 'Add Another Font',
				'remove_button' => 'Remove Font',
				'sortable'      => true,
			),
			'fields'      => array(
				array(
					'name' => 'Label',
					'id'   => 'label',
					'type' => 'text_small',
				),
				array(
					'name' => 'Font',
					'id'   => 'font',
					'type' => 'text',
				),
				array(
					'name' => 'Notes',
					'description' => 'Notes about this font',
					'id'   => 'notes',
					'type' => 'textarea_small',
				),
			),
		),
	)
);
 ?>