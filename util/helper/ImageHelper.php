<?php

namespace rafisa\lib\generator;

use function imagecopy;
use function imagecreatefromjpeg;
use function imagecreatetruecolor;
use function imagejpeg;

/**
 * Class ImageGenerator.
 *
 * @package rafisa\lib\helper
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
abstract class ImageHelper {
  public static function createThumbnail (string $filePath, string $thumbsPath): bool {
    $image = imagecreatefromjpeg($filePath);
    $thumbnailTemp = imagecreatetruecolor(100, 50);
    $success = imagecopy($thumbnailTemp, $image, 0, 0, 0, 0, 100, 50);

    if ($success) {
      $success = imagejpeg($thumbnailTemp, $thumbsPath);
    }

    return $success;
  }
}
