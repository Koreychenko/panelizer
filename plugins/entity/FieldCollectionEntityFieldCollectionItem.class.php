<?php
/**
 * @filegit
 * Class for the Panelizer field_collection_item entity plugin.
 */

/**
 * Field-Collection Entity plugin class.
 *
 * Handles field-collection specific functionality for Panelizer.
 */
class FieldCollectionEntityFieldCollectionItem extends PanelizerEntityDefault {
  public $views_table = 'field_collection_item';
  public $entity_admin_root = 'admin/structure/field-collections/%field_collection_field_name';
  public $entity_admin_bundle = 3;
  public $uses_page_manager = FALSE;
  public $supports_revisions = FALSE;

  public function entity_access($op, $entity) {
    return field_collection_item_access($op, $entity);
  }

  /**
   * Implement the save function for the entity.
   */
  public function entity_save($entity) {
    entity_save('field_collection_item', $entity);
  }

  public function settings_form(&$form, &$form_state) {
    parent::settings_form($form, $form_state);
  }

  public function entity_identifier($entity) {
    return t('This field-collection');
  }

  public function entity_bundle_label() {
    // @todo unsure?
    return t('Field Collection Field');
  }

  function get_default_display($bundle, $view_mode) {
    // For now we just go with the empty display.
    // @todo come up with a better default display.
    return parent::get_default_display($bundle, $view_mode);
  }

  /**
   * Implements a delegated hook_page_manager_handlers().
   *
   * This makes sure that all panelized entities have the proper entry
   * in page manager for rendering.
   */
  public function hook_default_page_manager_handlers(&$handlers) {
    $handler = new stdClass;
    $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
    $handler->api_version = 1;
    $handler->name = 'field_collection_item_view_panelizer';
    $handler->task = 'field_collection_item_view';
    $handler->subtask = '';
    $handler->handler = 'panelizer_node';
    $handler->weight = -100;
    $handler->conf = array(
      'title' => t('Field Collection panelizer'),
      'context' => 'argument_entity_id:field_collection_item_1',
      'access' => array(),
    );
    $handlers['field_collection_item_view_panelizer'] = $handler;

    return $handlers;
  }
}
