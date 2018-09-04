<?php

namespace lib\database;

use lib\collection\Collection;
use lib\entity\Entity;

/**
 * Interface Mapper.
 *
 * @package lib\database
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
interface Mapper {
  public function findById (int $id): Entity;

  public function find (string $conditions = ''): Collection;

  public function insert (Entity $entity);

  public function update (Entity $entity);

  public function delete (Entity $entity);
}
