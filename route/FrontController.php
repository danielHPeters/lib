<?php

namespace lib\route;

/**
 * Class FrontController.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class FrontController {
  private $router;
  private $dispatcher;

  public function __construct (Router $router, Dispatcher $dispatcher) {
    $this->router = $router;
    $this->dispatcher = $dispatcher;
  }

  public function run (): void {
    $request = new Request();
    $response = new Response();

    $this->dispatcher->dispatch($this->router->route($request), $request, $response);
  }
}
