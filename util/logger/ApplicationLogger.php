<?php

namespace lib\util\logger;

use DateTimeImmutable;
use Exception;
use lib\file\Path;

class ApplicationLogger extends Logger {
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
  function __construct (string $logLevel, string $logDestination) {
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
    $dateString = $now->format(DATE_RSS);
    $this->file->open('a');
    $this->file->append("[$dateString][$this->logLevel] " . $message);
    $this->file->close();
  }
}