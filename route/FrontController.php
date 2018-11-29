<?php

namespace lib\route;

use lib\view\RenderingEngine;

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

  /**
   * @var RenderingEngine
   */
  private $renderingEngine;

  public function __construct (Router $router, RenderingEngine $renderingEngine) {
    $this->router = $router;
    $this->renderingEngine = $renderingEngine;
    $this->dispatcher = new Dispatcher();
  }

  public function run (): void {
    $request = new RequestStandard();
    $response = new ResponseStandard($this->renderingEngine);
    $this->dispatcher->dispatch($this->router->route($request), $request, $response);
  }
}
