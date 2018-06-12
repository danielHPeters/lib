<?php

namespace rafisa\lib\route;

/**
 * Class RoutesConfig.
 *
 * @package rafisa\lib\route
 * @author Daniel Peters
 * @version 1.0
 */
abstract class RoutesConfig {
	private static $registry = [];

	/**
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public static function set( $key, $value ) {
		self::$registry[ $key ] = $value;
	}

	/**
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public static function get( string $key ) {
		return array_key_exists( $key, self::$registry ) ? self::$registry[ $key ] : null;
	}
}
