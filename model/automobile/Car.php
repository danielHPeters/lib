<?php

namespace lib\model\automobile;

use lib\util\observer\Observable;

/**
 * Class Car.
 *
 * @package lib\model\automobile
 * @author Daniel Peters
 * @version 1.0
 */
class Car extends Observable {
	private $name;

	public function __construct( string $name ) {
		parent::__construct();
		$this->name = $name;
	}

	public function getName(): string {
		return $this->name;
	}

	public function setName( string $name ) {
		$this->name = $name;
		$this->notify();
	}
}
