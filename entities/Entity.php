<?php

namespace rafisa\lib\entities;

/**
 * Class Entity.
 *
 * @package rafisa\lib\entities
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Entity {
	protected $id;

	public function __construct($id) {
		$this->id = $id;
	}

	public function getId(): string {
		return $this->id;
	}
}
