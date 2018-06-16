<?php

namespace lib\model\accounting;

use lib\model\entity\Entity;

/**
 * Class Address.
 *
 * @package lib\model\accounting
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
		string $id,
		string $street,
		string $number,
		string $city,
		string $zip,
		string $state,
		string $country,
		string $type
	) {
		parent::__construct( $id );
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
