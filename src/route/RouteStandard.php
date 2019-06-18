<?php

namespace lib\route;

/**
 * Class RouteStandard.
 *
 * @package lib\route
 * @author  Daniel Peters
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

  /**
   * RouteStandard constructor.
   *
   * @param string $uri        The request uri to listen to
   * @param string $middleWare The request handler method to call
   */
  public function __construct (string $uri, string $middleWare) {
    $this->path = $uri;
    $this->action = $middleWare;
  }

  /**
   * Compare a request against this route.
   *
   * @param Request $request Active request
   * @return bool True if request uri matches with route path
   */
  public function matches (Request $request): bool {
    return $this->path === $request->getUri();
  }

  public function getAction (): string {
    return $this->action;
  }
}
