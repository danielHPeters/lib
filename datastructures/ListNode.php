<?php

namespace rafisa\lib\data;

/**
 * Description of QueueNode
 *
 * @author Daniel Peters
 * @version 1.0
 */
class ListNode
{
    /**
     * @var mixed
     */
    private $value;

    /**
     *
     * @var ListNode
     */
    private $next;

    /**
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }

    /**
     *
     * @return ListNode
     */
    public function getNext(): ListNode
    {
        return $this->next;
    }

    /**
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     *
     * @param ListNode $next
     */
    public function setNext(ListNode $next)
    {
        $this->next = $next;
    }

    /**
     *
     * @return bool
     */
    public function hasNext(): bool
    {
        return $this->next !== null;
    }
}
