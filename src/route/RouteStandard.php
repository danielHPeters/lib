<?php

namespace lib\route;

/**
 * Class RouteStandard.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
class RouteStandard implements Route {
  /**
   * @var string
   */
  private $path;
  /**
   * @var string
   */
  private $action;

  public function __construct (string $uri, string $middleWare) {
    $this->path = $uri;
    $this->action = $middleWare;
  }

  public function matches (Request $request): bool {
    return $this->path === $request->getUri();
  }

  public function getAction (): string {
    return $this->action;
  }
}
