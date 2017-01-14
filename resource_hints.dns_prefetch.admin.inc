<?php
/**
 * @file
 * Admin page callbacks for the resource hints module.
 */

/**
 * Form constructor for the resource hints admin form.
 */
function resource_hints_dns_prefetch_admin() {

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

  $form['resource_hints_dns_prefetch_domains'] = array(
    '#title' => t('DNS prefetch domains'),
    '#type' => 'textarea',
    '#description' => t('The domains you wish to be prefetched. Enter one host name per line.'),
    '#default_value' => variable_get('resource_hints_dns_prefetch_domains', ''),
  );

  return system_settings_form($form);
}
