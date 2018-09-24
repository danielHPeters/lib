<?php

namespace lib\util\logger;

/**
 * Class Logger.
 *
 * @package lib\util\logger
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class Logger {
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
    return new $loggerClass($level, $destination);
  }
}
