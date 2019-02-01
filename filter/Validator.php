<?php

namespace lib\filter;

/**
 * Interface Validator.
 *
 * @package lib\filter
 * @author Daniel Peters
 * @version 1.0
 */
interface Validator {
  /**
   * @param array $variableMap
   * @throws ValidationException
   */
  public function validate (array $variableMap): void;
}
