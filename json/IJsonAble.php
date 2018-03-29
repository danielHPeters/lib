<?php

namespace rafisa\lib\json;

/**
 * Interface IJsonAble
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\json
 */
interface IJsonAble
{
    /**
     * Convert object to JSON string.
     *
     * @return string JSON string of object.
     */
    public function toJson(): string ;
}
