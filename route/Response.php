<?php

namespace lib\route;

use lib\collection\ArrayList;

/**
 * Class Response.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Response {
	private $version;
	private $headers;
	private $body;

	public function __construct( string $version ) {
		$this->version = $version;
		$this->headers = new ArrayList();
	}

	public function send(): void {
		if ( ! headers_sent() ) {
			$this->headers->each( function ( $header ) {
				header( $this->version . '/' . $header, true );
			} );
			echo $this->body;
		}
	}

	public function redirect(string $location): void {
		header( 'Location: ' . $location);
	}

	public function getVersion(): string {
		return $this->version;
	}

	public function setVersion( string $version ): void {
		$this->version = $version;
	}

	public function getHeaders(): ArrayList {
		return $this->headers;
	}

	public function getBody(): string {
		return $this->body;
	}

	public function setBody( string $body ): void {
		$this->body = $body;
	}
}
