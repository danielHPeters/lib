<?php

namespace lib\util;

use function sprintf;
use function substr;

/**
 * Wrapper for various string manipulation / output functions.
 *
 * @package lib\util
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class Str {
  final public static function substring (string $string, int $start): string {
    return substr($string, $start);
  }

  /**
   * Print
   *
   * @param string $str Formatted string
   * @param mixed $args Arguments array
   */
  final public static function printFormatted (string $str, $args = null): void {
    sprintf($str, $args);
  }
}
