<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\HashMap;
use lib\collection\Map;
use lib\http\Method;
use lib\http\StatusCode;
use function count;

/**
 * RouterStandard class for route handlers.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class RouterStandard implements Router {
  const ERROR = 'ERROR';
  /**
   * @var Map
   */
  private $routes;

  public function __construct () {
    $this->routes = new HashMap();
    $this->routes->put(Method::GET, new ArrayList());
    $this->routes->put(Method::POST, new ArrayList());
    $this->routes->put(Method::PUT, new ArrayList());
    $this->routes->put(Method::PATCH, new ArrayList());
    $this->routes->put(Method::DELETE, new ArrayList());
    $this->routes->put(Method::OPTIONS, new ArrayList());
    $this->routes->put(self::ERROR, new HashMap());
  }

  /**
   * @inheritdoc
   */
  public function getRoutes (): Map {
    return $this->routes;
  }


  public function get (string $uri, string $action): void {
    $this->routes->get(Method::GET)->add(new RouteStandard($uri, $action));
  }

  public function post (string $uri, string $action): void {
    $this->routes->get(Method::POST)->add(new RouteStandard($uri, $action));
  }

  public function put (string $uri, string $action): void {
    $this->routes->get(Method::PUT)->add(new RouteStandard($uri, $action));
  }

  public function patch (string $uri, string $action): void {
    $this->routes->get(Method::PATCH)->add(new RouteStandard($uri, $action));
  }

  public function delete (string $uri, string $action): void {
    $this->routes->get(Method::DELETE)->add(new RouteStandard($uri, $action));
  }

  public function options (string $uri, string $action): void {
    $this->routes->get(Method::OPTIONS)->add(new RouteStandard($uri, $action));
  }

  public function setErrorHandler (int $errorKey, string $action): void {
    $this->routes->get(self::ERROR)->put($errorKey, new RouteStandard('', $action));
  }

  public function getErrorHandler (int $errorKey): Route {
    return $this->routes->get(self::ERROR)->get($errorKey);
  }

  /**
   *
   * @param Request $request
   *
   * @return Route
   */
  public function route (Request $request): Route {
    $routes = $this->routes->get($request->getMethod())->filter(function (Route $route) use ($request) {
      return $route->matches($request);
    });

    return count($routes) > 0 ? $routes[0] : $this->getErrorHandler(StatusCode::NOT_FOUND);
  }
}
