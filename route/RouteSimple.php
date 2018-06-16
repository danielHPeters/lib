<?php

namespace lib\route;

/**
 * Class RouteSimple
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class RouteSimple {
	public static $routes = [];
	public static $routes404 = [];
	public static $path;

	public static function init() {
		$parsedUrl  = parse_url( $_SERVER['REQUEST_URI'] );
		self::$path = isset( $parsedUrl['path'] ) ? trim( $parsedUrl['path'], '/' ) : '';
	}

	/**
	 * @param string $expression
	 * @param callable $function
	 */
	public static function add( string $expression, callable $function ) {
		array_push( self::$routes, [ 'expression' => $expression, 'function' => $function ] );
	}

	/**
	 * @param callable $function
	 */
	public static function add404( callable $function ) {
		array_push( self::$routes404, $function );
	}

	/**
	 *
	 */
	public static function run() {
		$routeFound = false;

		foreach ( self::$routes as $route ) {
			if ( RoutesConfig::get( 'basePath' ) ) {
				$route['expression'] = '(' . RoutesConfig::get( 'basePath' ) . ')/' . $route['expression'];
			}

			//Add 'find string start' automatically
			$route['expression'] = '^' . $route['expression'] . '$';

			//check match
			if ( preg_match( '#' . $route['expression'] . '#', self::$path, $matches ) ) {
				array_shift( $matches ); // Always remove first element. This contains the whole string

				if ( RoutesConfig::get( 'basePath' ) ) {
					array_shift( $matches ); // Remove base path
				}

				call_user_func_array( $route['function'], $matches );

				$routeFound = true;
			}
		}

		if ( ! $routeFound ) {
			foreach ( self::$routes404 as $route404 ) {
				call_user_func_array( $route404, [ self::$path ] );
			}
		}
	}
}
