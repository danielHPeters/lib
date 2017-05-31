<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\database;

use InvalidArgumentException;
use RuntimeException;

/**
 *
 */
class MysqlAdapter implements IAdapter
{

    /**
     *
     * @var DbConfiguration
     */
    private $config;

    /**
     *
     * @var mixed
     */
    private $link;

    /**
     *
     * @var mixed
     */
    private $result;

    /**
     * Constructor.
     * @param DbConfiguration $config
     */
    public function __construct(DbConfiguration $config)
    {
        $this->config = $config;
    }

    /**
     * Connect to the database
     */
    public function connect()
    {

        // Only one connection
        if ($this->link === null) {
            $this->link = mysqli_connect($this->config->getHost(), $this->config->getUser(), $this->config->getPassword(), $this->config->getDb());
        }

        if (!$this->link) {
            throw new RuntimeException('Failed to connect to server' .
                mysqli_connect_error());
        }
    }

    /**
     * Close the connection
     */
    public function close()
    {

        if ($this->link !== NULL) {
            mysqli_close($this->link);
        }
    }

    /**
     * @param string $query
     * @return bool|mixed|\mysqli_result
     */
    public function query(string $query)
    {

        if (empty($query)) {
            throw new InvalidArgumentException('The query string is empty!');
        }

        $this->result = mysqli_query($this->link, $query);

        if (!$this->result) {
            throw new RuntimeException(
                'Error executing query ' . $query . mysqli_error($this->link)
            );
        }

        return $this->result;
    }

    /**
     * Generate and execute a select query
     *
     * @param string $table the table to be queried
     * @param string $fields attributes to be selected (default is *)
     * @param string $conditions WHERE conditionws
     * @param string $order ordering criteria
     * @param string $limit limit
     * @param string $offset offset
     * @return int
     */
    public function select(string $table, string $fields = '*', string $conditions = null, string $order = null, string $limit = null, string $offset = null): int
    {

        $query = 'SELECT ' . $fields . ' FROM ' . $table .
            (($conditions) ? ' WHERE ' . $conditions : '') .
            (($limit) ? ' LIMIT ' . $limit : '') .
            (($offset && $limit) ? ' OFFSET ' . $offset : '') .
            (($order) ? ' ORDER BY ' . $order : '');

        $this->query($query);

        return $this->countRows();
    }

    /**
     *
     * @param string $table
     * @param array $data
     * @return mixed
     */
    public function insert(string $table, array $data)
    {

        $fields = implode(',', array_keys($data));
        $values = implode($table, $data);

        $query = 'INSERT INTO ' . $table . ' (' . $fields . ') ' .
            'VALUES (' . $values . ')';
        $this->query($query);

        return $this->getInsertId();
    }

    /**
     * Perform update operation on a table with conditions
     *
     * @param string $table
     * @param array $data
     * @param string $conditions
     * @return int number of affected rows
     */
    public function update(string $table, array $data, string $conditions)
    {

        $set = [];

        foreach ($data as $field => $value) {
            $set[] = $field . '=' . $value;
        }

        $set = implode(',', $set);

        $query = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $conditions;

        $this->query($query);

        return $this->getAffectedRows();
    }

    /**
     * Perform delete operations with conditions.
     *
     * @param string $table
     * @param string $conditions
     * @return int number of affected rows
     */
    public function delete(string $table, string $conditions): int
    {

        $query = 'DELETE FROM ' . $table .
            (($conditions) ? ' WHERE ' . $conditions : '');

        $this->query($query);

        return $this->getAffectedRows();
    }

    /**
     * @return bool
     */
    public function fetch()
    {
        return $this->result !== null ? mysqli_fetch_assoc($this->result) : null;
    }

    /**
     * @return int|null|string
     */
    public function getInsertId()
    {
        return $this->link !== null ? mysqli_insert_id($this->link) : null;
    }

    /**
     * Get the number of affected rows. Returns 0 as default
     * @return int
     */
    public function countRows(): int
    {
        return $this->result !== null ? mysqli_num_rows($this->result) : 0;
    }

    /**
     *
     * @return int
     */
    public function getAffectedRows(): int
    {
        return $this->link !== null ? mysqli_affected_rows($this->link) : 0;
    }

    /**
     * Free the result set
     */
    public function freeResult()
    {

        if ($this->result !== null) {
            mysqli_free_result($this->result);
        }
    }

    /**
     * Automatically close connection on destruction of this adapter
     */
    public function __destruct()
    {
        $this->close();
    }

}
