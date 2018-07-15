<?php

namespace lib\collection;

/**
 * Class HashMap.
 *
 * @package lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
class HashMap implements Map {
  private $arr;

  public function __construct () {
    $this->arr = [];
  }

  public function get ($key) {
    return isset($this->arr[$key]) ? $this->arr[$key] : null;
  }

  public function has (): bool {
  }

  public function indexOf ($obj): int {
  }

  public function isEmpty (): bool {
    return empty($this->arr);
  }

  public function put ($key, $value) {
    $this->arr[$key] = $value;
  }

  public function size (): int {
    return count($this->arr);
  }

  public function sort (bool $reverse = false) {
    if ($reverse) {
      rsort($this->arr);
    } else {
      sort($this->arr);
    }
  }

  public function toArray (): array {
    return $this->arr;
  }
}
