<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\database;

/**
 * Interface for database adapter which defines the CRUD and connection methods
 * @author d.peters
 */
interface IAdapter {

    /**
     * Connect to the db
     */
    public function connect();

    /**
     * Close the db connection
     */
    public function close();
    
    /**
     * Execute query
     * 
     * @param string $query
     */
    public function query(string $query);
    
    /**
     * 
     */
    public function fetch();
    
    /**
     * Generate and execute a select statement
     * 
     * @param string $table
     * @param string $conditions
     * @param string $fields
     * @param string $order
     * @param string $limit
     * @param string $offset
     */
    public function select(string $table, string $conditions = '',
            string $fields = '*', string $order = '', string $limit = NULL,
            string $offset = NULL);
    
    /**
     * Generate and execute an insert statement
     * @param string $table the table to be affected
     * @param array $data associative array with key as col and value as content
     */
    public function insert(string $table, array $data);
    
    /**
     * Generate and execute an update statement
     * @param string $table
     * @param array $data associative array with key as col and value as content
     * @param string $conditions
     */
    public function update(string $table, array $data, string $conditions);
    
    /**
     * Generate and execute a delete statement
     * @param string $table
     * @param string $conditions
     */
    public function delete(string $table, string $conditions);
}
