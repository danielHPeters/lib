<?php

namespace lib\util;

use Exception;
use function ob_end_clean;
use function ob_flush;
use function ob_get_contents;
use function ob_start;

/**
 * Wrapper class for output buffer.
 *
 * @package lib\util
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class OutputBuffer {
  final public static function start () {
    ob_start();
  }

  /**
   * Get contents of OutputBuffer.
   *
   * @return string
   * @throws Exception
   */
  final public static function getContents (): string {
    $cont = ob_get_contents();

    if ($cont === false) {
      throw new Exception('Cannot get contents from output buffer.');
    }

    return $cont;
  }

  /**
   * @throws Exception
   */
  final public static function endClean () {
    $success = ob_end_clean();

    if ( ! $success) {
      throw new Exception('Could not clean and close the output buffer.');
    }
  }

  final public static function flush () {
    ob_flush();
  }
}
