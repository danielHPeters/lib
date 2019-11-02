<?php

namespace lib\database;

use lib\collection\Collection;
use lib\entity\Entity;

/**
 * Interface Mapper.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
interface ActiveRecord {
  public static function findById (int $id): ActiveRecord;

  /**
   * @param  string  $conditions
   * @return ActiveRecord[]
   */
  public static function find (string $conditions = '');

  public function insert ();

  public function update ();

  public function delete ();
}
