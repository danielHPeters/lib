<?php

namespace lib\route;

/**
 * Interface Route.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface Route {
  public function matches (Request $request): bool;

  public function getAction (): string;
}