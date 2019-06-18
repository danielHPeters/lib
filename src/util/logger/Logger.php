<?php

namespace lib\util\logger;

use function realpath;

/**
 * Class Logger.
 *
 * @package lib\util\logger
 * @author  Daniel Peters
 * @version 1.0
 */
abstract class Logger {
  /**
   * @var array
   */
  private static $instances = [];
  /**
   * @var string
   */
  protected $logLevel;
  /**
   * @var string
   */
  protected $logDestination;

  protected function __construct (string $logLevel, string $logDestination) {
    $this->logLevel = $logLevel;
    $this->logDestination = $logDestination;
  }

  abstract function log (string $message);

  public static function getLogger (string $loggerClass, string $level, string $destination): Logger {
    if (!isset(self::$instances[$loggerClass])) {
      self::$instances[$loggerClass] = new $loggerClass($level, $destination);
    }

    return self::$instances[$loggerClass];
  }
}
