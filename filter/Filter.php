<?php

namespace lib\filter;

/**
 * Interface Filter.
 *
 * @package lib\filter
 * @author Daniel Peters
 * @version 1.0
 */
interface Filter {
  public function filter (array $variables): void;
}
