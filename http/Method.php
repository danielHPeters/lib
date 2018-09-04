<?php

namespace lib\http;

use lib\util\Enum;

/**
 * Class Method.
 *
 * @package lib\http
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class Method extends Enum {
  const GET = 'GET';
  const HEAD = 'HEAD';
  const POST = 'POST';
  const PUT = 'PUT';
  const DELETE = 'DELETE';
  const CONNECT = 'CONNECT';
  const OPTIONS = 'OPTIONS';
  const TRACE = 'TRACE';
  const PATCH = 'PATCH';
}
