<?php

namespace rafisa\lib\util\socket;

use Exception;

/**
 * Description of Socket.
 *
 * @package rafisa\lib\util\socket
 * @author Daniel Peters
 * @version 1.0
 */
class Socket {
	private $descriptor;

	/**
	 * Constructor.
	 *
	 * @param int $domain
	 * @param int $type
	 * @param int $protocol
	 *
	 * @throws Exception When failed to create socket
	 */
	public function __construct( int $domain, int $type, int $protocol = 0 ) {
		$this->descriptor = socket_create( $domain, $type, $protocol );

		if ( ! $this->descriptor ) {
			$this->handleError( 'Failed to create the socket' );
		}
	}

	private function handleError( string $message ) {
		$err = $this->getLastError();
		throw new Exception( $message . ': [' . $err['code'] . '] ' . $err['message'] );
	}

	private function getLastError(): array {
		$errCode = socket_last_error();
		$errMsg  = socket_strerror( $errCode );

		$err = [ 'code' => $errCode, 'message' => $errMsg ];

		return $err;
	}

	public function connectToRemote( string $address, int $port = 80 ) {
		$connected = socket_connect( $this->descriptor, $address, $port );

		if ( ! $connected ) {
			$this->handleError( 'Could not connect to ' . $address );
		}
	}

	public function bind( string $address = '127.0.0.1', int $port = 5000 ) {
		$bound = socket_bind( $this->descriptor, $address, $port );

		if ( ! $bound ) {
			$this->handleError( 'Failed to bind socket' );
		}
	}

	public function listen( int $backlog = 10 ) {
		socket_listen( $this->descriptor, $backlog );
	}

	public function send( $data, int $flags = 0 ) {
		$sent = socket_send( $this->descriptor, $data, strlen( $data ), $flags );

		if ( ! $sent ) {
			$this->handleError( 'Failed to send data' );
		}
	}

	/**
	 * Close the socket.
	 */
	public function close() {
		socket_close( $this->descriptor );
	}
}
