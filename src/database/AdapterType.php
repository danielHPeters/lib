<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\database;

use rafisa\lib\src\util\Enum;

/**
 * Description of AdapterType
 *
 * @author d.peters
 */
abstract class AdapterType extends Enum {

    const PG = 'postgres';
    const MYSQL = 'mysql';
    const MS_SQL = 'mssql';
    const MONGO = 'mongodb';
    const ORACLE = 'oracle';

}
