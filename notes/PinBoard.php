<?php

namespace rafisa\lib\notes;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\Collection;
use rafisa\lib\entities\User;

/**
 * Class PinBoard.
 *
 * @package rafisa\lib\notes
 * @author Daniel Peters
 * @version 1.0
 */
class PinBoard {
	private $notes;
	private $owner;

	public function __construct( User $owner ) {
		$this->notes = new ArrayList();
	}

	public function getNotes(): Collection {
		return $this->notes;
	}

	public function getOwner(): User {
		return $this->owner;
	}
}
