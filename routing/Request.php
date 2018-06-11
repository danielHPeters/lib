<?php

namespace rafisa\lib\routing;

use rafisa\lib\collections\ArrayList;

/**
 * Description of Request.
 *
 * @package rafisa\lib\routing
 * @author  Daniel Peters
 * @version 1.0
 */
class Request {
	private $uri;
	private $params;

	public function __construct( string $uri ) {
		$this->uri    = $uri;
		$this->params = new ArrayList();
	}

	public function getUri(): string {
		return $this->uri;
	}

	public function getParams(): ArrayList {
		return $this->params;
	}

	public function getParam( string $key ): string {
		return isset( $this->params[ $key ] ) ? $this->params[ $key ] : '404';
	}

	public function setParam( string $key, string $value ) {
		$this->params[ $key ] = $value;
	}
}
