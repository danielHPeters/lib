<?php

namespace rafisa\lib\entities;

use rafisa\lib\accounting\Address;

/**
 * Class Customer.
 *
 * @package rafisa\lib\entities
 * @author Daniel Peters
 * @version 1.0
 */
class Customer extends Person {
	private $address;

	public function __construct(
		string $name,
		string $firstName,
		string $title,
		string $birthDate,
		string $email,
		Address $address
	) {
		parent::__construct( $name, $firstName, $title, $birthDate, $email );
		$this->address = $address;
	}
}
