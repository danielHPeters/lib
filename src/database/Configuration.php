<?php

namespace lib\database;

/**
 * Class Configuration.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
class Configuration {
  /**
   * @var string
   */
  private $driver;
  /**
   * @var string
   */
  private $host;
  /**
   * @var string
   *
   */
  private $db;
  /**
   * @var string
   */
  private $user;
  /**
   * @var string
   */
  private $password;
  /**
   * @var int
   */
  private $port;
  /**
   * @var string
   */
  private $charset;

  public function __construct (string $driver, string $host, string $db, string $user, string $password, int $port, string $charset) {
    $this->driver = $driver;
    $this->host = $host;
    $this->db = $db;
    $this->user = $user;
    $this->password = $password;
    $this->port = $port;
    $this->charset = $charset;
  }

  public function getDriver (): string {
    return $this->driver;
  }

  public function getHost (): string {
    return $this->host;
  }

  public function getDb (): string {
    return $this->db;
  }

  public function getUser (): string {
    return $this->user;
  }

  public function getPassword (): string {
    return $this->password;
  }

  public function getPort (): int {
    return $this->port;
  }

  public function getCharset (): string {
    return $this->charset;
  }
}