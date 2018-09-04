<?php

namespace lib\util;

use function in_array;

/**
 * Wrapper class for array functions.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Arr {
  final public static function contains ($needle, array $haystack, bool $strict = false): bool {
    return in_array($needle, $haystack, $strict);
  }
}
