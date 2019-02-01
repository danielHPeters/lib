<?php

namespace lib\filter;

use function str_replace;
use function strtolower;
use function pathinfo;
use function preg_replace;
use const PATHINFO_FILENAME;

/**
 * Class Normalizer.
 *
 * @package lib\filter
 * @author Daniel Peters
 * @version 1.0
 */
abstract class Normalizer {
  public static function normalizeFileName (string $file, string $fileExtension): string {
    $filterChars = ['ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß', 'è', 'é', 'à'];
    $replace = ['ae', 'oe', 'ue', 'ae', 'oe', 'ue', 'ss', 'e', 'e', 'a'];
    $fileExtension = $fileExtension !== 'jpeg' ? $fileExtension : $fileExtension = 'jpg';
    $fileName = str_replace($filterChars, $replace, strtolower(pathinfo($file, PATHINFO_FILENAME)));
    $fileName = preg_replace('/[^a-z\d-]+/', '-', $fileName);

    return $fileName . '.' . $fileExtension;
  }
}
