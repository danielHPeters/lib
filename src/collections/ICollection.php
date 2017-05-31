<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\collections;

/**
 * Description of ICollection
 *
 * @author d.peters
 */
interface ICollection {

    /**
     * 
     * @param mixed $obj
     */
    public function add($obj);

    /**
     * 
     * @param array $arr
     */
    public function addAll(array $arr);

    /**
     * 
     * @param int $key
     * @return mixed
     */
    public function get(int $key);

    /**
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Check if collection has key
     * @param int $key
     * @return bool
     */
    public function has(int $key): bool;

    /**
     * 
     * @param mixed $obj
     * @return bool
     */
    public function contains($obj): bool;

    /**
     * 
     * @param mixed $obj
     * @return int
     */
    public function indexOf($obj): int;

    /**
     * Empty the collection
     */
    public function clear();

    /**
     * 
     * @param mixed $obj
     * @return int
     */
    public function lastIndexOf($obj): int;

    /**
     * 
     * @param int $key
     */
    public function remove(int $key);

    /**
     * 
     * @param int $fromKey
     * @param int $toKey
     */
    public function removeRange(int $fromKey, int $toKey);

    /**
     * @return int
     */
    public function size(): int;

    /**
     * @param bool $reverse
     * @return mixed
     */
    public function sort(bool $reverse);

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * 
     * @param mixed $obj
     * @return bool
     */
    public function isInteger($obj): bool;
}
