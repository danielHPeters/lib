<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Description of FrontCOntroller
 *
 * @author d.peters
 */
class FrontController {
    
    private $router;
    
    private $dispatcher;


    public function __construct(Router $router, Dispatcher $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }
    
    public function run(Request $request, Response $response){
        $route = $this->router->route($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
    }
}
