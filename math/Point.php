<?php

namespace lib\math;

/**
 * Class Point.
 *
 * @package lib\math
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Point {
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

  public function add (float $x, float $y) {
    $this->x += $x;
    $this->y += $y;
  }

  public function addPoint (Point $other) {
    $this->x += $other->getX();
    $this->y += $other->getY();
  }

  public function set (float $x, float $y) {
    $this->x = $x;
    $this->y = $y;
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
