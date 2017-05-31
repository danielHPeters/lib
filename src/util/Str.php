<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\util;

/**
 * Description of Str
 *
 * @author d.peters
 */
abstract class Str {

    public static final function substring($string, $start): string {
        return substr($string, $start);
    }

}
