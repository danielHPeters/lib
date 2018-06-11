<?php

namespace rafisa\lib\database;

use rafisa\lib\util\Enum;

/**
 * Description of AdapterType
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class AdapterType extends Enum {
	const PG = 'postgres';
	const MYSQL = 'mysql';
	const MS_SQL = 'mssql';
	const MONGO = 'mongodb';
	const ORACLE = 'oracle';
}
