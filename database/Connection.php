<?php

namespace lib\database;

use PDO;

/**
 * Class Connection
 *
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
class Connection extends PDO {
	/**
	 *
	 * @param string $driver
	 * @param Configuration $config
	 * @param array $options
	 */
	public function __construct( string $driver, Configuration $config, array $options = null ) {
		$dsn = $driver . ':host=' . $config->getHost() . ';dbname=' . $config->getDb() . ';charset=utf8';
		parent::__construct( $dsn, $config->getUser(), $config->getPassword(), $options );
	}
}
