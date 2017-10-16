<?php

namespace rafisa\lib\database;

use PDO;

/**
 * Description of Connection
 *
 * @author  d.peters
 * @version 1.0
 */
class Connection extends PDO
{
    /**
     *
     * @param string          $driver
     * @param DbConfiguration $config
     * @param array           $options
     */
    public function __construct(string $driver, DbConfiguration $config, array $options = null)
    {
        $dsn = $driver . ':host=' . $config->getHost() . ';dbname=' . $config->getDb() . ';charset=utf8';
        parent::__construct($dsn, $config->getUser(), $config->getPassword(), $options);
    }
}
