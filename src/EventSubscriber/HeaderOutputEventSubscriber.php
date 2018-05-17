<?php
namespace Drupal\resource_hints\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\UrlHelper;
use Drupal\resource_hints\Form\ResourceHintsConfigForm;

/**
 * Event subscriber for adding resource hint headers.
 */
class HeaderOutputEventSubscriber implements EventSubscriberInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs a new CacheableResponseSubscriber.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * Handle the resource hint headers.
   */
  public function handleResourceHintHeaders(FilterResponseEvent $event) {

    if (!$event->isMasterRequest()) {
      return;
    }

    $response = $event->getResponse();

    $config = $this->configFactory->get('resource_hints.settings');

    $hint_types = [
      'dns-prefetch' => 'dns_prefetch',
      'preconnect' => 'preconnect',
      'prefetch' => 'prefetch',
      'prerender' => 'prerender',
    ];

    $headers = [];

    $dns_prefetch_control = Html::escape($config->get('dns_prefetch_control'));
    $dns_prefetch_output = $config->get('dns_prefetch_output');

    if ($dns_prefetch_output == ResourceHintsConfigForm::OUTPUT_LINK_HEADER) {
      $response->headers->set('X-DNS-Prefetch-Control', $dns_prefetch_control, FALSE);
    }

    foreach ($hint_types as $rel => $setting) {
      if ($rel == 'dns-prefetch' && $dns_prefetch_control != ResourceHintsConfigForm::DNS_PREFETCH_ENABLED) {
        continue;
      }
      $resources = $config->get("{$setting}_resources");
      $output = $config->get("{$setting}_output");
      foreach ($resources as $value) {
        $value = UrlHelper::stripDangerousProtocols(trim($value));
        if ($value) {
          if ($output === ResourceHintsConfigForm::OUTPUT_LINK_HEADER) {
            $response->headers->set('Link', "<{$value}>; rel=\"{$rel}\"", FALSE);
          }
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  static public function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['handleResourceHintHeaders'];
    return $events;
  }

}
