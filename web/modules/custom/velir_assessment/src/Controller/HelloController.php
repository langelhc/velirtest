<?php

namespace Drupal\velir_assessment\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns a greeting message.
 */
class HelloController extends ControllerBase {

  /**
   * Returns a simple text response.
   */
  public function hello() {
    return [
      '#markup' => $this->t('Hello, my name is Angel.'),
    ];
  }

}