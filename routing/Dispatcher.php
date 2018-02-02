<?php

namespace rafisa\lib\routing;

/**
 * Description of Dispatcher
 *
 * @author  Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
 */
class Dispatcher
{
    /**
     * @param Route $route
     * @param Request $request
     * @param Response $response
     */
    public function dispatch(Route $route, Request $request, Response $response)
    {
        $controller = $route->createController();
        $controller->execute($request, $response);
    }
}
