<?php

namespace lib\collection;

use Closure;
use Exception;

/**
 * Class SinglyList.
 *
 * @package lib\collection
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class SinglyList implements Queue, IList {
  /**
   * @var ListNode
   */
  private $head;
  /**
   * @var int
   */
  private $listSize;

  public function __construct () {
    $this->head = null;
    $this->listSize = 0;
  }

  public function size (): int {
    return $this->listSize;
  }

  public function isEmpty (): bool {
    return $this->listSize === 0;
  }

  public function addAll (array $arr): void {
    foreach ($arr as $object) {
      $this->add($object);
    }
  }

  /**
   * Check if collection has key
   *
   * @param int $key
   *
   * @return bool
   */
  public function has (int $key): bool {
    // TODO: Implement has() method.
  }

  /**
   *
   * @param mixed $obj
   *
   * @return bool
   */
  public function contains ($obj): bool {
    // TODO: Implement contains() method.
  }

  /**
   *
   * @param mixed $obj
   *
   * @return int
   */
  public function indexOf ($obj): int {
    // TODO: Implement indexOf() method.
  }

  /**
   * Empty the collection
   */
  public function clear (): void {
    $this->head = null;
  }

  /**
   *
   * @param mixed $obj
   *
   * @return int
   */
  public function lastIndexOf ($obj): int {
    // TODO: Implement lastIndexOf() method.
  }

  /**
   *
   * @param int $key
   */
  public function remove (int $key): void {
    // TODO: Implement remove() method.
  }

  /**
   *
   * @param int $fromKey
   * @param int $toKey
   */
  public function removeRange (int $fromKey, int $toKey): void {
    // TODO: Implement removeRange() method.
  }

  /**
   * @param bool $reverse
   *
   * @return mixed
   */
  public function sort (bool $reverse): void {
    // TODO: Implement sort() method.
  }

  /**
   * @return array
   */
  public function toArray (): array {
    // TODO: Implement toArray() method.
  }

  /**
   *
   * @param mixed $obj
   *
   * @return bool
   */
  public function isInteger ($obj): bool {
    // TODO: Implement isInteger() method.
  }

  /**
   * @param int $index
   *
   * @return mixed
   */
  public function set (int $index): void {
    // TODO: Implement set() method.
  }

  /**
   * @param int $index
   *
   * @return mixed
   * @throws Exception
   */
  public function get (int $index) {
    $current = $this->head;

    if ($this->listSize === 0 || $index < 0 || $index > $this->listSize) {
      throw new Exception('Invalid index!');
    }

    for ($i = 0; $i < $index; $i++) {
      $current = $current->getNext();
    }

    return $current;
  }

  /**
   * @param int $index
   *
   * @return mixed
   */
  public function removeAt (int $index): void {
    // TODO: Implement removeAt() method.
  }

  /**
   * @return mixed
   */
  public function poll () {
    $node = $this->head;
    $this->head = $this->head->getNext();

    return $node;
  }

  /**
   * @throws Exception
   */
  public function peek () {
    throw new Exception('TODO: Implement peek() method.');
  }

  public function add ($object): void {
    $node = new ListNode($object);

    if ($this->listSize === 0) {
      $this->head = $node;
    } else {
      $currentNode = $this->head;

      while ($currentNode->hasNext()) {
        $currentNode = $currentNode->getNext();
      }
      $currentNode->setNext($node);
    }
    $this->listSize++;
  }

  /**
   * @param Closure $predicate
   *
   * @return array
   * @throws Exception
   */
  public function filter (Closure $predicate): array {
    throw new Exception('TODO: Implement filter() method.');
  }

  /**
   * @param Closure $callback
   *
   * @return array
   * @throws Exception
   */
  public function map (Closure $callback): array {
    throw new Exception('TODO: Implement map() method.');
  }
}
