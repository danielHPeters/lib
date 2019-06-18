<?php

namespace lib\util;

/**
 * Enum class Charset.
 *
 * @package lib\util
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Charset extends Enum {
  const UTF_8 = 'utf-8';
  const UTF8 = 'utf8';
  const UTF8MB4 = 'utf8mb4';
}
