<?php

namespace Drupal\Tests\akamai\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tests Edge-Cache-Tag Header.
 *
 * @group Akamai
 */
class EdgeCacheTagHeaderTest extends KernelTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['system', 'akamai'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->installConfig(['resource_hints']);
  }

  /**
   * Test that the header value is exactly as expected (space separated).
   */
  public function testHeaderValue() {
    $request = Request::create('/system/401');

    $config = $this->config('akamai.settings');

    /** @var \Symfony\Component\HttpKernel\HttpKernelInterface $kernel */
    $kernel = \Drupal::getContainer()->get('http_kernel');
    $response = $kernel->handle($request);

    // Verify header is not available by default.
    $this->assertEqual(200, $response->getStatusCode());
    $this->assertEqual($response->headers->has('Edge-Cache-Tag'), FALSE);

    // Verify header is available when enabled.
    $config->set('edge_cache_tag_header', TRUE)->save();
    $response = $kernel->handle($request);
    $this->assertEqual(200, $response->getStatusCode());
    $this->assertEqual($response->headers->has('Edge-Cache-Tag'), TRUE);
    $this->assertEqual($response->headers->get('Edge-Cache-Tag'), 'config_user.role.anonymous,http_response,rendered');
  }
}
