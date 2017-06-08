<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Description of FrontController
 *
 * @author d.peters
 */
class FrontController {

    private $router;

    /**
     *
     * @var type 
     */
    private $dispatcher;

    /**
     * 
     * @param Router $router
     * @param Dispatcher $dispatcher
     */
    public function __construct(Router $router, Dispatcher $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     */
    public function run(Request $request, Response $response) {
        $route = $this->router->route($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
    }

}
