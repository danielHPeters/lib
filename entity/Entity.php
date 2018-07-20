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

  /**
   * Entity constructor.
   *
   * @param string $id
   * @param DateTimeImmutable $createdAt
   * @param DateTimeImmutable $updatedAt
   * @param DateTimeImmutable $deletedAt
   */
  public function __construct(
    string $id,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    $this->id        = $id;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
    $this->deletedAt = $deletedAt;
  }

  /**
   * @return string
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * @return DateTimeImmutable
   */
  public function getCreatedAt(): DateTimeImmutable {
    return $this->createdAt;
  }

  /**
   * @return DateTimeImmutable
   */
  public function getUpdatedAt(): DateTimeImmutable {
    return $this->updatedAt;
  }

  /**
   * @return DateTimeImmutable
   */
  public function getDeletedAt(): DateTimeImmutable {
    return $this->deletedAt;
  }

  /**
   * Get all attributes as an array.
   *
   * @return array
   */
  public function jsonSerialize(): array {
    $array = get_object_vars($this);
    foreach ($array as &$value) {
      if ($value instanceof Entity) {
        $value = $value->jsonSerialize();
      }
    }

    return $array;
  }
}
