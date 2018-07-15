<?php

namespace lib\model\party;

use lib\collection\ArrayList;
use lib\collection\Collection;
use lib\entity\Entity;

/**
 * Class Party.
 *
 * @package lib\model\party
 * @author Daniel Peters
 * @version 1.0
 */
class Party extends Entity {
  private $guests;

  public function __construct (string $id) {
    parent::__construct($id);
    $this->guests = new ArrayList();
  }

  public function getGuests (): Collection {
    return $this->guests;
  }
}
