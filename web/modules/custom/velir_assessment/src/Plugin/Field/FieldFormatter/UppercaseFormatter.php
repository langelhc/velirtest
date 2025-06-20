<?php

namespace Drupal\velir_assessment\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'uppercase_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "uppercase_formatter",
 *   label = @Translation("Uppercase Formatter"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class UppercaseFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#markup' => strtoupper($item->value),
      ];
    }

    return $elements;
  }

}
