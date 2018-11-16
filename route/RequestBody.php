<?php

namespace lib\route;

use lib\filter\Filter;
use lib\filter\Validator;

interface RequestBody extends Filter, Validator {
  /**
   * @param array $keys
   *
   * @return
   */
  public function require (array $keys): array;

  public function get(string $key);
}
