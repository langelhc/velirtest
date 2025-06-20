<?php

namespace Drupal\Tests\velir_assessment\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;

/**
 * Tests that the node serialization includes the "velir" attribute.
 *
 * @group velir_assessment
 */
class NodeVelirNormalizerTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'serialization',
    'velir_assessment',
  ];

  /**
   * Sets up content type and basic environment.
   */
  protected function setUp(): void {
    parent::setUp();

    // Install node schema/config.
    $this->installEntitySchema('node');
    $this->installConfig(['node']);

    // Create a basic content type.
    $this->createContentType(['type' => 'article']);
  }

  /**
   * Tests serialization of a node includes "velir": "212".
   */
  public function testNodeSerializationContainsVelir() {
    // Create example node.
    $node = Node::create([
      'type' => 'article',
      'title' => 'Example Node',
    ]);
    $node->save();

    // Get the serializer service.
    $serializer = $this->container->get('serializer');

    // Serialize the node to JSON.
    $json = $serializer->serialize($node, 'json');

    // Decode the JSON to array.
    $data = json_decode($json, TRUE);

    // Assert that "velir" attribute is present and equals "212".
    $this->assertArrayHasKey('velir', $data);
    $this->assertEquals('212', $data['velir']);
  }

}
