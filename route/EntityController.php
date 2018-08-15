<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 15.08.18
 * Time: 13:18
 */

namespace lib\route;

/**
 * Class EntityController.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
abstract class EntityController {
  abstract public function create(): void;

  abstract public function getAll(): void;

  abstract public function getById(string $id): void;

  abstract public function update(string $id): void;

  abstract public function delete(string $id): void;

  /**
   * Transform data to json and send response.
   *
   * @param $response mixed Response data
   */
  public function json($response) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
  }
}
