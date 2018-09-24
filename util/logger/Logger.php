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
  private $logLevel;
  private $logDestination;

  abstract function log ();
}
