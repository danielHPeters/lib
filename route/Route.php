<?php

namespace lib\route;

/**
 * Class Route.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Route {
  /**
   * @var string
   */
  private $path;
  /**
   * @var string
   */
  private $controllerClass;

  public function __construct (string $uri, string $controllerClass) {
    $this->path = $uri;
    $this->controllerClass = $controllerClass;
  }

  public function match (Request $request): bool {
    return $this->path === $request->getUri();
  }

  public function createController (): Controller {
    return new $this->controllerClass;
  }
}
