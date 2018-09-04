<?php

namespace lib\route;

use Closure;

/**
 * Class Route.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Route {
  /**
   * @var string
   */
  private $path;
  /**
   * @var Closure
   */
  private $action;

  public function __construct (string $uri, Closure $middleWare) {
    $this->path = $uri;
    $this->action = $middleWare;
  }

  public function matches (Request $request): bool {
    return $this->path === $request->getUri();
  }

  public function getAction (): Closure {
    return $this->action;
  }
}
