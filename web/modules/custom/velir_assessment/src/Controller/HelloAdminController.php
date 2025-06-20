<?php

namespace Drupal\velir_assessment\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns a greeting only for administrators.
 */
class HelloAdminController extends ControllerBase {

  /**
   * Returns a simple message.
   */
  public function hello() {
    return [
      '#markup' => $this->t('Hello, my name is Angel.'),
    ];
  }

}
