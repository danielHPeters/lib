<?php

namespace rafisa\lib\render;

/**
 * Class PageLoader.
 *
 * @package rafisa\lib\render
 * @author Daniel Peters
 * @version 1.0
 */
class PageLoader {
	private $path;

	public function __construct( string $path ) {
		$this->path = $path;
	}

	public function loadHtmlPage( string $page ) {
		$htmlFile = $this->path . $page . '.html';

		return file_exists( $htmlFile ) ? file_get_contents( $htmlFile ) : 'Page not found!';
	}
}
