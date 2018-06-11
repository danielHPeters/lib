<?php

namespace rafisa\lib\blog;

use rafisa\lib\entities\Entity;

/**
 * Description of Post.
 *
 * @author  Daniel Peters
 * @version 1.0
 */
class Post extends Entity {
	private $author;
	private $contents;
	private $timestamp;

	/**
	 * Post constructor.
	 *
	 * @param string $id
	 * @param string $author
	 * @param string $contents
	 * @param int $timestamp
	 */
	public function __construct( string $id, string $author, string $contents, int $timestamp ) {
		$this->setId( $id );
		$this->author    = $author;
		$this->contents  = $contents;
		$this->timestamp = $timestamp;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getContents(): string {
		return $this->contents;
	}

	public function getTimestamp(): int {
		return $this->timestamp;
	}
}
