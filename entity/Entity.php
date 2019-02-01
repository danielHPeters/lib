<?php

namespace lib\entity;

use DateTimeImmutable;
use JsonSerializable;

/**
 * Class Entity.
 *
 * @package lib\entity
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Entity implements JsonSerializable {
  /**
   * @var string
   */
  protected $id;
  /**
   * @var DateTimeImmutable
   */
  protected $createdAt;
  /**
   * @var DateTimeImmutable
   */
  protected $updatedAt;
  /**
   * @var DateTimeImmutable
   */
  protected $deletedAt;

  public function __construct (
    string $id,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    $this->id = $id;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
    $this->deletedAt = $deletedAt;
  }

  public function getId (): string {
    return $this->id;
  }

  public function getCreatedAt (): DateTimeImmutable {
    return $this->createdAt;
  }

  public function getUpdatedAt (): DateTimeImmutable {
    return $this->updatedAt;
  }

  public function getDeletedAt (): DateTimeImmutable {
    return $this->deletedAt;
  }

  public function jsonSerialize (): array {
    $array = get_object_vars($this);
    foreach ($array as &$value) {
      if ($value instanceof Entity) {
        $value = $value->jsonSerialize();
      }
    }

    return $array;
  }
}
