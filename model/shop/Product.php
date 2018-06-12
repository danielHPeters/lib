<?php

namespace rafisa\lib\model\shop;

use rafisa\lib\model\entity\Entity;

/**
 * Class Product.
 *
 * @package rafisa\lib\model\shop
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
		parent::__construct( $id );
		$this->name         = $name;
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
