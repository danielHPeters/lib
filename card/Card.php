<?php

namespace rafisa\lib\card;

/**
 * Description of Card.
 *
 * @author  Daniel Peters
 * @version 1.0
 */
class Card {
	private $color;
	private $value;

	public function __construct( string $color, string $value ) {
		$this->color = $color;
		$this->value = $value;
	}

	public function getColor(): string {
		return $this->color;
	}

	public function getValue(): string {
		return $this->value;
	}
}
