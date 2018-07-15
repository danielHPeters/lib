<?php

namespace lib\model\entity;

use DateTime;
use lib\entity\Entity;

/**
 * Class Person.
 *
 * @package lib\model\entity
 * @author Daniel Peters
 * @version 1.0
 */
class Person extends Entity {
  private $lastName;
  private $firstName;
  private $title;
  private $birthDate;
  private $email;

  public function __construct (string $id, string $lastName, string $firstName, string $title, string $birthDate, string $email) {
    parent::__construct($id);
    $this->lastName = $lastName;
    $this->firstName = $firstName;
    $this->title = $title;
    $this->birthDate = new DateTime($birthDate);
    $this->email = $email;
  }

  public function getLastName (): string {
    return $this->lastName;
  }

  public function getFirstName (): string {
    return $this->firstName;
  }

  public function getTitle (): string {
    return $this->title;
  }

  public function getBirthDate (): DateTime {
    return $this->birthDate;
  }

  public function getEmail (): string {
    return $this->email;
  }

  public function getAge (): int {
    return $this->birthDate->diff(new DateTime())->y;
  }
}
