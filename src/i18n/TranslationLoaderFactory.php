<?php

namespace lib\i18n;

use lib\file\MIMEType;

/**
 * Class TranslationLoaderFactory.
 *
 * @package lib\i18n
 * @author  Daniel Peters
 * @version 1.0
 */
class TranslationLoaderFactory {
  const TRANSLATION_ERROR_MESSAGE = 'Failed to load translation loader of type ';

  /**
   * @param string $path
   * @param string $type
   * @return TranslationLoader
   * @throws TranslationException
   */
  public static function getTranslationLoader (string $path, string $type): TranslationLoader {
    $loader = null;

    switch ($type) {
      case MIMEType::JSON:
        $loader = new JSONTranslationLoader($path);
        break;
      default:
        throw new TranslationException(self::TRANSLATION_ERROR_MESSAGE . $type);
    }

    return $loader;
  }
}
