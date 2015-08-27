<?php
/**
 * @file
 * Definition of the comment plugin.
 */

if (module_exists('field_collection')) {
  $plugin = array(
    'handler' => 'FieldCollectionEntityFieldCollectionItem',
    'entity path' => 'field-collection/%field_collection_field_name/%field_collection_item',
    'uses page manager' => FALSE,
    'hooks' => array(
      'menu' => TRUE,
      'permission' => TRUE,
      'panelizer_defaults' => TRUE,
      'default_page_manager_handlers' => TRUE,
      'form_alter' => TRUE,
      'views_data_alter' => TRUE,
    ),
  );
}
