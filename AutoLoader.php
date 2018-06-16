<?php

namespace lib;

/**
 * Class AutoLoader.
 *
 * @package lib
 * @author Daniel Peters
 * @version 1.0
 */
abstract class AutoLoader {
	public static function register() {
		spl_autoload_register(
			function ( $class ) {
				$file        = str_replace( '\\', '/', $class );
				$relativeUrl = dirname( __FILE__ ) . '/../' . $file . '.php';
				if ( file_exists( $relativeUrl ) ) {
					require_once $relativeUrl;
				}
			}
		);
	}
}
