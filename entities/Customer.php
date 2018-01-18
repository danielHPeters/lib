<?php

namespace rafisa\lib\entities;

use rafisa\lib\accounting\Address;

/**
 * Description of Customer
 *
 * @author Daniel
 */
class Customer extends Person
{
    /**
     *
     * @var Address
     */
    private $address;

    /**
     *
     * @param string  $name
     * @param string  $firstName
     * @param string  $title
     * @param string  $birthDate
     * @param string  $email
     * @param Address $address
     */
    public function __construct(
        string $name,
        string $firstName,
        string $title,
        string $birthDate,
        string $email,
        Address $address
    ) {
        parent::__construct($name, $firstName, $title, $birthDate, $email);
        $this->address = $address;
    }
}
