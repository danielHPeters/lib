<?php

namespace lib\database;

use PDO;
use PDOException;
use PDOStatement;
use InvalidArgumentException;

/**
 * Class PDOAdapter.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
class PDOAdapter implements Adapter {
  /**
   * @var Configuration
   */
  private $config;
  /**
   * @var
   */
  private $options;
  /**
   * @var PDO
   */
  private $connection;

  /**
   * @var PDOStatement
   */
  private $statement;

  public function __construct (Configuration $config, $options) {
    $this->config = $config;
    $this->options = $options;
  }

  /**
   * @throws DatabaseException
   */
  public function connect (): Adapter {
    try {
      if ($this->connection === null) {
        $dsn = $this->config->getDriver()
          . ':host=' . $this->config->getHost()
          . ';dbname=' . $this->config->getDb()
          . ';charset=' . $this->config->getCharset();
        $this->connection = new PDO($dsn, $this->config->getUser(), $this->config->getPassword(), $this->options);
      }
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to open database connection.', 0, $e);
    }

    return $this;
  }

  public function close (): void {
    $this->connection = null;
  }

  /**
   * @param string $query
   *
   * @return Adapter reference to $this to allow chaining of method calls
   * @throws InvalidArgumentException
   * @throws DatabaseException
   */
  public function query (string $query): Adapter {
    if (empty($query)) {
      throw new InvalidArgumentException('The query string is empty!');
    }
    try {
      $this->statement = $this->connection->query($query);
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to execute query: ' . $query);
    }

    return $this;
  }

  /**
   * @param string $message
   *
   * @throws DatabaseException
   */
  private function throwErrorOnFalseStatement ($message) {
    if ( ! $this->statement) {
      throw new DatabaseException($message);
    }
  }

  /**
   * @return mixed
   * @throws DatabaseException
   */
  public function fetch () {
    $this->throwErrorOnFalseStatement('Invalid statement when trying to fetch a row.');

    return $this->statement->fetch(PDO::FETCH_OBJ);
  }

  /**
   * @return array
   * @throws DatabaseException
   */
  public function fetchArray (): array {
    $data = null;
    try {
      $this->throwErrorOnFalseStatement('Invalid statement when trying to fetch all rows as array.');
      $data = $this->statement->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to fetch data.');
    }

    return $data;
  }

  /**
   * @param string $query
   *
   * @return Adapter
   * @throws DatabaseException
   */
  public function prepare (string $query): Adapter {
    try {
      $this->statement = $this->connection->prepare($query);
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to prepare query: ' . $query . ' ' . $e);
    }

    return $this;
  }

  /**
   * @param string $placeholder
   * @param string $data
   *
   * @return Adapter
   * @throws DatabaseException
   */
  public function bindParam (string $placeholder, string $data): Adapter {
    try {
      $this->throwErrorOnFalseStatement('Trying to bind parameters on an invalid statement.');
      $this->statement->bindParam($placeholder, $data);
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to bind params to statement.' . $e);
    }

    return $this;
  }

  /**
   * @return $this
   * @throws DatabaseException
   */
  public function execute (): Adapter {
    try {
      $this->throwErrorOnFalseStatement('Failed to execute sta');
      $this->statement->execute();
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to execute prepared statement. ' . $e);
    }

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
  public function select (string $table,
                          string $fields = '*',
                          string $conditions = null,
                          string $order = null,
                          string $limit = null,
                          string $offset = null) {
    // TODO: Implement select() method.
  }

  /**
   * Generate and execute an insert statement.
   *
   * @param string $table the table to be affected
   * @param array $data associative array with key as col and value as content
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