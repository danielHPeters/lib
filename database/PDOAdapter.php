<?php

namespace lib\database;

use PDO;
use PDOException;
use PDOStatement;
use InvalidArgumentException;

class PDOAdapter implements Adapter {
  /**
   * @var string
   */
  private $driver;
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

  public function __construct (string $driver, Configuration $config, $options) {
    $this->driver = $driver;
    $this->config = $config;
    $this->options = $options;
  }

  /**
   * @throws DatabaseException
   */
  public function connect (): Adapter {
    try {
      if ($this->connection === null) {
        $dsn = $this->driver
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
   * @throws DatabaseException
   */
  private function throwErrorOnFalseStatement () {
    if ( ! $this->statement) {
      throw new DatabaseException();
    }
  }

  /**
   * @return mixed
   * @throws DatabaseException
   */
  public function fetch () {
    $this->throwErrorOnFalseStatement();
    return $this->statement->fetch(PDO::FETCH_OBJ);
  }

  /**
   * @return array
   * @throws DatabaseException
   */
  public function fetchArray (): array {
    $data = null;
    try {
      $this->throwErrorOnFalseStatement();
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
      $this->throwErrorOnFalseStatement();
      $this->statement = $this->connection->prepare($query);
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to prepare query: ' . $query, 0, $e);
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
      $this->throwErrorOnFalseStatement();
      $this->statement->bindParam($placeholder, $data);
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to execute prepared statement.', 0, $e);
    }

    return $this;
  }

  /**
   * @return $this
   * @throws DatabaseException
   */
  public function execute (): Adapter {
    try {
      $this->throwErrorOnFalseStatement();
      $this->statement->execute();
    } catch (PDOException $e) {
      throw new DatabaseException('Failed to execute prepared statement.', 0, $e);
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