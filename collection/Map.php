<?php

namespace lib\collection;

/**
 * Interface Map.
 *
 * @package lib\collection
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
interface Map {
  public function put ($key, $value);

  public function get ($key);
}
