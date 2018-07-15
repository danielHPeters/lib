<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\Collection;
use Closure;
use lib\http\Method;

/**
 * Router class for route handlers.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Router {
  private $error404 = '404';
  /**
   * @var ArrayList
   */
  private $routes;

  public function __construct () {
    $this->routes = new ArrayList();
  }

  public function getRoutes (): Collection {
    return $this->routes;
  }

  public function get (string $uri, Closure $action): void {
    $this->routes[Method::GET][$uri] = $action;
  }

  public function post (string $uri, Closure $action) {
    $this->routes[Method::POST][$uri] = $action;
  }

  public function put (string $uri, Closure $action) {
    $this->routes[Method::PUT][$uri] = $action;
  }

  public function patch (string $uri, Closure $action) {
    $this->routes[Method::PATCH][$uri] = $action;
  }

  public function delete (string $uri, Closure $action) {
    $this->routes[Method::DELETE][$uri] = $action;
  }

  public function options (string $uri, Closure $action) {
    $this->routes[Method::OPTIONS][$uri] = $action;
  }

  public function add404 (Closure $action) {
    $this->routes[$this->error404] = $action;
  }

  public function get404 () {
    return $this->routes[$this->error404];
  }

  /**
   *
   * @param Request $request
   * @param Response $response
   *
   * @return Route
   */
  public function route (Request $request, Response $response): Route {
    $foundRoute = null;

    $this->routes->each(function (Route $route) use (&$request, &$foundRoute) {
      if ($route->match($request)) {
        $foundRoute = $route;
      }
    });

    if ($foundRoute === null) {
      $response->getHeaders()->add('404 Page Not Found');
      $response->send();
    }

    return $foundRoute;
  }
}
