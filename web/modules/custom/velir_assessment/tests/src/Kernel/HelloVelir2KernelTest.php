<?php

namespace Drupal\Tests\velir_assessment\Kernel;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\KernelTests\KernelTestBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Cache\CacheableJsonResponse;


/**
 * Tests the hello-velir-2 route for correct JSON response.
 *
 * @group velir_assessment
 */
class HelloVelir2KernelTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['velir_assessment'];

  /**
   * Test that the route returns a JSON response.
   */
  public function testHelloVelir2JsonResponse() {
    // $url = '/hello-velir-2';

    $request = Request::create('/hello-velir-2?_format=json', 'GET', [], [], [], [
    'HTTP_ACCEPT' => 'application/json',
  ]);

    $response = $this->container->get('http_kernel')->handle($request);

    // Assert the response is a JsonResponse.
    $this->assertInstanceOf(CacheableJsonResponse::class, $response);
    $this->assertEquals(200, $response->getStatusCode());

    $data = json_decode($response->getContent(), TRUE);

    $this->assertIsArray($data);
    $this->assertEquals('Hello, my name is Angel.', $data['message'] ?? '');
  }

}
