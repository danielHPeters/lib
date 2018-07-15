<?php

namespace lib\model\game\place;

use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;

/**
 * Class Room.
 *
 * @package lib\model\game\place
 * @author Daniel Peters
 * @version 1.0
 */
class Room extends Entity {
  private $name;
  private $description;
  private $north;
  private $east;
  private $south;
  private $west;
  private $items;
  private $monsters;

  public function __construct (string $id, string $name, string $description) {
    parent::__construct($id);
    $this->name = $name;
    $this->description = $description;
    $this->items = new ArrayList();
    $this->monsters = new ArrayList();
  }

  public function getName (): string {
    return $this->name;
  }

  public function getDescription (): string {
    return $this->description;
  }

  public function getItems (): Collection {
    return $this->items;
  }

  public function getMonsters (): Collection {
    return $this->monsters;
  }

  public function getNorth (): Room {
    return $this->north;
  }

  public function getEast (): Room {
    return $this->east;
  }

  public function getSouth (): Room {
    return $this->south;
  }

  public function getWest (): Room {
    return $this->west;
  }
}
