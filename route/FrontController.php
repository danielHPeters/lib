<?php

namespace lib\route;

/**
 * Class FrontController.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
class FrontController {
  private $router;
  private $dispatcher;

  public function __construct (Router $router) {
    $this->router = $router;
    $this->dispatcher = new Dispatcher();
  }

  public function run (): void {
    $request = new RequestStandard();
    $response = new ResponseBasic();
    $this->dispatcher->dispatch($this->router->route($request), $request, $response);
  }
}
