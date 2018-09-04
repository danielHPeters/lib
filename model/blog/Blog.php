<?php

namespace lib\model\blog;

use DateTimeImmutable;
use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;

/**
 * Class Blog.
 *
 * @package lib\model\blog
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Blog extends Entity {
  private $posts;
  private $users;

  public function __construct (
    string $id,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
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
