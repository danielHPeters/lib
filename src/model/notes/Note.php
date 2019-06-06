<?php

namespace lib\model\notes;

use DateTimeImmutable;
use lib\entity\Entity;

/**
 * Class Note.
 *
 * @package lib\model\notes
 * @author Daniel Peters
 * @version 1.0
 */
class Note extends Entity implements Sendable {
  private $author;
  private $recipient;
  private $content;

  public function __construct (
    string $id,
    string $author,
    string $recipient,
    string $content,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->author = $author;
    $this->recipient = $recipient;
    $this->content = $content;
  }

  public function send (): void {
    // TODO: Implement send() method.
  }

  public function getAuthor (): string {
    return $this->author;
  }

  public function getRecipient (): string {
    return $this->recipient;
  }

  public function getContent (): string {
    return $this->content;
  }
}
