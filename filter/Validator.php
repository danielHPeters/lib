<?php

namespace lib\filter;

/**
 * Class InputValidator.
 *
 * @package lib\filter
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Validator {
  const VALID_EMAIL = "^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$";

  /**
   * Test email addresses for validity according to VALID_EMAIL regex.
   *
   * @param string $email Email address to test
   * @return bool
   */
  public static function checkEmail (string $email): bool {
    return preg_match(self::VALID_EMAIL, $email);
  }

  /**
   * Check if the passed array keys exist in the post variable.
   * If the key does not exist, then the string value assigned to the key will be added to the returned errors array.
   *
   * @param array $keys
   * @return array Array of errors. key = post variable and value = error message.
   */
  public static function checkPostVars (array $keys): array {
    $errors = [];

    foreach ($keys as $key => $value) {
      if (!isset($_POST[$key]) || empty(trim($_POST[$key]))) {
        $errors[] = $value;
      }
    }

    return $errors;
  }
}
