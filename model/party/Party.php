<?php

namespace lib\model\party;

use lib\collection\ArrayList;
use lib\collection\Collection;

/**
 * Class Party.
 *
 * @package lib\model\party
 * @author Daniel Peters
 * @version 1.0
 */
class Party {
	private $guests;

	public function __construct() {
		$this->guests = new ArrayList();
	}

	public function getGuests(): Collection {
		return $this->guests;
	}
}
