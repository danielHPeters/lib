<?php

namespace rafisa\lib\routing;

use rafisa\lib\collections\ArrayList;

/**
 * Description of Response
 *
 * @author  Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
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
