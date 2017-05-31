<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\datastructures;

/**
 * Description of LinkedList
 *
 * @author Daniel
 */
class LinkedList {

    /**
     *
     * @var ListNode 
     */
    private $first;
    
    /**
     *
     * @var int 
     */
    private $size;

    /**
     * Constructor
     */
    public function __construct() {
        $this->first = null;
        $this->size = 0;
    }

    /**
     * 
     * @return int
     */
    public function getSize(): int {
        return $this->size;
    }

}
