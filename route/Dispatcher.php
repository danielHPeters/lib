<?php

namespace lib\route;

/**
 * Description of Dispatcher.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Dispatcher {
  public function dispatch (Route $route, Request $request, Response $response) {
    $route->getAction()($request, $response);
  }
}
