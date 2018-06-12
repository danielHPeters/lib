<?php

namespace rafisa\lib\util;

/**
 * Interface Jsonable.
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\util
 */
interface Jsonable
{
    /**
     * Convert object to JSON string.
     *
     * @return string JSON string of object.
     */
    public function toJson(): string ;
}
