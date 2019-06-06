<?php

namespace lib;

use function file_exists;
use function spl_autoload_register;
use function str_replace;

/**
 * Class LibraryLoader for this library.
 * Include this file in your main script.
 * Add <code>use lib\LibraryLoader</code> after the include.
 * The run <code>LibraryLoader->register()</code>
 *
 * @package lib
 * @author Daniel Peters
 * @version 1.0
 */
abstract class LibraryLoader {
  public static function register () {
    spl_autoload_register(function (string $class) {
      $file = __DIR__ . '/' . str_replace(['lib/', '\\'], ['', '/'], $class) . '.php';

      if (file_exists($file)) {
        require $file;
      }
    });
  }
}
