<?php

namespace rafisa\lib\route;

use rafisa\lib\collection\ArrayList;

/**
 * Class Response.
 *
 * @package rafisa\lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Response {
	private $version;
	private $headers;

	public function __construct( string $version ) {
		$this->version = $version;
		$this->headers = new ArrayList();
	}

	public function getVersion(): string {
		return $this->version;
	}

	public function getHeaders(): ArrayList {
		return $this->headers;
	}

	public function send() {
		if ( ! headers_sent() ) {
			$this->headers->each( function ( $header ) {
				header( $this->version . ' ' . $header, true );
			} );
		}
	}
}
