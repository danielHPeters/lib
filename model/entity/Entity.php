<?php

namespace rafisa\lib\model\entity;

/**
 * Class Entity.
 *
 * @package rafisa\lib\model\entity
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
