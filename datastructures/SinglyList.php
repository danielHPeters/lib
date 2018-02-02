<?php

namespace rafisa\lib\data;

use rafisa\lib\collections\IList;
use rafisa\lib\collections\IQueue;

/**
 * Description of SinglyList
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\collections
 */
class SinglyList implements IQueue, IList
{
    /**
     *
     * @var ListNode
     */
    private $head;

    /**
     *
     * @var int
     */
    private $elementsCount;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->head = null;
        $this->elementsCount = 0;
    }

    /**
     *
     * @return int
     */
    public function size(): int
    {
        return $this->elementsCount;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->elementsCount === 0;
    }

    /**
     *
     * @param array $arr
     */
    public function addAll(array $arr)
    {
        // TODO: Implement addAll() method.
    }

    /**
     * Check if collection has key
     * @param int $key
     * @return bool
     */
    public function has(int $key): bool
    {
        // TODO: Implement has() method.
    }

    /**
     *
     * @param mixed $obj
     * @return bool
     */
    public function contains($obj): bool
    {
        // TODO: Implement contains() method.
    }

    /**
     *
     * @param mixed $obj
     * @return int
     */
    public function indexOf($obj): int
    {
        // TODO: Implement indexOf() method.
    }

    /**
     * Empty the collection
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     *
     * @param mixed $obj
     * @return int
     */
    public function lastIndexOf($obj): int
    {
        // TODO: Implement lastIndexOf() method.
    }

    /**
     *
     * @param int $key
     */
    public function remove(int $key)
    {
        // TODO: Implement remove() method.
    }

    /**
     *
     * @param int $fromKey
     * @param int $toKey
     */
    public function removeRange(int $fromKey, int $toKey)
    {
        // TODO: Implement removeRange() method.
    }

    /**
     * @param bool $reverse
     * @return mixed
     */
    public function sort(bool $reverse)
    {
        // TODO: Implement sort() method.
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    /**
     *
     * @param mixed $obj
     * @return bool
     */
    public function isInteger($obj): bool
    {
        // TODO: Implement isInteger() method.
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function set(int $index)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function get(int $index)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function removeAt(int $index)
    {
        // TODO: Implement removeAt() method.
    }

    /**
     * @return mixed
     */
    public function poll()
    {
        // TODO: Implement poll() method.
    }

    /**
     * @return mixed
     */
    public function peek()
    {
        // TODO: Implement peek() method.
    }

    /**
     * @param $object
     * @return mixed
     */
    public function add($object)
    {
        // TODO: Implement add() method.
    }
}
