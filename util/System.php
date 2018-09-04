<?php

namespace lib\util;

use lib\html\Tag;
use function flush;
use function print_r;
use function var_dump;
use const PHP_EOL;

/**
 * Class System.
 *
 * @package lib\util
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class System {
  /**
   * Print variable in human readable form.
   *
   * @param mixed $var
   * @param bool $return
   */
  final public static function pretty ($var, bool $return = false): void {
    print_r($var, $return);
  }

  /**
   * Dump variable and it's contents.
   *
   * @param mixed $var
   */
  final public static function dump ($var): void {
    var_dump($var);
  }

  /**
   * @param string $string
   */
  final public static function println (string $string) {
    $_SERVER['SERVER_PROTOCOL'] ? print $string . '<' . Tag::BR . '>' : print $string . PHP_EOL;
  }

  final public static function flush (): void {
    flush();
  }
}
