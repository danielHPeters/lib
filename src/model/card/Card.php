<?php

namespace lib\model\card;

use DateTimeImmutable;
use lib\entity\Entity;

/**
 * Class Card.
 *
 * @package lib\model\card
 * @author Daniel Peters
 * @version 1.0
 */
class Card extends Entity {
  /**
   * @var string
   */
  private $color;
  /**
   * @var string
   */
  private $value;

  public function __construct (
    string $id,
    string $color,
    string $value,
    DateTimeImmutable $createdAt,
    DateTimeImmutable $updatedAt,
    DateTimeImmutable $deletedAt
  ) {
    parent::__construct($id, $createdAt, $updatedAt, $deletedAt);
    $this->color = $color;
    $this->value = $value;
  }

  public function getColor (): string {
    return $this->color;
  }

  public function getValue (): string {
    return $this->value;
  }
}
