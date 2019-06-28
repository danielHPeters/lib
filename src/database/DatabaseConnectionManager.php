<?php

namespace lib\database;

/**
 * Interface DatabaseConnectionManager.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
interface DatabaseConnectionManager {
  public function getClient (string $clientClass): Client;
}
