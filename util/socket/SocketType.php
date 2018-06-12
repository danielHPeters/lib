<?php

namespace rafisa\lib\util\socket;

use rafisa\lib\util\Enum;

/**
 * Description of SocketTypes.
 *
 * @package rafisa\lib\util\socket
 * @author Daniel Peters
 * @version 1.0
 */
abstract class SocketType extends Enum {
	const STREAM = SOCK_STREAM;
	const DATAGRAM = SOCK_DGRAM;
	const SEQ_PACKET = SOCK_SEQPACKET;
	const RAW = SOCK_RAW;
	const RDM = SOCK_RDM;
}
