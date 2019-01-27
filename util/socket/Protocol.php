<?php

namespace lib\util\socket;

use function getprotobyname;

/**
 * Class SocketProtocols.
 *
 * @package lib\util\socket
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Protocol {
  final public static function ICMP (): int {
    return getprotobyname('icmp');
  }

  final public static function UDP (): int {
    return getprotobyname('udp');
  }

  final public static function TCP (): int {
    return getprotobyname('tcp');
  }
}
