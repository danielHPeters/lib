<?php

namespace rafisa\lib\chat;

use rafisa\lib\entities\User;
use rafisa\lib\entities\Entity;

/**
 * Class Message.
 *
 * @package rafisa\lib\chat
 * @author  Daniel Peters
 * @version 1.0
 */
class Message extends Entity {
	private $author;
	private $recipient;
	private $contents;

	public function __construct( string $id, User $author, User $recipient, string $contents ) {
		$this->setId( $id );
		$this->author    = $author;
		$this->recipient = $recipient;
		$this->contents  = $contents;
	}

	public function getContents(): string {
		return $this->contents;
	}
}
