<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\Collection;

/**
 * Router class for route handlers.
 *
 * @package lib\route
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
