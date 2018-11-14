<?php

namespace lib\route;

use Exception;
use ReflectionMethod;
use function explode;

/**
 * Description of Dispatcher.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Dispatcher {
  public function dispatch (Route $route, Request $request, Response $response) {
    try {
      $parts = explode('#', $route->getAction(), 2);
      $controllerClass = $parts[0];
      $method = $parts[1];
      $controller = new $controllerClass();

      $reflectionMethod = new ReflectionMethod($controllerClass, $method);
      $reflectionMethod->invoke($controller, $request, $response);
    } catch (Exception $e) {
      error_log($e);
    }
  }
}
