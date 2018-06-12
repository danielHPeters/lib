<?php

namespace rafisa\lib\model\shop;

use rafisa\lib\collection\ArrayList;
use rafisa\lib\collection\Collection;

/**
 * Class Cart.
 *
 * @package rafisa\lib\model\shop
 * @author Daniel Peters
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
