<?php

namespace rafisa\lib\socket;

use rafisa\lib\util\Enum;

/**
 * Description of SocketDomains
 *
 * @package rafisa\lib\socket
 * @author Daniel Peters
 * @version 1.0
 */
abstract class SocketDomain extends Enum {
	const IPV4 = AF_INET;
	const IPV6 = AF_INET6;
	const LOCAL = AF_UNIX;
}
