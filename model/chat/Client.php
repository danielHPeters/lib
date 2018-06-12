<?php

namespace rafisa\lib\model\chat;

use rafisa\lib\model\entity\Entity;
use rafisa\lib\model\entity\User;
use rafisa\lib\session\Session;

/**
 * Class Client.
 *
 * @package rafisa\lib\model\chat
 * @author Daniel Peters
 * @version 1.0
 */
class Client extends Entity {
	private $user;
	private $session;
	private $message;

	public function __construct( $id, User $user, Session $session, Message $message ) {
		parent::__construct( $id );
		$this->user    = $user;
		$this->session = $session;
		$this->message = $message;
	}

	public function getUser(): User {
		return $this->user;
	}

	public function getSession(): Session {
		return $this->session;
	}

	public function getMessage(): Message {
		return $this->message;
	}
}
