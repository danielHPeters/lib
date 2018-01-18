<?php

namespace rafisa\lib\entities;

use DateTime;

/**
 * Description of User
 *
 * @author  d.peters
 * @version 1.0
 */
class User extends Person
{
    /**
     *
     * @var string
     */
    private $username;

    /**
     *
     * @var string
     */
    private $password;

    /**
     *
     * @var bool
     */
    private $rememberMe;

    /**
     *
     * @param string   $lastName
     * @param string   $firstName
     * @param string   $title
     * @param DateTime $birthDate
     * @param string   $email
     * @param string   $username
     * @param string   $password
     */
    public function __construct(
        string $lastName,
        string $firstName,
        string $title,
        DateTime $birthDate,
        string $email,
        string $username,
        string $password
    ) {
        parent::__construct($lastName, $firstName, $title, $birthDate, $email);
        $this->password = $password;
        $this->username = $username;
    }

    /**
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function rememberMesIsSet(): bool
    {
        return $this->rememberMe;
    }

    /**
     *
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     *
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setRememberMe(bool $rememberMe)
    {
        $this->rememberMe = $rememberMe;
    }
}
