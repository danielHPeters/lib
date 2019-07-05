<?php

namespace lib\i18n;

use lib\file\MIMEType;
use lib\util\Locale;

/**
 * Class DefaultTranslator
 * @package lib\i18n
 */
class DefaultTranslator implements Translator {
  private $locale;
  private $translationsPath;
  private $format;
  private $translationLoader;
  private static $instance;
  const INSTANCE_ERROR = 'The translator instance has not been initialized. Please use the init function first.';

  /**
   * @param string $translationsPath
   * @param string $locale
   * @param string $format
   * @return Translator
   * @throws TranslationException
   */
  public static function init (
    string $translationsPath,
    string $locale = Locale::EN_US,
    string $format = MIMEType::JSON
  ): Translator {
    return new DefaultTranslator($translationsPath, $locale, $format);
  }

  /**
   * @return Translator
   * @throws TranslationException
   */
  public static function getInstance (): Translator {
    if (self::$instance === null) {
      throw new TranslationException(self::INSTANCE_ERROR);
    }

    return self::$instance;
  }

  /**
   * DefaultTranslator constructor.
   *
   * @param string $translationsPath
   * @param string $locale
   * @param string $format
   * @throws TranslationException
   */
  private function __construct (string $translationsPath, string $locale = Locale::EN_US, string $format = MIMEType::JSON) {
    $this->locale = $locale;
    $this->translationsPath = $translationsPath;
    $this->format = $format;
    $this->translationLoader = TranslationLoaderFactory::getTranslationLoader($this->translationsPath, $format);
  }

  /**
   * @param string $text
   * @return string
   */
  public function translate (string $text): string {
    return $this->translationLoader->getString($text, $this->locale);
  }

  /**
   * @param string $locale
   */
  public function changeLocale (string $locale): void {
    $this->locale = $locale;
  }
}
