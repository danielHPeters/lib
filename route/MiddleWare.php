<?php

namespace lib\route;

use Closure;

/**
 * Interface MiddleWare.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface MiddleWare {
  public function handle (Request $req, Response $res, Closure $next = null): void;
}
