<?php

namespace lib\collection;

use ArrayAccess;
use Exception;
use function array_search;
use function array_unshift;
use function array_values;

/**
 * Class Stack.
 *
 * @package lib\collection
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Stack implements ArrayAccess {
  /**
   * @var array
   */
  private $arr;

  public function push ($obj): void {
    array_unshift($this->arr, $obj);
  }

  /**
   * Returns and removes the top item of this stack.
   *
   * @return mixed Topmost item in the stack
   * @throws Exception If the stack is empty
   */
  public function pop () {
    if ($this->isEmpty()) {
      throw new Exception("The Stack is already empty.");
    }
    $top = $this->arr[0];
    unset($this->arr[0]);
    $this->arr = array_values($this->arr);

    return $top;
  }

  public function peek () {
    return $this->arr[0];
  }

  /**
   * @param $obj
   *
   * @return int The index of the first occurrence of the object or -1 if not in this ArrayList
   */
  public function indexOf ($obj): int {
    $search = array_search($obj, $this->arr);

    return $search !== false ? $search : -1;
  }

  /**
   * Check if this stack is empty.
   *
   * @return bool
   */
  public function isEmpty (): bool {
    return empty($this->items);
  }

  public function offsetExists ($offset): bool {
    // TODO: Complete implementation
    return false;
  }

  public function offsetGet ($offset) {

  }

  public function offsetSet ($offset, $value) {

  }

  public function offsetUnset ($offset) {

  }
}
