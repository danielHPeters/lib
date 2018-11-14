<?php

namespace lib\route;

use Closure;
use lib\collection\Map;

/**
 * Interface Router.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface Router {
  public function getRoutes (): Map;

  public function get (string $uri, Closure $middleWare): void;

  public function post (string $uri, Closure $middleWare): void;

  public function put (string $uri, Closure $middleWare): void;

  public function patch (string $uri, Closure $middleWare): void;

  public function delete (string $uri, Closure $middleWare): void;

  public function options (string $uri, Closure $middleWare): void;

  public function setErrorHandler (int $errorKey, Closure $action): void;

  public function route (Request $request): Route;
}
