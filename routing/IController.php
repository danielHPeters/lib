<?php

namespace rafisa\lib\routing;

use Closure;

/**
 * Description of IController
 *
 * @author  d.peters
 * @version 1.0
 */
interface IController
{
    public function execute(Request $request, Response $response, Closure $next = null);
}
