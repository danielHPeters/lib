<?php

namespace lib\database;

use PDO;

/**
 * Class Connection
 *
 *
 * @package lib\database
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Connection extends PDO {
  public function __construct (string $driver, Configuration $config, array $options = null) {
    $dsn = $driver . ':host=' . $config->getHost() . ';dbname=' . $config->getDb() . ';charset=' . $config->getCharset();
    parent::__construct($dsn, $config->getUser(), $config->getPassword(), $options);
  }
}
