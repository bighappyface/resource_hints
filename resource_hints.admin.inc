<?php

/**
 * @file
 * Admin page callbacks for the resource hints module.
 */

/**
 * Form constructor for the resource hints admin form.
 */
function resource_hints_dns_prefetch_admin() {

  $form['dns_prefetch'] = array(
    '#type' => 'fieldset',
    '#title' => t('DNS Prefetch'),
    '#collapsible' => TRUE,
  );

  $form['dns_prefetch']['resource_hints_dns_prefetch_output'] = array(
    '#type' => 'select',
    '#title' => t('DNS prefetch output'),
    '#options' => array(
      RESOURCE_HINTS_OUTPUT_LINK_HEADER => t('Link Header'),
      RESOURCE_HINTS_OUTPUT_LINK_ELEMENT => t('Link Element'),
    ),
    '#default_value' => variable_get('resource_hints_dns_prefetch_output', RESOURCE_HINTS_OUTPUT_LINK_HEADER),
    '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
  );

  $form['dns_prefetch']['resource_hints_dns_prefetch_resources'] = array(
    '#title' => t('DNS prefetch resources'),
    '#type' => 'textarea',
    '#description' => t('The DNS resources you wish to be prefetched. Enter one resource per line.'),
    '#default_value' => variable_get('resource_hints_dns_prefetch_resources', ''),
  );

  $form['dns_prefetch']['resource_hints_dns_prefetch_control'] = array(
    '#type' => 'select',
    '#title' => t('DNS prefetch control'),
    '#options' => array(
      RESOURCE_HINTS_DNS_PREFETCH_ENABLED => t('Enabled'),
      RESOURCE_HINTS_DNS_PREFETCH_DISABLED => t('Disabled'),
    ),
    '#default_value' => variable_get('resource_hints_dns_prefetch_control', RESOURCE_HINTS_DNS_PREFETCH_ENABLED),
    '#description' => t('By default browsers will not use DNS prefetching when a page is served via HTTPS, you must explicitly enable prefetching for HTTPS. Disabling prefetching will prevent browsers using prefetching and any inline attempts to enable it will be ignored.'),
  );

  $form['preconnect'] = array(
    '#type' => 'fieldset',
    '#title' => t('Preconnect'),
    '#collapsible' => TRUE,
  );

  $form['preconnect']['resource_hints_preconnect_output'] = array(
    '#type' => 'select',
    '#title' => t('Preconnect output'),
    '#options' => array(
      RESOURCE_HINTS_OUTPUT_LINK_HEADER => t('Link Header'),
      RESOURCE_HINTS_OUTPUT_LINK_ELEMENT => t('Link Element'),
    ),
    '#default_value' => variable_get('resource_hints_preconnect_output', RESOURCE_HINTS_OUTPUT_LINK_HEADER),
    '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
  );

  $form['preconnect']['resource_hints_preconnect_resources'] = array(
    '#title' => t('Preconnect resources'),
    '#type' => 'textarea',
    '#description' => t('The resources you wish to be preconnected. Enter one resource per line.'),
    '#default_value' => variable_get('resource_hints_preconnect_resources', ''),
  );

  $form['prefetch'] = array(
    '#type' => 'fieldset',
    '#title' => t('Prefetch'),
    '#collapsible' => TRUE,
  );

  $form['prefetch']['resource_hints_prefetch_output'] = array(
    '#type' => 'select',
    '#title' => t('Prefetch output'),
    '#options' => array(
      RESOURCE_HINTS_OUTPUT_LINK_HEADER => t('Link Header'),
      RESOURCE_HINTS_OUTPUT_LINK_ELEMENT => t('Link Element'),
    ),
    '#default_value' => variable_get('resource_hints_prefetch_output', RESOURCE_HINTS_OUTPUT_LINK_HEADER),
    '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
  );

  $form['prefetch']['resource_hints_prefetch_resources'] = array(
    '#title' => t('Prefetch resources'),
    '#type' => 'textarea',
    '#description' => t('The resources you wish to be prefetched. Enter one resource per line.'),
    '#default_value' => variable_get('resource_hints_prefetch_resources', ''),
  );

  $form['prerender'] = array(
    '#type' => 'fieldset',
    '#title' => t('Prerender'),
    '#collapsible' => TRUE,
  );

  $form['prerender']['resource_hints_prerender_output'] = array(
    '#type' => 'select',
    '#title' => t('Prerender output'),
    '#options' => array(
      RESOURCE_HINTS_OUTPUT_LINK_HEADER => t('Link Header'),
      RESOURCE_HINTS_OUTPUT_LINK_ELEMENT => t('Link Element'),
    ),
    '#default_value' => variable_get('resource_hints_prerender_output', RESOURCE_HINTS_OUTPUT_LINK_HEADER),
    '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
  );

  $form['prerender']['resource_hints_prerender_resources'] = array(
    '#title' => t('Prerender resources'),
    '#type' => 'textarea',
    '#description' => t('The resources you wish to be prerendered. Enter one resource per line.'),
    '#default_value' => variable_get('resource_hints_prerender_resources', ''),
  );

  return system_settings_form($form);
}
