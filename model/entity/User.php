<?php

namespace lib\model\entity;

use DateTime;

/**
 * Class User.
 *
 * @package lib\model\entity
 * @author Daniel Peters
 * @version 1.0
 */
class User extends Person {
  private $username;
  private $password;
  private $rememberMe;

  public function __construct (
    string $id,
    string $lastName,
    string $firstName,
    string $title,
    DateTime $birthDate,
    string $email,
    string $username,
    string $password
  ) {
    parent::__construct($id, $lastName, $firstName, $title, $birthDate, $email);
    $this->password = $password;
    $this->username = $username;
  }

  public function getUsername (): string {
    return $this->username;
  }

  public function getPassword (): string {
    return $this->password;
  }

  public function rememberMesIsSet (): bool {
    return $this->rememberMe;
  }

  public function setUsername (string $username): void {
    $this->username = $username;
  }

  public function setPassword (string $password): void {
    $this->password = $password;
  }

  public function setRememberMe (bool $rememberMe): void {
    $this->rememberMe = $rememberMe;
  }
}
