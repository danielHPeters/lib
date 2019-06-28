<?php

namespace lib\database\mongodb;

use lib\database\Client;
use lib\database\Configuration;
use lib\database\DatabaseException;
use MongoDB\Driver\Manager;

class MongoClient implements Client {
  private $configuration;
  private $manager;

  public function __construct (Configuration $configuration, $options = []) {
    $this->configuration = $configuration;
    $this->manager = new Manager($configuration->getDriver() . '://' . $configuration->getHost());
  }

  /**
   * @throws DatabaseException
   */
  public function connect (): Client {
    return $this;
  }

  public function close (): void {
    // TODO: Implement close() method.
  }

  public function query (string $query): Client {
    return $this;
  }

  public function fetch () {
    // TODO: Implement fetch() method.
  }

  public function fetchArray (): array {
    return [];
  }

  public function prepare (string $query): Client {
    return $this;
  }

  public function bindParam (string $placeholder, string $data): Client {
    return $this;
  }

  public function execute (): Client {
    return $this;
  }

  /**
   * Generate and execute a select statement.
   *
   * @param string $table
   * @param string $conditions
   * @param string $fields
   * @param string $order
   * @param string $limit
   * @param string $offset
   */
  public function select (string $table, string $fields = '*', string $conditions = null, string $order = null, string $limit = null, string $offset = null) {
    // TODO: Implement select() method.
  }

  /**
   * Generate and execute an insert statement.
   *
   * @param string $table the table to be affected
   * @param array $data   associative array with key as col and value as content
   */
  public function insert (string $table, array $data) {
    // TODO: Implement insert() method.
  }

  /**
   * Generate and execute an update statement.
   *
   * @param string $table
   * @param array $data associative array with key as col and value as content
   * @param string $conditions
   *
   * @return int Number of affected rows
   */
  public function update (string $table, array $data, string $conditions): int {
    // TODO: Implement update() method.
  }

  /**
   * Generate and execute a delete statement.
   *
   * @param string $table
   * @param string $conditions
   */
  public function delete (string $table, string $conditions) {
    // TODO: Implement delete() method.
  }
}
