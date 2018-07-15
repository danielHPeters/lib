<?php

namespace lib\util;

/**
 * Class System.
 *
 * @package lib\util
 * @author Daniel Peters
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
    $_SERVER['SERVER_PROTOCOL'] ? print "$string<br>" : print "$string\n";
  }

  final public static function flush (): void {
    flush();
  }
}
