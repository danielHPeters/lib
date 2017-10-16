<?php

namespace rafisa\lib\util;

/**
 * Description of Array
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class Arr
{
    /**
     *
     * @param mixed $needle
     * @param mixed $haystack
     * @param mixed $strict
     *
     * @return bool
     */
    final public static function contains($needle, array $haystack, bool $strict = false) : bool
    {
        return in_array($needle, $haystack, $strict);
    }

}
