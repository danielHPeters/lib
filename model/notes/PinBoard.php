<?php

namespace rafisa\lib\model\notes;

use rafisa\lib\collection\ArrayList;
use rafisa\lib\collection\Collection;
use rafisa\lib\model\entity\Entity;
use rafisa\lib\model\entity\User;

/**
 * Class PinBoard.
 *
 * @package rafisa\lib\model\notes
 * @author Daniel Peters
 * @version 1.0
 */
class PinBoard extends Entity {
	private $notes;
	private $owner;

	public function __construct( string $id, User $owner ) {
		parent::__construct( $id );
		$this->notes = new ArrayList();
	}

	public function getNotes(): Collection {
		return $this->notes;
	}

	public function getOwner(): User {
		return $this->owner;
	}
}
