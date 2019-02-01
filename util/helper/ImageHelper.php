<?php

namespace lib\util\helper;

use function imagecopy;
use function imagecreatefromjpeg;
use function imagecreatetruecolor;
use function imagejpeg;

/**
 * Class ImageHelper.
 *
 * @package lib\util\helper
 * @author Daniel Peters
 * @version 1.0
 */
abstract class ImageHelper {
  /**
   * Create a thumbnail from an image. Note that the image will get cropped and must be of type jpeg.
   *
   * @param string $filePath Path to image file
   * @param string $thumbsPath Thumbnail path
   * @param int $width
   * @param int $height
   *
   * @return bool True if thumbnail was successfully created
   */
  public static function createThumbnailFromJpeg (
    string $filePath,
    string $thumbsPath,
    int $width = 100,
    int $height = 50
  ): bool {
    $image = imagecreatefromjpeg($filePath);
    $thumbnailTemp = imagecreatetruecolor(100, 50);
    $success = imagecopy($thumbnailTemp, $image, 0, 0, 0, 0, $width, $height);

    if ($success) {
      $success = imagejpeg($thumbnailTemp, $thumbsPath);
    }

    return $success;
  }
}
