<?php

namespace lib\database;

/**
 * QueryBuilder class.
 *
 * @package lib\database
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class QueryBuilder {
  public static function createSchemaDiffQuery ($db1, $db2, $table) {
    return
      "SELECT column_name FROM (
      SELECT
        column_name,
        COUNT(1) rowcount
      FROM information_schema.columns
      WHERE
      (
        (table_schema='$db1' AND table_name='$table') OR
        (table_schema='$db2' AND table_name='$table')
      )
      GROUP BY
          column_name
      HAVING COUNT(1)=1
    ) AS `a`;";
  }
}
