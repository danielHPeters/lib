<?php

namespace lib\util;

use function preg_match;

/**
 * Class Locale.
 *
 * @package lib\util\locale
 * @author  Daniel Peters
 * @version 1.0
 */
abstract class Locale extends Enum {
  const VALID_LOCALE = '^[a-z]{2}-[A-Z]{2}$';

  const EN_US = 'en-US';
  const DE_CH = 'de-CH';
  const DE_DE = 'de-DE';
  const FR_CH = 'fr-CH';

  /**
   * Test if the passed string conforms to IETF BCP 47 language tag standard http://tools.ietf.org/html/rfc5646 .
   * Use when dealing with locale strings from the client.
   *
   * @param string $localeString The string to test
   * @return bool True if string is conforming to IETF BCP 47 language tag
   */
  public static function validate (string $localeString): bool {
    return preg_match(self::VALID_LOCALE, $localeString);
  }
}
