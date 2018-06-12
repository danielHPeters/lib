<?php

namespace rafisa\lib\model\game\item;

use rafisa\lib\model\game\item\action\ItemAction;

/**
 * Class Item.
 *
 * @package rafisa\lib\model\game\item
 * @author Daniel Peters
 * @version 1.0
 */
class Item {
	private $name;
	private $description;
	private $price;
	private $action;

	public function __construct( string $name, string $description, float $price, ItemAction $action ) {
		$this->name        = $name;
		$this->description = $description;
		$this->price       = $price;
		$this->action      = $action;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function getPrice(): float {
		return $this->price;
	}

	public function doUse(): void {
		$this->action->doUse();
	}
}
