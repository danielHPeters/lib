<?php

namespace lib\util;

use Exception;
use function assert;
use function bin2hex;
use function chr;
use function ord;
use function random_bytes;
use function str_split;
use function strlen;
use function vsprintf;

/**
 * Class Uuid.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Uuid {
  /**
   * Based on https://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid#answer-15875555 .
   * Credits to stackoverflow user 1338292/ja͢ck
   *
   * @param mixed $data random bytes data with length 16 (If left empty the php7 random_bytes function will be used)
   *
   * @return string Generated uuid
   * @throws Exception When failed to generate cryptographic data
   */
  static function randomV4 ($data = null): string {
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
}
