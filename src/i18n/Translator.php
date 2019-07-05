<?php

namespace lib\i18n;

use lib\file\MIMEType;
use lib\util\Locale;

/**
 * Interface Translator.
 *
 * @package lib\i18n
 * @author  Daniel Peters
 * @version 1.0
 */
interface Translator {
  public static function init (string $translationsPath, string $locale = Locale::EN_US, string $format = MIMEType::JSON): Translator;

  public static function getInstance (): Translator;

  public function translate (string $text): string;

  public function changeLocale (string $locale): void;
}
