<?php

namespace rafisa\lib\blog;

use rafisa\lib\collections\Collection;
use rafisa\lib\collections\ArrayList;

/**
 * Description of Blog.
 *
 * @author Daniel Peters
 * @version 1.0
 */
class Blog {
	private $posts;
	private $users;

	public function __construct() {
		$this->posts = new ArrayList();
		$this->users = new ArrayList();
	}

	public function getPosts(): Collection {
		return $this->posts;
	}

	public function getUsers(): Collection {
		return $this->users;
	}
}
