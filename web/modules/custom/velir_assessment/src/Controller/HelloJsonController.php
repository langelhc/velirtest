<?php

namespace Drupal\velir_assessment\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Cache\CacheableJsonResponse;

/**
 * Returns a JSON greeting message.
 */
class HelloJsonController extends ControllerBase {

  /**
   * Returns a JSON response.
   */
  public function hello() {
    $data = ['message' => 'Hello, my name is Angel.'];
    return new CacheableJsonResponse($data);
  }

}
