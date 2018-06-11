<?php

namespace rafisa\lib\io;

/**
 * Class System.
 *
 * @package rafisa\lib\io
 * @author Daniel Peters
 * @version 1.0
 */
abstract class System {
	final public static function printVar( $var, $return = false ) {
		print_r( $var, $return );
	}

	final public static function dumpVar( $var ) {
		var_dump( $var );
	}

	final public static function echoStr( string $str ) {
		echo $str;
	}

	final public static function echoLn( $str ) {
		echo $str . '<br>';
	}


	final public static function doPrintf( string $str, $args = null ) {
		printf( $str, $args );
	}

	final public static function flush() {
		flush();
	}
}
