<?php

namespace rafisa\lib\data;

use rafisa\lib\collections\IList;
use rafisa\lib\collections\Queue;
use Exception;

/**
 * Description of SinglyList
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\collections
 */
class SinglyList implements Queue, IList
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
        foreach ($arr as $object) {
            $this->add($object);
        }
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
        $this->head = null;
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
     * @throws Exception
     */
    public function get(int $index)
    {
        $current = $this->head;

        if ($this->elementsCount === 0 || $index < 0 || $index > $this->elementsCount) {
            throw new Exception('Invalid index!');
        }

        for ($i = 0; $i < $index; $i++) {
            $current = $current->getNext();
        }

        return $current;
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
        $node = $this->head;
        $this->head = $this->head->getNext();

        return $node;
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
        $node = new ListNode($object);
        $currentNode = $this->head;

        if ($this->elementsCount === 0) {
            $this->head = $node;
        } else {
            while ($currentNode->hasNext()) {
                $currentNode = $currentNode->getNext();
            }
            $currentNode->setNext($node);
        }
        $this->elementsCount++;
    }
}
