<?php

namespace lib\filter;

interface Validator {
  /**
   * @param array $variableMap
   * @throws ValidationException
   */
  public function validate(array $variableMap): void;
}
