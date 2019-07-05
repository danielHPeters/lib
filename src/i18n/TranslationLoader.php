<?php

namespace lib\i18n;

/**
 * Interface TranslationLoader.
 *
 * @package lib\i18n
 * @author  Daniel Peters
 * @version 1.0
 */
interface TranslationLoader {
  public function getString (string $text, string $locale): string;
}
