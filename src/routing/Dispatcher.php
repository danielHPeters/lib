<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Description of Dispatcher
 *
 * @author d.peters
 */
class Dispatcher {

    public function dispatch(Route $route, Request $request, Response $response) {

        $controller = $route->createController();
        $controller->execute($request, $response);
    }

}
