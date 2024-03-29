<?php

namespace lib\math;

/**
 * Class Vector2.
 *
 * @package lib\math
 * @author Daniel Peters
 * @version 1.0
 */
class Vector2 {
  /**
   * @var float
   */
  private $x;
  /**
   * @var float
   */
  private $y;

  public function __construct (float $x, float $y) {
    $this->x = $x;
    $this->y = $y;
  }

  public function add (float $x, float $y): void {
    $this->x += $x;
    $this->y += $y;
  }

  public function addVector (Vector2 $vector): void {
    $this->x += $vector->x;
    $this->y += $vector->y;
  }

  public function subtract (float $x, float $y): void {
    $this->x -= $x;
    $this->y -= $y;
  }

  public function subtractVector (Vector2 $vector): void {
    $this->x -= $vector->x;
    $this->y -= $vector->y;
  }

  public function getX (): float {
    return $this->x;
  }

  public function setX (float $x): void {
    $this->x = $x;
  }

  public function getY (): float {
    return $this->y;
  }

  public function setY (float $y): void {
    $this->y = $y;
  }
}
