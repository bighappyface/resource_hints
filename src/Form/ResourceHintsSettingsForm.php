<?php

namespace Drupal\resource_hints\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure resource_hints settings for this site.
 */
class ResourceHintsSettingsForm extends ConfigFormBase {

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

    $form['resource_hints_preconnect_resources'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Preconnect Resources'),
      '#default_value' => $config->get('preconnect_resources'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = \Drupal::service('config.factory')->getEditable('resource_hints.settings');
    $config->set('preconnect_resources', $form_state->getValue('resource_hints_preconnect_resources'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
