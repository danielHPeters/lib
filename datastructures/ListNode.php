<?php

namespace rafisa\lib\data;

/**
 * Description of ListNode
 *
 * @author Daniel
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
