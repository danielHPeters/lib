<?php

namespace lib\model\game\item;

use lib\entity\Entity;
use lib\model\game\item\action\ItemAction;

/**
 * Class Item.
 *
 * @package lib\model\game\item
 * @author Daniel Peters
 * @version 1.0
 */
class Item extends Entity {
  private $name;
  private $description;
  private $price;
  private $action;

  public function __construct (string $id, string $name, string $description, float $price, ItemAction $action) {
    parent::__construct($id);
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->action = $action;
  }

  public function getName (): string {
    return $this->name;
  }

  public function getDescription (): string {
    return $this->description;
  }

  public function getPrice (): float {
    return $this->price;
  }

  public function doUse (): void {
    $this->action->doUse();
  }
}
