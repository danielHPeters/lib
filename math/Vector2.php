<?php

namespace rafisa\lib\math;

/**
 * Class Vector2
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\math
 */
class Vector2
{
    /**
     * @var float
     */
    private $x;
    /**
     * @var float
     */
    private $y;

    /**
     * Vector2 constructor.
     *
     * @param float $x
     * @param float $y
     */
    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param float $x
     * @param float $y
     */
    public function add(float $x, float $y)
    {
        $this->x += $x;
        $this->y += $y;
    }

    /**
     * @param Vector2 $vector
     */
    public function addVector(Vector2 $vector)
    {
        $this->x += $vector->x;
        $this->y += $vector->y;
    }

    /**
     * @param float $x
     * @param float $y
     */
    public function subtract(float $x, float $y)
    {
        $this->x -= $x;
        $this->y -= $y;
    }

    /**
     * @param Vector2 $vector
     */
    public function subtractVector(Vector2 $vector)
    {
        $this->x -= $vector->x;
        $this->y -= $vector->y;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @param float $x
     */
    public function setX(float $x): void
    {
        $this->x = $x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @param float $y
     */
    public function setY(float $y): void
    {
        $this->y = $y;
    }
}
