<?php

namespace lib\model\card;

use lib\entity\Entity;

/**
 * Class Card.
 *
 * @package lib\model\card
 * @author Daniel Peters
 * @version 1.0
 */
class Card extends Entity {
  private $color;
  private $value;

  public function __construct (string $id, string $color, string $value) {
    parent::__construct($id);
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
