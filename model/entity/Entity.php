<?php

namespace lib\model\entity;

/**
 * Class Entity.
 *
 * @package lib\model\entity
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Entity {
	protected $id;

	public function __construct( string $id ) {
		$this->id = $id;
	}

	public function getId(): string {
		return $this->id;
	}

	public function toArray(): array {
		return [];
	}
}