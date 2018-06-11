<?php

namespace rafisa\lib\chat;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\Collection;
use rafisa\lib\entities\User;
use rafisa\lib\entities\Entity;
use Exception;

/**
 * Class Group
 *
 * @package rafisa\lib\chat
 * @author  Daniel Peters
 * @version 1.0
 */
class Group extends Entity {
	private $members;
	private $admins;
	private $chat;

	public function __construct( string $id ) {
		$this->setId( $id );
		$this->members = new ArrayList();
		$this->admins  = new ArrayList();
		$this->chat    = new ArrayList();
	}

	public function kickUser( User $user ) {
		$userIn = $this->members->contains( $user );

		if ( $userIn ) {
			$key = $this->members->indexOf( $user );
			$this->members->remove( $key );

			if ( $this->admins->contains( $user ) ) {
				$key = $this->admins->indexOf( $user );
				$this->admins->remove( $key );
			}
		} else {
			throw new Exception( 'User not Found' );
		}
	}

	public function getMembers(): Collection {
		return $this->members;
	}

	public function getAdmins(): Collection {
		return $this->admins;
	}
}
