<?php

namespace lib\model\notes;

use DateTimeImmutable;
use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;
use lib\model\entity\User;

/**
 * Class PinBoard.
 *
 * @package lib\model\notes
 * @author Daniel Peters
 * @version 1.0
 */
class PinBoard extends Entity {
  private $notes;
  private $owner;

  public function __construct (
    string $id,
    User $owner,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->notes = new ArrayList();
    $this->owner = $owner;
  }

  public function getNotes (): Collection {
    return $this->notes;
  }

  public function getOwner (): User {
    return $this->owner;
  }
}
