<?php

namespace rafisa\lib\routing;

/**
 * Class RoutesConfig
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
 */
abstract class RoutesConfig
{
    /**
     *
     * @var array
     */
    private static $registry = [];

    /**
     *
     * @param string $key
     * @param mixed  $value
     */
    public static function set($key, $value)
    {
        self::$registry[$key] = $value;
    }

    /**
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get(string $key)
    {
        return array_key_exists($key, self::$registry) ? self::$registry[$key] : null;
    }
}
