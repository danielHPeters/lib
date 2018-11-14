<?php

namespace lib\route;

/**
 * Class EntityController.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class EntityController {
  abstract public function create (Request $request, Response $response): void ;

  abstract public function getAll (Request $request, Response $response): void ;

  abstract public function getById (Request $request, Response $response): void ;

  abstract public function update (Request $request, Response $response): void ;

  abstract public function delete (Request $request, Response $response): void ;
}
