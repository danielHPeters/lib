<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\party;

use rafisa\lib\src\util\Enum;

/**
 * Description of EPartyStatus
 *
 * @author d.peters
 */
class EPartyStatus extends Enum {

    const INVITED = 0;
    const ACCEPTED = 1;
    const DECLINDED = 2;

}
