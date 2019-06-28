<?php

namespace lib\model\chat;

use DateTimeImmutable;
use lib\entity\Entity;
use lib\model\entity\User;
use lib\session\Session;

/**
 * Class MongoClient.
 *
 * @package lib\model\chat
 * @author Daniel Peters
 * @version 1.0
 */
class Client extends Entity {
  /**
   * @var User
   */
  private $user;
  /**
   * @var Session
   */
  private $session;
  /**
   * @var Message
   */
  private $message;

  public function __construct (
    string $id,
    User $user,
    Session $session,
    Message $message,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->user = $user;
    $this->session = $session;
    $this->message = $message;
  }

  public function getUser (): User {
    return $this->user;
  }

  public function getSession (): Session {
    return $this->session;
  }

  public function getMessage (): Message {
    return $this->message;
  }
}
