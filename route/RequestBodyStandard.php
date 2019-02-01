<?php

namespace lib\route;

use lib\filter\ValidationException;

/**
 * Class RequestBodyStandard.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
class RequestBodyStandard implements RequestBody {
  /**
   * @var array
   */
  private $variables;

  public function __construct ($variables) {
    $this->variables = $variables;
  }

  public function filter (array $variables): void {
    // TODO: Implement filter() method.
  }

  /**
   * @param array $variableMap
   *
   * @throws ValidationException
   */
  public function validate (array $variableMap): void {
    throw new ValidationException();
  }

  /**
   * @param array $requiredKeys Array of keys required and
   * the error message that should be returned if the key is missing.
   *
   * @return array An array that is empty if there are no missing keys.
   * If there are errors, the specified error message is returned
   */
  public function require (array $requiredKeys): array {
    $missing = [];

    foreach ($requiredKeys as $key => $value) {
      if (!isset($this->variables[$key]) || empty(trim($this->variables[$key]))) {
        $missing[$key] = $value;
      }
    }

    return $missing;
  }

  public function get (string $key) {
    return $this->variables[$key] ?? null;
  }
}
