<?php

namespace rafisa\lib\socket;

/**
 * Description of SocketProtocols.
 *
 * @package rafisa\lib\socket
 * @author Daniel Peters
 * @version 1.0
 */
class SocketProtocol {
	final public static function ICMP(): int {
		return getprotobyname( 'icmp' );
	}

	final public static function UDP(): int {
		return getprotobyname( 'udp' );
	}

	final public static function TCP(): int {
		return getprotobyname( 'tcp' );
	}
}
