<?php

namespace lib\i18n;

/**
 * Class JSONTranslationLoader.
 *
 * @package lib\i18n
 * @author  Daniel Peters
 * @version 1.
 */
class JSONTranslationLoader implements TranslationLoader {
  private $path;

  /**
   * JSONTranslationLoader constructor.
   *
   * @param string $path
   */
  public function __construct (string $path) {
    $this->path = $path;
  }

  public function getString (string $text, string $locale): string {
    // TODO: Implement getString() method.
  }
}
