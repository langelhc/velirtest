<?php

namespace Drupal\velir_assessment\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block that displays a user message.
 *
 * @Block(
 *   id = "user_message_block",
 *   admin_label = @Translation("User Message"),
 * )
 */
class UserMessageBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_user = \Drupal::currentUser();
    $is_authenticated = $current_user->isAuthenticated();

    $message = $is_authenticated
      ? $this->t('Welcome, @name!', ['@name' => $current_user->getDisplayName()])
      : $this->t('Log In');

    return [
      '#markup' => $message,
      '#cache' => [
        'contexts' => ['user'],
      ],
    ];
  }

}
