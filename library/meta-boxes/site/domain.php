<?php
$meta_boxes['meta_site_domain'] = array(
  'id'            => 'meta_site_domain',
  'title'         => 'Domain Registration Information',
  'object_types'  => array('site'),
  'context'       => 'normal',
  'priority'      => 'default',
  'show_names'    => true,
  'fields'        => array(
    array(
      'name'       => 'Name of Domain Registrar',
      'id'         => $prefix . 'domain_registrar',
      'type'       => 'text',
    ),
    array(
      'name'       => 'Domain Registrar Login URL',
      'id'         => $prefix . 'domain_registrar_url',
      'type'       => 'text_url',
    ),
    array(
      'name'       => 'Domain Registrar Username',
      'id'         => $prefix . 'domain_registrar_username',
      'type'       => 'text',
    ),
    array(
      'name'       => 'Domain Registrar Password',
      'id'         => $prefix . 'domain_registrar_password',
      'type'       => 'text',
    ),
    array(
      'name' => 'Notes about domain registration',
      'id'   => $prefix . 'domain_notes',
      'type' => 'textarea_small',
    ),
  ),
);
 ?>