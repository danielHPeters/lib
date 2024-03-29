<?php

namespace lib\database;

/**
 * Interface Client which defines the CRUD and connection methods.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
interface Client {
  /**
   * @throws DatabaseException
   */
  public function connect (): Client;

  public function close (): void;

  public function query (string $query): Client;

  public function fetch ();

  public function fetchArray (): array;

  public function prepare (string $query): Client;

  public function bindParam (string $placeholder, string $data): Client;

  public function execute (): Client;

  /**
   * Generate and execute a select statement.
   *
   * @param  string  $table
   * @param  string  $conditions
   * @param  string  $fields
   * @param  string  $order
   * @param  string  $limit
   * @param  string  $offset
   */
  public function select (
    string $table,
    string $fields = '*',
    string $conditions = null,
    string $order = null,
    string $limit = null,
    string $offset = null
  );

  /**
   * Generate and execute an insert statement.
   *
   * @param  string  $table  the table to be affected
   * @param  array  $data  associative array with key as col and value as content
   */
  public function insert (string $table, array $data): void;

  /**
   * Generate and execute an update statement.
   *
   * @param  string  $table
   * @param  array  $data  associative array with key as col and value as content
   * @param  string  $conditions
   */
  public function update (string $table, array $data, string $conditions): void;

  /**
   * Generate and execute a delete statement.
   *
   * @param  string  $table
   * @param  string  $conditions
   */
  public function delete (string $table, string $conditions): void;
}
