<?php

namespace Drupal\resource_hints\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure resource hints for this site.
 */
class ResourceHintsSettingsForm extends ConfigFormBase {

  const OUTPUT_LINK_ELEMENT = 0;
  const OUTPUT_LINK_HEADER = 1;
  const DNS_PREFETCH_HTTP_ONLY = 2;
  const DNS_PREFETCH_HTTP_AND_HTTPS = 3;
  const DNS_PREFETCH_DISABLED = 4;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'resource_hints_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'resource_hints.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('resource_hints.settings');

    $form['dns_prefetch'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('DNS Prefetch'),
    ];

    $form['dns_prefetch']['dns_prefetch_output'] = [
      '#type' => 'select',
      '#title' => t('Output type'),
      '#options' => [
        self::OUTPUT_LINK_HEADER => t('Link Header'),
        self::OUTPUT_LINK_ELEMENT => t('Link Element'),
      ],
      '#default_value' => $config->get('dns_prefetch_output'),
      '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
    ];

    $form['dns_prefetch']['dns_prefetch_resources'] = [
      '#type' => 'textarea',
      '#default_value' => $config->get('dns_prefetch_resources'),
      '#title' => $this->t('Resources'),
      '#description' => t('The DNS resources you wish to be prefetched. Enter one resource per line.'),
    ];

    $form['dns_prefetch']['dns_prefetch_protocol_control'] = [
      '#type' => 'select',
      '#title' => t('DNS Prefetch Protocol Control'),
      '#options' => [
        self::DNS_PREFETCH_HTTP_ONLY => t('HTTP Only'),
        self::DNS_PREFETCH_HTTP_AND_HTTPS => t('HTTP and HTTPS'),
        self::DNS_PREFETCH_DISABLED => t('Disabled'),
      ],
      '#default_value' => $config->get('dns_prefetch_protocol_control'),
      '#description' => t('By default browsers will not use DNS prefetching when a page is served via HTTPS, you must explicitly enable prefetching for HTTPS. Disabling prefetching will prevent browsers using prefetching and any inline attempts to enable it will be ignored.'),
    ];

    $form['preconnect'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Preconnect'),
    ];

    $form['preconnect']['preconnect_output'] = [
      '#type' => 'select',
      '#title' => t('Output type'),
      '#options' => [
        self::OUTPUT_LINK_HEADER => t('Link Header'),
        self::OUTPUT_LINK_ELEMENT => t('Link Element'),
      ],
      '#default_value' => $config->get('preconnect_output'),
      '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
    ];

    $form['preconnect']['preconnect_resources'] = [
      '#type' => 'textarea',
      '#default_value' => $config->get('preconnect_resources'),
      '#title' => $this->t('Resources'),
      '#description' => t('The resources you wish to be preconnected. Enter one resource per line.'),
    ];

    $form['prefetch'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Prefetch'),
    ];

    $form['prefetch']['prefetch_output'] = [
      '#type' => 'select',
      '#title' => t('Output type'),
      '#options' => [
        self::OUTPUT_LINK_HEADER => t('Link Header'),
        self::OUTPUT_LINK_ELEMENT => t('Link Element'),
      ],
      '#default_value' => $config->get('prefetch_output'),
      '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
    ];

    $form['prefetch']['prefetch_resources'] = [
      '#type' => 'textarea',
      '#default_value' => $config->get('prefetch_resources'),
      '#title' => $this->t('Resources'),
      '#description' => t('The resources you wish to be prefetched. Enter one resource per line.'),
    ];

    $form['prerender'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Prerender'),
    ];

    $form['prerender']['prerender_output'] = [
      '#type' => 'select',
      '#title' => t('Output type'),
      '#options' => [
        self::OUTPUT_LINK_HEADER => t('Link Header'),
        self::OUTPUT_LINK_ELEMENT => t('Link Element'),
      ],
      '#default_value' => $config->get('prerender_output'),
      '#description' => t('Resource hints can be output as an HTTP Link header or HTML link element'),
    ];

    $form['prerender']['prerender_resources'] = [
      '#type' => 'textarea',
      '#default_value' => $config->get('prerender_resources'),
      '#title' => $this->t('Resources'),
      '#description' => t('The resources you wish to be prerendered. Enter one resource per line.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = \Drupal::service('config.factory')->getEditable('resource_hints.settings');
    $config->set('dns_prefetch_resources', $form_state->getValue('dns_prefetch_resources'))
      ->set('dns_prefetch_output', $form_state->getValue('dns_prefetch_output'))
      ->set('dns_prefetch_protocol_control', $form_state->getValue('dns_prefetch_protocol_control'))
      ->set('preconnect_resources', $form_state->getValue('preconnect_resources'))
      ->set('preconnect_output', $form_state->getValue('preconnect_output'))
      ->set('prefetch_resources', $form_state->getValue('prefetch_resources'))
      ->set('prefetch_output', $form_state->getValue('prefetch_output'))
      ->set('prerender_resources', $form_state->getValue('prerender_resources'))
      ->set('prerender_output', $form_state->getValue('prerender_output'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}