<?php

namespace lib\database;

use InvalidArgumentException;
use lib\collection\Map;

/**
 * Class Connection.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
class DatabaseConnectionManagerBasic implements DatabaseConnectionManager {
  /**
   * @var Configuration
   */
  private $config;
  /**
   * @var array
   */
  private $options;
  /**
   * @var Map
   */
  private $cache;

  public function __construct (Configuration $config, array $options = []) {
    $this->config = $config;
    $this->options = $options;
  }

  /**
   * @param string $clientClass
   *
   * @return Client
   * @throws InvalidArgumentException
   */
  public function getClient (string $clientClass): Client {
    $adapter = new $clientClass($this->config, $this->options);

    if (!($adapter instanceof Client)) {
      throw new InvalidArgumentException('Parameter class must be of type Client!');
    }

    return $adapter;
  }
}
