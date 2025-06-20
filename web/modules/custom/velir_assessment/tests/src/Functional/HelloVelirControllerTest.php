<?php

namespace Drupal\Tests\velir_assessment\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\Role;

/**
 * Tests the HelloVelirController.
 *
 * @group velir_assessment
 */
class HelloVelirControllerTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['velir_assessment'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

    /**
     * Grants permissions to anonymous users for testing.
     */
    protected function setUp(): void {
      parent::setUp();

      // Give "access content" to anonymous role during test.
      $anon_role = Role::load('anonymous');
      $anon_role->grantPermission('access content');
      $anon_role->save();
    }

  /**
   * Tests the hello-velir-1 route.
   */
  public function testHelloVelir1Route() {
    $this->drupalGet('hello-velir-1');
    // Dump raw HTML to PHPUnit output.
    // print $this->getSession()->getPage()->getContent();
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('Hello, my name is Angel.');
  }

}
