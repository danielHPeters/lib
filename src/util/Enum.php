<?php

namespace lib\util;

use ReflectionClass;
use ReflectionException;
use function array_key_exists;
use function array_values;
use function get_called_class;
use function in_array;

/**
 * Class Enum.
 *
 * @package lib\util
 * @author  Daniel Peters
 * @version 1.0
 */
abstract class Enum {
  private static $constantsCache = null;

  /**
   * @return array
   * @throws ReflectionException
   */
  private static function getConstants (): array {
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

  /**
   * @param $key
   *
   * @return bool
   * @throws ReflectionException
   */
  public static function isValidKey ($key): bool {
    $constants = self::getConstants();

    return array_key_exists($key, $constants);
  }

  /**
   * @param $value
   * @param bool $strict
   *
   * @return bool
   * @throws ReflectionException
   */
  public static function isValidValue ($value, $strict = true): bool {
    $values = array_values(self::getConstants());

    return in_array($value, $values, $strict);
  }
}
