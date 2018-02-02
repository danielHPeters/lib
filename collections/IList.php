<?php

namespace rafisa\lib\collections;

/**
 * Interface IList
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\collections
 */
interface IList extends ICollection
{
    /**
     * @param int $index
     * @return mixed
     */
    public function set(int $index);

    /**
     * @param int $index
     * @return mixed
     */
    public function get(int $index);

    /**
     * @param int $index
     * @return mixed
     */
    public function removeAt(int $index);
}
