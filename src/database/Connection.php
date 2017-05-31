<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\database;

use PDO;

/**
 * Description of DbConnection
 *
 * @author d.peters
 */
class Connection extends PDO {

    /**
     * 
     * @param string $driver
     * @param DbConfiguration $config
     * @param array $options
     */
    public function __construct(string $driver, DbConfiguration $config, array $options = null) {

        $dsn = $driver . ':host=' . $config->getHost() . ';dbname=' . $config->getDb() . ';charset=utf8';
        parent::__construct($dsn, $config->getUser(), $config->getPassword(), $options);
    }

}
