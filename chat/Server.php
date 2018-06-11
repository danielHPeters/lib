<?php

namespace rafisa\lib\chat;

/**
 * Class Server.
 *
 * @package rafisa\lib\chat
 * @author  Daniel Peters
 * @version 1.0
 */
class Server {
	private $connectedClients;
	private $status;

	public function __construct( Client $connectedClients, ServerStatus $status ) {
		$this->connectedClients = $connectedClients;
		$this->status           = $status;
	}
}
