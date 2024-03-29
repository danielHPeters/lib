<?php

namespace lib\database;

/**
 * QueryBuilder class.
 *
 * @package lib\database
 * @author  Daniel Peters
 * @version 1.0
 */
class QueryBuilder {
  public static function createSchemaDiffQuery (string $db1, string $db2, string $table) {
    return
      "SELECT `column_name` FROM (
      SELECT `column_name`, COUNT(1) `rowcount`
      FROM `information_schema`.`columns`
      WHERE
      (
        (`table_schema`='$db1' AND `table_name`='$table') OR
        (`table_schema`='$db2' AND `table_name`='$table')
      )
      GROUP BY `column_name`
      HAVING COUNT(1)=1
    ) AS `a`;";
  }
}
