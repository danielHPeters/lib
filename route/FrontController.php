<?php

namespace rafisa\lib\route;

/**
 * Class FrontController.
 *
 * @package rafisa\lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class FrontController {
	private $router;
	private $dispatcher;

	public function __construct( Router $router, Dispatcher $dispatcher ) {
		$this->router     = $router;
		$this->dispatcher = $dispatcher;
	}

	public function run( Request $request, Response $response ) {
		$route = $this->router->route( $request, $response );
		$this->dispatcher->dispatch( $route, $request, $response );
	}
}
