<?php

namespace lib\database;

use InvalidArgumentException;

/**
 * Class Connection.
 *
 * @package lib\database
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class DatabaseConnectionManagerBasic implements DatabaseConnectionManager {
  /**
   * @var string
   */
  private $driver;
  /**
   * @var Configuration
   */
  private $config;
  private $options;

  public function __construct (string $driver, Configuration $config, array $options = null) {
    $this->driver = $driver;
    $this->config = $config;
    $this->options = $options;
  }

  /**
   * @param string $adapterClass
   *
   * @return Adapter
   * @throws InvalidArgumentException
   */
  public function getAdapter (string $adapterClass): Adapter {
    $adapter = new $adapterClass($this->driver, $this->config, $this->options);

    if ( ! ($adapter instanceof Adapter)) {
      throw new InvalidArgumentException('Parameter class reference must be of type string!');
    }

    return $adapter;
  }
}
