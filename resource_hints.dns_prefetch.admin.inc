<?php
/**
 * @file
 * Admin page callbacks for the resource hints module.
 */

/**
 * Form constructor for the resource hints admin form.
 */
function resource_hints_dns_prefetch_admin() {

  $form['resource_hints_dns_prefetch_output'] = array(
    '#type' => 'select',
    '#title' => t('DNS prefetch output'),
    '#options' => array(
      RESOURCE_HINTS_OUTPUT_LINK_ELEMENT => t('Link Element'),
      RESOURCE_HINTS_OUTPUT_LINK_HEADER => t('Link Header'),
    ),
    '#default_value' => variable_get('resource_hints_dns_prefetch_output', RESOURCE_HINTS_OUTPUT_LINK_ELEMENT),
    '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
  );

  $form['resource_hints_dns_prefetch_protocol_control'] = array(
    '#type' => 'select',
    '#title' => t('DNS prefetch protocol control'),
    '#options' => array(
      RESOURCE_HINTS_DNS_PREFETCH_HTTP_ONLY => t('HTTP Only'),
      RESOURCE_HINTS_DNS_PREFETCH_HTTP_AND_HTTPS => t('HTTP and HTTPS'),
      RESOURCE_HINTS_DNS_PREFETCH_DISABLED => t('Disabled'),
    ),
    '#default_value' => variable_get('resource_hints_dns_prefetch_protocol_control', RESOURCE_HINTS_DNS_PREFETCH_HTTP_ONLY),
    '#description' => t('By default browsers will not use DNS prefetching when a page is served via HTTPS, you must explicitly enable prefetching for HTTPS. Disabling prefetching will prevent browsers using prefetching and any inline attempts to enable it will be ignored.'),
  );

  $form['resource_hints_dns_prefetch_resources'] = array(
    '#title' => t('DNS prefetch resources'),
    '#type' => 'textarea',
    '#description' => t('The DNS resources you wish to be prefetched. Enter one resource per line.'),
    '#default_value' => variable_get('resource_hints_dns_prefetch_domains', ''),
  );

  return system_settings_form($form);
}
