<?php

namespace rafisa\lib\entities;

use DateTime;

/**
 * Description of Person
 *
 * @author  Daniel
 * @version 28.04.2017
 * @package rafisa\lib\entities
 */
class Person extends Entity
{
    /**
     *
     * @var string
     */
    private $lastName;

    /**
     *
     * @var string
     */
    private $firstName;

    /**
     *
     * @var string
     */
    private $title;

    /**
     *
     * @var DateTime
     */
    private $birthDate;

    /**
     *
     * @var string
     */
    private $email;

    /**
     *
     * @param string $lastName
     * @param string $firstName
     * @param string $title
     * @param string $birthDate
     * @param string $email
     */
    public function __construct(string $lastName, string $firstName, string $title, string $birthDate, string $email)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->title = $title;
        $this->birthDate = new DateTime($birthDate);
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     *
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    /**
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     *
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     *
     * @param DateTime $birthDate
     */
    public function setBirthDate(DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->birthDate->diff(new DateTime())->y;
    }
}
