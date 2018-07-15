<?php

namespace lib\util\socket;

use lib\util\Enum;

/**
 * Enum class SocketTypes.
 *
 * @package lib\util\socket
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Type extends Enum {
  const STREAM = SOCK_STREAM;
  const DATAGRAM = SOCK_DGRAM;
  const SEQ_PACKET = SOCK_SEQPACKET;
  const RAW = SOCK_RAW;
  const RDM = SOCK_RDM;
}
