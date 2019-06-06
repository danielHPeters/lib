<?php

namespace lib\route;

use lib\filter\Filter;
use lib\filter\Validator;

/**
 * Interface RequestBody.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface RequestBody extends Filter, Validator {
  public function getContentType (): string;

  public function require (array $keys): array;

  public function get (string $key);
}
