<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Class Route
 * @package rafisa\lib\routing
 */
class RouteSimple {

    /**
     * @var array
     */
    public static $routes = [];

    /**
     * @var array
     */
    public static $routes404 = [];

    /**
     * @var
     */
    public static $path;

    /**
     *
     */
    public static function init() {

        $parsedUrl = parse_url($_SERVER['REQUEST_URI']); //URI zerlegen

        if (isset($parsedUrl['path'])) {
            self::$path = trim($parsedUrl['path'], '/');
        } else {
            self::$path = '';
        }
    }

    /**
     * @param $expression
     * @param $function
     */
    public static function add(string $expression, callable $function) {

        array_push(self::$routes, Array(
            'expression' => $expression,
            'function' => $function
        ));
    }

    /**
     * @param $function
     */
    public static function add404(callable $function) {

        array_push(self::$routes404, $function);
    }

    /**
     *
     */
    public static function run() {

        $routeFound = false;

        foreach (self::$routes as $route) {

            if (RoutesConfig::get('basepath')) {

                $route['expression'] = '(' . RoutesConfig::get('basepath') . ')/' . $route['expression'];
            }

            //Add 'find string start' automatically
            $route['expression'] = '^' . $route['expression'];

            //Add 'find string end' automatically
            $route['expression'] = $route['expression'] . '$';

            //check match
            if (preg_match('#' . $route['expression'] . '#', self::$path, $matches)) {

                array_shift($matches); //Always remove first element. This contains the whole string

                if (RoutesConfig::get('basepath')) {

                    array_shift($matches); //Remove Basepath
                }

                call_user_func_array($route['function'], $matches);

                $routeFound = true;
            }
        }

        if (!$routeFound) {

            foreach (self::$routes404 as $route404) {

                call_user_func_array($route404, [self::$path]);
            }
        }
    }

}
