<?php

namespace rafisa\lib\shop;

use rafisa\lib\entities\Entity;

/**
 * Class Product
 *
 * @package rafisa\lib\shop
 * @author Daniel Peters
 * @version 1.0
 */
class Product extends Entity {
	private $pid;
	private $name;
	private $price;
	private $category;
	private $productImage;

	public function __construct(
		int $id,
		string $pid,
		string $name,
		float $price,
		string $category,
		string $productImage
	) {
		$this->name = $name;
		$this->setId( $id );
		$this->pid          = $pid;
		$this->price        = $price;
		$this->category     = $category;
		$this->productImage = $productImage;
	}

	public function getPid(): string {
		return $this->pid;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getPrice(): float {
		return $this->price;
	}

	public function getCategory(): string {
		return $this->category;
	}

	public function getProductImage(): string {
		return $this->productImage;
	}
}
