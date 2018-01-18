<?php

namespace rafisa\lib\util;

use ReflectionClass;

/**
 * Description of Enum
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class Enum
{

    /**
     *
     * @var array
     */
    private static $constantsCache = null;

    /**
     *
     * @return array
     */
    private static function getConstants(): array
    {
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

    public static function isValidKey($key): bool
    {
        $constants = self::getConstants();

        return array_key_exists($key, $constants);
    }

    /**
     *
     * @param mixed $value
     * @param mixed $strict
     *
     * @return bool
     */
    public static function isValidValue($value, $strict = true): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }
}
