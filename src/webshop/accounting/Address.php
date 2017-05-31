<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\webshop\accounting;

use rafisa\lib\src\entities\Entity;

/**
 * Description of Address
 *
 * @author Daniel
 */
class Address extends Entity {

    /**
     *
     * @var string 
     */
    private $street;

    /**
     *
     * @var string 
     */
    private $number;

    /**
     *
     * @var string 
     */
    private $city;

    /**
     *
     * @var string 
     */
    private $zip;

    /**
     *
     * @var string 
     */
    private $state;

    /**
     *
     * @var string 
     */
    private $country;

    /**
     *
     * @var string 
     */
    private $type;

    /**
     * 
     * @param string $street
     * @param string $number
     * @param string $city
     * @param string $zip
     * @param string $state
     * @param string $country
     * @param string $type
     */
    public function __construct(string $street, string $number, string $city, string $zip, string $state, string $country, string $type) {
        $this->street = $street;
        $this->number = $number;
        $this->city = $city;
        $this->zip = $zip;
        $this->state = $state;
        $this->country = $country;
        $this->type = $type;
    }

    /**
     * 
     * @return string
     */
    public function getStreet(): string {
        return $this->street;
    }

    /**
     * 
     * @return string
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * 
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * 
     * @return string
     */
    public function getZip(): string {
        return $this->zip;
    }

    /**
     * 
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * 
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * 
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * 
     * @param string $street
     */
    public function setStreet(string $street) {
        $this->street = $street;
    }

    /**
     * 
     * @param string $number
     */
    public function setNumber(string $number) {
        $this->number = $number;
    }

    /**
     * 
     * @param string $city
     */
    public function setCity(string $city) {
        $this->city = $city;
    }

    /**
     * 
     * @param string $zip
     */
    public function setZip(string $zip) {
        $this->zip = $zip;
    }

    /**
     * 
     * @param string $state
     */
    public function setState(string $state) {
        $this->state = $state;
    }

    /**
     * 
     * @param string $country
     */
    public function setCountry(string $country) {
        $this->country = $country;
    }

    /**
     * 
     * @param string $type
     */
    public function setType(string $type) {
        $this->type = $type;
    }

}
