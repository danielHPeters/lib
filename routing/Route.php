<?php

namespace rafisa\lib\routing;

/**
 * Description of Route.
 *
 * @package rafisa\lib\routing
 * @author  Daniel Peters
 * @version 1.0
 */
class Route {
	private $path;
	private $controllerClass;

	public function __construct( string $path, string $controllerClass ) {
		$this->path            = $path;
		$this->controllerClass = $controllerClass;
	}

	public function match( Request $request ): bool {
		return $this->path === $request->getUri();
	}

	public function createController(): Controller {
		return new $this->controllerClass;
	}
}
