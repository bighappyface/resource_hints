<?php

namespace Drupal\Tests\resource_hints\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests resource hint output based on config.
 *
 * @group comment
 */
class ResourceHintsOutputTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  public $profile = 'testing';

  /**
   * User.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'resource_hints',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->user = $this->drupalCreateUser([
      'administer resource hints',
    ]);
  }

  /**
   * Tests comment status field access.
   */
  public function testDnsPrefetch() {
    $this->drupalLogin($this->user);
    $this->drupalGet('admin/config/development/resources-hints');
    $assert = $this->assertSession();
    $this->submitForm([
      'title[0][value]' => 'Node 1',
    ], t('Save and publish'));
    $assert->responseHeaderContains('Link', '<//drupal.org>; rel=dns-prefetch');
  }

}
