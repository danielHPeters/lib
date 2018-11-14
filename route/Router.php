<?php

namespace lib\route;

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

  public function get (string $uri, string $action): void;

  public function post (string $uri, string $action): void;

  public function put (string $uri, string $action): void;

  public function patch (string $uri, string $action): void;

  public function delete (string $uri, string $action): void;

  public function options (string $uri, string $action): void;

  public function setErrorHandler (int $errorKey, string $action): void;

  public function route (Request $request): Route;
}
