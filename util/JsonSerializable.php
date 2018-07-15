<?php

namespace lib\util;

use Serializable;

/**
 * Interface Jsonable.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
interface JsonSerializable extends Serializable {
  /**
   * Convert object to JSON string.
   *
   * @return string JSON string of object.
   */
  public function json (): string;
}
