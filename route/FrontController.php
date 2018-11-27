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
  /**
   * @var Router
   */
  private $router;
  /**
   * @var Dispatcher
   */
  private $dispatcher;

  public function __construct (Router $router) {
    $this->router = $router;
    $this->dispatcher = new Dispatcher();
  }

  public function run (): void {
    $request = new RequestStandard();
    $response = new ResponseStandard();
    $this->dispatcher->dispatch($this->router->route($request), $request, $response);
  }
}
