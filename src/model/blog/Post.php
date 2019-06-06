<?php

namespace lib\model\blog;

use DateTimeImmutable;
use lib\entity\Entity;

/**
 * Class Post.
 *
 * @package lib\model\blog
 * @author Daniel Peters
 * @version 1.0
 */
class Post extends Entity {
  private $author;
  private $contents;
  private $timestamp;

  public function __construct (
    string $id,
    string $author,
    string $contents,
    int $timestamp,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->author = $author;
    $this->contents = $contents;
    $this->timestamp = $timestamp;
  }

  public function getAuthor () {
    return $this->author;
  }

  public function getContents (): string {
    return $this->contents;
  }

  public function getTimestamp (): int {
    return $this->timestamp;
  }
}
