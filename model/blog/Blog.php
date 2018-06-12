<?php

namespace rafisa\lib\model\blog;

use rafisa\lib\collection\Collection;
use rafisa\lib\collection\ArrayList;

/**
 * Class Blog.
 *
 * @package rafisa\lib\model\blog
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
