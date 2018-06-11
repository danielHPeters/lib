<?php

namespace rafisa\lib\shop;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\Collection;

/**
 * Class Cart
 *
 * @package rafisa\lib\shop
 * @author Daniel Peteers
 * @version 1.0
 */
class Cart {
	private $products;

	public function __construct() {
		$this->products = new ArrayList();
	}

	public function getProducts(): Collection {
		return $this->products;
	}
}
