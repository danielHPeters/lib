<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\Collection;
use Closure;
use lib\collection\HashMap;
use lib\http\Method;
use function Sodium\add;

/**
 * Router class for route handlers.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Router {
  const ERROR = 'ERROR';
  /**
   * @var HashMap
   */
  private $routes;

  public function __construct() {
    $this->routes = new HashMap();
    $this->routes->put(Method::GET, new ArrayList());
    $this->routes->put(Method::POST, new ArrayList());
    $this->routes->put(Method::PUT, new ArrayList());
    $this->routes->put(Method::PATCH, new ArrayList());
    $this->routes->put(Method::DELETE, new ArrayList());
    $this->routes->put(Method::OPTIONS, new ArrayList());
    $this->routes->put(self::ERROR, new ArrayList());
  }

  public function getRoutes(): HashMap {
    return $this->routes;
  }

  public function get(string $uri, Closure $middleWare): void {
    $this->routes->get(Method::GET)->add(new Route($uri, $middleWare));
  }

  public function post(string $uri, Closure $middleWare): void {
    $this->routes->get(Method::POST)->add(new Route($uri, $middleWare));
  }

  public function put(string $uri, Closure $middleWare): void {
    $this->routes->get(Method::PUT)->add(new Route($uri, $middleWare));
  }

  public function patch(string $uri, Closure $middleWare): void {
    $this->routes->get(Method::PATCH)->add(new Route($uri, $middleWare));
  }

  public function delete(string $uri, Closure $middleWare): void {
    $this->routes->get(Method::DELETE)->add(new Route($uri, $middleWare));
  }

  public function options(string $uri, Closure $middleWare): void {
    $this->routes->get(Method::OPTIONS)->add(new Route($uri, $middleWare));
  }

  public function setErrorHandler(Closure $action): void {
    $this->routes->get(self::ERROR)->add(new Route('', $action));
  }

  public function getErrorHandler(): Route {
    return $this->routes->get(self::ERROR)->get(0);
  }

  /**
   *
   * @param Request $request
   *
   * @return Route
   */
  public function route(Request $request): Route {
    $routes = $this->routes->get($request->getMethod())->filter(function ($route) use ($request) {
      return $route->matches($request);
    });

    return count($routes) > 0 ? $routes[0] : $this->getErrorHandler();
  }
}
