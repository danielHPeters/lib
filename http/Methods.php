<?php

namespace rafisa\lib\http;

use rafisa\lib\util\Enum;

/**
 * Enum containing http method declarations.
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class Methods extends Enum
{
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
