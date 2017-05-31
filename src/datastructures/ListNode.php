<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\datastructures;

/**
 * Description of ListNode
 *
 * @author Daniel
 */
class ListNode {

    private $value;

    /**
     *
     * @var ListNode 
     */
    private $next;

    /**
     * 
     * @param type $value
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * 
     * @return ListNode
     */
    public function getNext(): ListNode {
        return $this->next;
    }

    /**
     * 
     * @return type
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * 
     * @param ListNode $next
     */
    public function setNext(ListNode $next) {
        $this->next = $next;
    }
    
    /**
     * 
     * @return bool
     */
    public function hasNext() : bool {
        return $this->next !== null ? true : false;
    }

}
