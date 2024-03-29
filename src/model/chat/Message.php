<?php

namespace lib\model\chat;

use DateTimeImmutable;
use lib\entity\Entity;
use lib\model\entity\User;

/**
 * Class Message.
 *
 * @package lib\model\chat
 * @author  Daniel Peters
 * @version 1.0
 */
class Message extends Entity {
  private $author;
  private $recipient;
  private $contents;

  public function __construct (
    string $id,
    User $author,
    User $recipient,
    string $contents,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->author = $author;
    $this->recipient = $recipient;
    $this->contents = $contents;
  }

  public function getAuthor (): User {
    return $this->author;
  }

  public function getRecipient (): User {
    return $this->recipient;
  }

  public function getContents (): string {
    return $this->contents;
  }
}
