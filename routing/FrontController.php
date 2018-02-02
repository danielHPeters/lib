<?php

namespace rafisa\lib\routing;

/**
 * Description of FrontController
 *
 * @author  Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
 */
class FrontController
{
    /**
     * @var Router
     */
    private $router;

    /**
     *
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     *
     * @param Router     $router
     * @param Dispatcher $dispatcher
     */
    public function __construct(Router $router, Dispatcher $dispatcher)
    {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    /**
     *
     * @param Request  $request
     * @param Response $response
     */
    public function run(Request $request, Response $response)
    {
        $route = $this->router->route($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
    }
}
