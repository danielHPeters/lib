<?php

namespace rafisa\lib\routing;

use rafisa\lib\collections\ArrayList;

/**
 * Router class for route handlers
 *
 * @author  Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
 */
class Router
{
    /**
     * @var ArrayList
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = new ArrayList();
    }

    /**
     *
     * @return ArrayList
     */
    public function getRoutes(): ArrayList
    {
        return $this->routes;
    }

    /**
     *
     * @param Request  $request
     * @param Response $response
     *
     * @return Route
     */
    public function route(Request $request, Response $response): Route
    {

        $foundRoute = null;

        $this->routes->each(
            function (Route $route) use (&$request, &$foundRoute) {

                if ($route->match($request)) {
                    $foundRoute = $route;
                }
            }
        );

        if ($foundRoute === null) {
            $response->getHeaders()->add('404 Page Not Found');
            $response->send();
        }

        return $foundRoute;
    }
}
