<?php

namespace lib\util\logger;

use DateTimeImmutable;
use Exception;
use lib\file\Path;

/**
 * Class ApplicationLogger.
 *
 * @package lib\util\logger
 * @author  Daniel Peters
 * @version 1.0
 */
class ApplicationLogger extends Logger {
  const LOG_DATE_FORMAT = 'D, d M Y H:i:s O';
  /**
   * @var Path
   */
  private $file;

  /**
   * ApplicationLogger constructor.
   *
   * @param string $logLevel
   * @param string $logDestination
   *
   * @throws Exception
   */
  public function __construct (string $logLevel, string $logDestination) {
    parent::__construct($logLevel, $logDestination);
    $this->file = Path::createFileFromUri($logDestination);
  }

  /**
   * @param string $message
   *
   * @throws Exception
   */
  public function log (string $message): void {
    $now = new DateTimeImmutable();
    $dateString = $now->format(self::LOG_DATE_FORMAT);
    $this->file->open(Path::MODE_APPEND);
    $this->file->append("[$dateString][$this->logLevel] " . $message);
    $this->file->close();
  }
}
