<?php

namespace lib\database;

use lib\util\Enum;

/**
 * Class Sql.
 *
 * @package lib\database
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Sql extends Enum {
  const WHERE = 'WHERE';
  const HAVING = 'HAVING';
  const INSERT_INTO = 'INSERT INTO';
  const ORDER_BY = 'ORDER BY';
  const LIMIT = 'LIMIT';
  const OFFSET = 'OFFSET';
  const AS_ = 'AS';
  const SELECT = 'SELECT';
}
