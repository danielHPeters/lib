<?php

namespace rafisa\lib\chat;

use rafisa\lib\entities\Entity;
use rafisa\lib\entities\User;
use rafisa\lib\session\Session;

/**
 * Class Client.
 *
 * @package rafisa\lib\chat
 * @author  Daniel Peters
 * @version 1.0
 */
class Client extends Entity {
	private $user;
	private $session;
	private $message;

	/**
	 * Client constructor.
	 *
	 * @param $user
	 * @param $session
	 * @param $message
	 */
	public function __construct( User $user, Session $session, Message $message ) {
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
