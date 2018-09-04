<?php

namespace lib\route;

use Closure;

/**
 * Class EntityController.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
abstract class EntityController {
  abstract public function create(): Closure;

  abstract public function getAll(): Closure;

  abstract public function getById(string $id): Closure;

  abstract public function update(string $id): Closure;

  abstract public function delete(string $id): Closure;

  /**
   * Transform data to json and send response.
   *
   * @param $response mixed Response data
   */
  public function json($response): void {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
  }
}
