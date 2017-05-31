<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\util;

/**
 * Description of Array
 *
 * @author d.peters
 */
abstract class Arr {

    /**
     * 
     * @param type $needle
     * @param type $haystack
     * @param type $strict
     * @return type
     */
    public static final function contains($needle, array $haystack, bool $strict = false) {
        return in_array($needle, $haystack, $strict);
    }

}
