<?php

namespace lib\database;

use lib\util\Charset;

/**
 * Class Configuration.
 *
 * @package lib\database
 * @author  Daniel Peters
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

  /**
   * Configuration constructor.
   *
   * @param string $driver   Driver eg. mysql, postgresql etc.
   * @param string $host     Database server hostname eg. localhost
   * @param string $db       Database to be queried
   * @param string $user     Database user name
   * @param string $password Database user password
   * @param int $port        The port on which the database server listens
   * @param string $charset  Connection charset
   */
  public function __construct (
    string $driver,
    string $host,
    string $db,
    string $user,
    string $password,
    int $port,
    string $charset = Charset::UTF8MB4
  ) {
    $this->driver = $driver;
    $this->host = $host;
    $this->db = $db;
    $this->user = $user;
    $this->password = $password;
    $this->port = $port;
    $this->charset = $charset;
  }

  /**
   * @return string Current connection database driver
   */
  public function getDriver (): string {
    return $this->driver;
  }

  /**
   * @return string Current connection host
   */
  public function getHost (): string {
    return $this->host;
  }

  /**
   * @return string Current connection database
   */
  public function getDb (): string {
    return $this->db;
  }

  /**
   * @return string Current connection username
   */
  public function getUser (): string {
    return $this->user;
  }

  /**
   * @return string Current connection user password
   */
  public function getPassword (): string {
    return $this->password;
  }

  /**
   * @return int Current connection port
   */
  public function getPort (): int {
    return $this->port;
  }

  /**
   * @return string Current charset
   */
  public function getCharset (): string {
    return $this->charset;
  }
}
