<?php
/**
 * @file
 * Admin page callbacks for the resource hints module.
 */

/**
 * Form constructor for the resource hints preconnect admin form.
 */
function resource_hints_preconnect_admin() {
  $form['resource_hints_preconnect_output'] = array(
    '#type' => 'select',
    '#title' => t('Preconnect output'),
    '#options' => array(
      RESOURCE_HINTS_OUTPUT_LINK_ELEMENT => t('Link Element'),
      RESOURCE_HINTS_OUTPUT_LINK_HEADER => t('Link Header'),
    ),
    '#default_value' => variable_get('resource_hints_preconnect_output', RESOURCE_HINTS_OUTPUT_LINK_ELEMENT),
    '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
  );

  $form['resource_hints_preconnect_resources'] = array(
    '#title' => t('Preconnect resources'),
    '#type' => 'textarea',
    '#description' => t('The resources you wish to be preconnected. Enter one resource per line.'),
    '#default_value' => variable_get('resource_hints_preconnect_resources', ''),
  );

  return system_settings_form($form);
}
