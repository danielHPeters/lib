<?php

namespace lib\model\chat;

use DateTimeImmutable;
use Exception;
use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;
use lib\model\entity\User;

/**
 * Class Group.
 *
 * @package lib\model\chat
 * @author Daniel Peters
 * @version 1.0
 */
class Group extends Entity {
  private $members;
  private $admins;
  private $chat;

  public function __construct (
    string $id,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->members = new ArrayList();
    $this->admins = new ArrayList();
    $this->chat = new ArrayList();
  }

  /**
   * @param User $user
   *
   * @throws Exception
   */
  public function kickUser (User $user): void {
    $userIn = $this->members->contains($user);

    if ($userIn) {
      $key = $this->members->indexOf($user);
      $this->members->remove($key);

      if ($this->admins->contains($user)) {
        $key = $this->admins->indexOf($user);
        $this->admins->remove($key);
      }
    } else {
      throw new Exception('User not Found');
    }
  }

  public function getMembers (): Collection {
    return $this->members;
  }

  public function getAdmins (): Collection {
    return $this->admins;
  }

  public function getChat (): ArrayList {
    return $this->chat;
  }
}
