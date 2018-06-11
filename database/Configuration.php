<?php

namespace rafisa\lib\database;

/**
 * Class Configuration.
 *
 * @package rafisa\lib\database
 * @author Daniel Peters
 * @version 1.0
 */
class Configuration {
	private $host;
	private $db;
	private $user;
	private $password;
	private $port;

	public function __construct( string $host, string $db, string $user, string $password, int $port ) {
		$this->host     = $host;
		$this->db       = $db;
		$this->user     = $user;
		$this->password = $password;
		$this->port     = $port;
	}

	public function getHost(): string {
		return $this->host;
	}

	public function getDb(): string {
		return $this->db;
	}

	public function getUser(): string {
		return $this->user;
	}

	public function getPassword(): string {
		return $this->password;
	}

	public function getPort(): int {
		return $this->port;
	}
}
