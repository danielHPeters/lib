<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\util;

/**
 * Description of Enum
 *
 * @author d.peters
 */
abstract class Enum {

    /**
     *
     * @var array 
     */
    private static $constantsCache = null;

    /**
     * 
     * @return type
     */
    private static function getConstants() {

        if (self::$constantsCache == null) {
            self::$constantsCache = [];
        }

        $calledClass = get_called_class();

        if (!array_key_exists($calledClass, self::$constantsCache)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constantsCache[$calledClass] = $reflect->getConstants();
        }

        return self::$constantsCache[$calledClass];
    }

    public static function isValidKey($key) {

        $constants = self::getConstants();

        return array_key_exists($key, $constants);
    }

    /**
     * 
     * @param type $value
     * @param type $strict
     * @return types
     */
    public static function isValidValue($value, $strict = true) {

        $values = array_values(self::getConstants());

        return in_array($value, $values, $strict);
    }

}
