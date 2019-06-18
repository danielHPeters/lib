<?php

namespace lib\test\math;

use lib\math\Vector2;
use PHPUnit\Framework\TestCase;

/**
 * Class Vector2Test.
 *
 * @package lib\test\math
 * @author  Daniel Peters
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

    $this->assertEquals($vector2->getX(), $expectedResultVector2x);
    $this->assertEquals($vector2->getY(), $expectedResultVector2y);
  }

  /** @test */
  public function valuesCanChange (): void {
    $vector = new Vector2(2, 2);
    $newX = 6;
    $newY = 19;

    $vector->setX($newX);
    $vector->setY($newY);

    $this->assertEquals($vector->getX(), $newX);
    $this->assertEquals($vector->getY(), $newY);
  }

  /** @test */
  public function primitiveNumbersCanBeAdded (): void {
    $startX = 2;
    $startY = 2;
    $vector = new Vector2($startX, $startY);
    $addX = 34;
    $addY = 7;

    $vector->add($addX, $addY);

    $this->assertEquals($vector->getX(), $startX + $addX);
    $this->assertEquals($vector->getY(), $startY + $addY);
  }
}
