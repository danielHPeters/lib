<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\http;

use rafisa\lib\src\util\Enum;

/**
 * Description of newPHPClass
 *
 * @author d.peters
 */
class Methods extends Enum {

    const GET = 0;
    const HEAD = 1;
    const POST = 2;
    const PUT = 3;
    const DELETE = 4;
    const CONNECT = 5;
    const OPTIONS = 6;
    const TRACE = 7;
    const PATCH = 8;

}
