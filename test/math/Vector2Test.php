<?php

namespace lib\test\math;

use lib\math\Vector2;
use PHPUnit\Framework\TestCase;

/**
 * Class Vector2Test.
 *
 * @package lib\test\math
 * @author Daniel Peters
 * @version 1.0
 */
class Vector2Test extends TestCase {
  /** @test */
  public function canBeAddedToAnotherVector (): void {
    $vector1 = new Vector2(2, 2);
    $vector2 = new Vector2(4, 5);
    $expectedResultVector2x = $vector1->getX() + $vector2->getX();
    $expectedResultVector2y = $vector1->getY() + $vector2->getY();

    $vector2->addVector($vector1);

    $this->assertEquals(
      $vector2->getX(),
      $expectedResultVector2x
    );

    $this->assertEquals(
      $vector2->getY(),
      $expectedResultVector2y
    );
  }
}
