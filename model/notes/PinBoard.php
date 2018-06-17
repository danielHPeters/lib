<?php

namespace lib\model\notes;

use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;
use lib\model\entity\User;

/**
 * Class PinBoard.
 *
 * @package lib\model\notes
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
