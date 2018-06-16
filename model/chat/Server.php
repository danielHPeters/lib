<?php

namespace lib\model\chat;
use lib\collection\ArrayList;

/**
 * Class Server.
 *
 * @package lib\model\chat
 * @author  Daniel Peters
 * @version 1.0
 */
class Server {
	private $status;
	private $clients;

	public function __construct( ServerStatus $status ) {
		$this->clients = new ArrayList();
		$this->status  = $status;
	}

	public function getStatus(): ServerStatus {
		return $this->status;
	}

	public function setStatus( ServerStatus $status ): void {
		$this->status = $status;
	}

	public function getClients(): ArrayList {
		return $this->clients;
	}
}
