<?php

namespace Drupal\velir_assessment\Normalizer;

use Drupal\node\Entity\Node;
use Drupal\serialization\Normalizer\ContentEntityNormalizer;

class NodeVelirNormalizer extends ContentEntityNormalizer {
  protected $supportedInterfaceOrClass = Node::class;

  public function supportsNormalization($data, ?string $format = null, array $context = []): bool {
    return $data instanceof Node && $format === 'json';
  }

  public function normalize($entity, $format = null, array $context = []): array|\ArrayObject|int|float|string|bool|null {
    $data = parent::normalize($entity, $format, $context);
    if (is_array($data)) {
      $data['velir'] = '212';
    }
    return $data;
  }
}
