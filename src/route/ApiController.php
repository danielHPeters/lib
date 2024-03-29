<?php

namespace lib\route;

/**
 * Class ApiController.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface ApiController extends Controller {
  public function create (Request $request, Response $response): void;

  public function getAll (Request $request, Response $response): void;

  public function getById (Request $request, Response $response): void;

  public function update (Request $request, Response $response): void;

  public function delete (Request $request, Response $response): void;
}
