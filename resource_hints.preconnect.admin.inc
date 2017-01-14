<?php
/**
 * @file
 * Admin page callbacks for the resource hints module.
 */

/**
 * Form constructor for the resource hints preconnect admin form.
 */
function resource_hints_preconnect_admin() {
  $form['resource_hints_preconnect_domains'] = array(
    '#title' => t('Preconnect domains'),
    '#type' => 'textarea',
    '#description' => t('The domains you wish to be preconnected. Enter one host name per line.'),
    '#default_value' => variable_get('resource_hints_preconnect_domains', ''),
  );

  return system_settings_form($form);
}
