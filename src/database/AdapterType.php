<?php

namespace lib\database;

use lib\util\Enum;

/**
 * Class AdapterType.
 *
 * @package lib\database
 * @author Daniel Peters
 * @version 1.0
 */
abstract class AdapterType extends Enum {
  const PG = 'postgres';
  const MYSQL = 'mysql';
  const MS_SQL = 'mssql';
  const MONGO = 'mongodb';
  const ORACLE = 'oracle';
}
