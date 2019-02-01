<?php

namespace lib\filter;

use function preg_match;

/**s
 * Class InputValidator.
 *
 * @package lib\filter
 * @author Daniel Peters
 * @version 1.0
 */
abstract class ValidatorHelper {
  const VALID_EMAIL = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
  const VALID_FILENAME = "/^([a-z\d.-]+)\.([a-z\d]+)$/";

  /**
   * Test email addresses for validity according to VALID_EMAIL regex.
   *
   * @param string $email Email address to test
   *
   * @return bool
   */
  public static function validEmail (string $email): bool {
    return preg_match(self::VALID_EMAIL, $email);
  }

  public static function validFileName (string $fileName): bool {
    return preg_match(self::VALID_FILENAME, $fileName);
  }
}
