<?php

namespace lib\http;

use lib\util\Enum;

/**
 * Enum class containing all http request methods for reference.
 * See https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html for more info about usage of individual http methods.
 *
 * @package lib\http
 * @author Daniel Peters
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
