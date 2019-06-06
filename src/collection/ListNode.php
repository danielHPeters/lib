<?php

namespace lib\collection;

/**
 * Class ListNode.
 *
 * @package lib\collection
 * @author Daniel Peters
 * @version 1.0
 */
class ListNode {
  /**
   * @var
   */
  private $value;
  /**
   * @var ListNode
   */
  private $next;
  /**
   * @var ListNode
   */
  private $previous;

  public function __construct ($value) {
    $this->value = $value;
    $this->next = null;
    $this->previous = null;
  }

  public function hasNext (): bool {
    return $this->next !== null;
  }

  public function getValue () {
    return $this->value;
  }

  public function setValue ($value): void {
    $this->value = $value;
  }

  public function getPrevious (): ListNode {
    return $this->previous;
  }

  public function getNext (): ListNode {
    return $this->next;
  }

  public function setNext (ListNode $next): void {
    $this->next = $next;
  }

  public function setPrevious (ListNode $previous): void {
    $this->previous = $previous;
  }
}
