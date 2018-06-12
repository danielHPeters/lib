<?php

namespace rafisa\lib\model\party;

use rafisa\lib\collection\ArrayList;
use rafisa\lib\collection\Collection;

/**
 * Class Party.
 *
 * @package rafisa\lib\model\party
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
