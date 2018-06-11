<?php

namespace rafisa\lib\routing;

use rafisa\lib\collections\ArrayList;
use rafisa\lib\collections\Collection;

/**
 * Router class for route handlers.
 *
 * @package rafisa\lib\routing
 * @author  Daniel Peters
 * @version 1.0
 */
class Router {
	private $routes;

	public function __construct() {
		$this->routes = new ArrayList();
	}

	public function getRoutes(): Collection {
		return $this->routes;
	}

	/**
	 *
	 * @param Request $request
	 * @param Response $response
	 *
	 * @return Route
	 */
	public function route( Request $request, Response $response ): Route {
		$foundRoute = null;

		$this->routes->each( function ( Route $route ) use ( &$request, &$foundRoute ) {
			if ( $route->match( $request ) ) {
				$foundRoute = $route;
			}
		} );

		if ( $foundRoute === null ) {
			$response->getHeaders()->add( '404 Page Not Found' );
			$response->send();
		}

		return $foundRoute;
	}
}
