<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Class RoutesConfig
 * @package rafisa\lib\src\routing
 */
abstract class RoutesConfig {

    /**
     *
     * @var array 
     */
    private static $registry = [];

    /**
     * 
     * @param type $key
     * @param type $value
     */
    public static function set($key, $value) {
        self::$registry[$key] = $value;
    }

    /**
     * 
     * @param string $key
     * @return boolean
     */
    public static function get(string $key) {
        if (array_key_exists($key, self::$registry)) {
            return self::$registry[$key];
        }
        return false;
    }

}
