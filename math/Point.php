<?php

namespace rafisa\lib\math;

/**
 * Class Point.
 *
 * @package rafisa\lib\math
 * @author Daniel Peters
 * @version 1.0
 */
class Point {
	private $x;
	private $y;

	public function __construct( float $x, float $y ) {
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * Add a x and a y value.
	 *
	 * @param float $x
	 * @param float $y
	 */
	public function add( float $x, float $y ) {
		$this->x += $x;
		$this->y += $y;
	}

	/**
	 * Add the values of another point to this point.
	 *
	 * @param Point $other
	 */
	public function addPoint( Point $other ) {
		$this->x += $other->getX();
		$this->y += $other->getY();
	}

	/**
	 * Set x and y coordinates of this point.
	 *
	 * @param float $x
	 * @param float $y
	 */
	public function set( float $x, float $y ) {
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * @return float
	 */
	public function getX(): float {
		return $this->x;
	}

	/**
	 * @param float $x
	 */
	public function setX( float $x ): void {
		$this->x = $x;
	}

	/**
	 * @return float
	 */
	public function getY(): float {
		return $this->y;
	}

	/**
	 * @param float $y
	 */
	public function setY( float $y ): void {
		$this->y = $y;
	}
}
