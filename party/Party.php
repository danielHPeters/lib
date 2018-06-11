<?php

namespace rafisa\lib\party;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\Collection;

/**
 * Class Party.
 *
 * @package rafisa\lib\party
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
