<?php

namespace lib\model\entity;

use lib\model\accounting\Address;

/**
 * Class Customer.
 *
 * @package lib\model\entity
 * @author Daniel Peters
 * @version 1.0
 */
class Customer extends Person {
	private $address;

	public function __construct(
		string $id,
		string $name,
		string $firstName,
		string $title,
		string $birthDate,
		string $email,
		Address $address
	) {
		parent::__construct( $id, $name, $firstName, $title, $birthDate, $email );
		$this->address = $address;
	}

	public function getAddress(): Address {
		return $this->address;
	}
}
