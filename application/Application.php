<?php

namespace lib\application;

use lib\util\logger\LogLevel;

/**
 * Basic web application interface.
 *
 * @package lib\application
 * @author Daniel Peters
 * @version 1.0
 */
interface Application {
  public static function boot (): void;

  public static function log (string $message, LogLevel $level): void;
}
