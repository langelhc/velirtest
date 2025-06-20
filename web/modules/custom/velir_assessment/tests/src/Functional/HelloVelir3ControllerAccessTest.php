<?php

namespace Drupal\Tests\velir_assessment\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\Role;

/**
 * Tests access control for the /hello-velir-3 route.
 *
 * @group velir_assessment
 */
class HelloVelir3ControllerAccessTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['velir_assessment'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Tests access denied for anonymous user.
   */
  public function testAccessDeniedForAnonymousUser() {
    $this->drupalGet('hello-velir-3');
    $this->assertSession()->statusCodeEquals(403);
  }

  /**
   * Tests access granted for administrator role.
   */
public function testAccessGrantedForAdminUser() {
  // Ensure the 'administrator' role exists.
  if (!Role::load('administrator')) {
    Role::create([
      'id' => 'administrator',
      'label' => 'Administrator',
    ])->save();
  }

  // Create a user with that role.
  $admin_user = $this->drupalCreateUser([], NULL, FALSE);
  $admin_user->addRole('administrator');
  $admin_user->save();

  // Log them in and try the route.
  $this->drupalLogin($admin_user);
  $this->drupalGet('hello-velir-3');

  // Assertions.
  $this->assertSession()->statusCodeEquals(200);
  $this->assertSession()->pageTextContains('Hello, my name is Angel.');
}


}
