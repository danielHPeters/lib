<?php

namespace rafisa\lib\collections;

/**
 * Interface IQueue
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\collections
 */
interface IQueue
{
    /**
     * @return mixed
     */
    public function poll();

    /**
     * @return mixed
     */
    public function peek();

    /**
     * @param $object
     * @return mixed
     */
    public function add($object);
}
