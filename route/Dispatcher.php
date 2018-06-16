<?php

namespace lib\route;

/**
 * Description of Dispatcher.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Dispatcher {
	public function dispatch( Route $route, Request $request, Response $response ) {
		$controller = $route->createController();
		$controller->execute( $request, $response );
	}
}
