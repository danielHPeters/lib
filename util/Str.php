<?php

namespace rafisa\lib\util;

/**
 * Description of Str
 *
 * @author d.peters
 */
abstract class Str
{
    final public static function substring($string, $start): string
    {
        return substr($string, $start);
    }
}
