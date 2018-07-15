<?php

namespace lib\model\blog;

use lib\collection\Collection;
use lib\collection\ArrayList;
use lib\entity\Entity;

/**
 * Class Blog.
 *
 * @package lib\model\blog
 * @author Daniel Peters
 * @version 1.0
 */
class Blog extends Entity {
  private $posts;
  private $users;

  public function __construct (string $id) {
    parent::__construct($id);
    $this->posts = new ArrayList();
    $this->users = new ArrayList();
  }

  public function getPosts (): Collection {
    return $this->posts;
  }

  public function getUsers (): Collection {
    return $this->users;
  }
}
