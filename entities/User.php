<?php

namespace rafisa\lib\entities;

use DateTime;

/**
 * Class User.
 *
 * @package rafisa\lib\entities
 * @author Daniel Peters
 * @version 1.0
 */
class User extends Person {
	private $username;
	private $password;
	private $rememberMe;

	public function __construct(
		string $lastName,
		string $firstName,
		string $title,
		DateTime $birthDate,
		string $email,
		string $username,
		string $password
	) {
		parent::__construct( $lastName, $firstName, $title, $birthDate, $email );
		$this->password = $password;
		$this->username = $username;
	}

	public function getUsername(): string {
		return $this->username;
	}

	public function getPassword(): string {
		return $this->password;
	}

	public function rememberMesIsSet(): bool {
		return $this->rememberMe;
	}

	public function setUsername( string $username ) {
		$this->username = $username;
	}

	public function setPassword( string $password ) {
		$this->password = $password;
	}

	public function setRememberMe( bool $rememberMe ) {
		$this->rememberMe = $rememberMe;
	}
}
