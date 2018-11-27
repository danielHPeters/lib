<?php

namespace lib\route;

use lib\collection\Map;

/**
 * Interface Router.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface Router {
  /**
   * Get the routes cache.
   *
   * @return Map
   */
  public function getRoutes (): Map;

  /**
   * Add a route that listens to a GET request.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param string $uri The uri to listen on
   * @param string $action Reference to controller method
   */
  public function get (string $uri, string $action): void;

  /**
   * Add a route that listens to a POST request.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param string $uri The uri to listen on
   * @param string $action Reference to controller method
   */
  public function post (string $uri, string $action): void;

  /**
   * Add a route that listens to a PUT request.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param string $uri The uri to listen on
   * @param string $action Reference to controller method
   */
  public function put (string $uri, string $action): void;

  /**
   * Add a route that listens to a GET request.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param string $uri The uri to listen on
   * @param string $action Reference to controller method
   */
  public function patch (string $uri, string $action): void;

  /**
   * Add a route that listens to a GET request.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param string $uri The uri to listen on
   * @param string $action Reference to controller method
   */
  public function delete (string $uri, string $action): void;

  /**
   * Add a route that listens to a OPTIONS request.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param string $uri The uri to listen on
   * @param string $action Reference to controller method
   */
  public function options (string $uri, string $action): void;

  /**
   * Set the error handler for a specific error status.
   * The action must be a reference to a controller class with the method name to call.
   * The class name and the method name must be separated by a '#'.
   *
   * @param int $errorKey The error number {@see StatusCode}
   * @param string $action Reference to controller method
   */
  public function setErrorHandler (int $errorKey, string $action): void;

  public function getErrorHandler (int $errorKey): Route;

  public function route (Request $request): Route;
}
