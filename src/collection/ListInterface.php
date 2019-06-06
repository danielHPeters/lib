<?php

namespace lib\collection;

/**
 * Interface ListInterface.
 *
 * @package lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
interface ListInterface extends Collection {
  public function set (int $index): void;

  public function get (int $index);

  public function removeAt (int $index): void;
}
