<?php

namespace rafisa\lib\accounting;

use rafisa\lib\entities\Entity;

/**
 * Description of Address.
 *
 * @author Daniel Peters
 * @version 1.0
 */
class Address extends Entity {
	private $street;
	private $number;
	private $city;
	private $zip;
	private $state;
	private $country;
	private $type;

	public function __construct(
		string $street,
		string $number,
		string $city,
		string $zip,
		string $state,
		string $country,
		string $type
	) {
		$this->street  = $street;
		$this->number  = $number;
		$this->city    = $city;
		$this->zip     = $zip;
		$this->state   = $state;
		$this->country = $country;
		$this->type    = $type;
	}

	public function getStreet(): string {
		return $this->street;
	}

	public function getNumber(): string {
		return $this->number;
	}

	public function getCity(): string {
		return $this->city;
	}

	public function getZip(): string {
		return $this->zip;
	}

	public function getState(): string {
		return $this->state;
	}

	public function getCountry(): string {
		return $this->country;
	}

	public function getType(): string {
		return $this->type;
	}
}
