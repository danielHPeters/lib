<?php

namespace lib\file;

use Exception;
use function fclose;
use function fopen;
use function fwrite;
use const PHP_EOL;

/**
 * Class FileReader.
 *
 * @package lib\file
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class FileHandler {
  /**
   * @var string
   */
  private $file;
  /**
   * @var resource
   */
  private $filePointer;

  public function __construct (string $file) {
    $this->file = $file;
  }

  public function open (string $mode) {
    $this->filePointer = fopen($this->file, $mode);
  }

  public function writeLn (string $data) {
    if (is_resource($this->filePointer)) {
      fwrite($this->filePointer, $data . PHP_EOL);
    } else {
      throw new Exception('Attempt to open closed file ' . $this->file);
    }
  }

  public function appendText () {
  }

  public function read () {
  }

  public function close () {
    fclose($this->filePointer);
  }
}
