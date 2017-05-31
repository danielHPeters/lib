<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\factory;

use rafisa\lib\src\database\IAdapter;
use rafisa\lib\src\database\MysqlAdapter;

/**
 * Description of DbAdapterFactory
 *
 * @author d.peters
 */
class DbAdapterFactory {

    /**
     * 
     * @param string $type
     * @return IAdapter
     */
    public function createAdapter(string $type): IAdapter {
        $adapter = null;

        if (TagNames::isValidKey($type)) {

            $adapter = new MysqlAdapter($type);
        }

        return $adapter;
    }

}
