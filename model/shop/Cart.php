<?php

namespace lib\model\shop;

use lib\collection\ArrayList;
use lib\collection\Collection;

/**
 * Class Cart.
 *
 * @package lib\model\shop
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
